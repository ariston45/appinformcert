<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function index()
	{
		if ($user = Auth::user()) {
			if ($user->level == 'admin') {
				return redirect()->intended('home');
			} elseif ($user->level == 'editor') {
				return redirect()->intended('home');
			}
		}
		return view('auth.login');
	}

	public function proses_login(Request $request)
	{
		request()->validate([
			'username' => 'required',
			'password' => 'required',
		]);
		$kredensil = $request->only('username','password');
		if (Auth::attempt($kredensil)) {
			$user = Auth::user();
			$auth_level = array('ADM','AGM','MGR.PAS','MGR.TCH','MGR','STF','STF.TCH');
			if (in_array($user->level,$auth_level)) {
				return redirect()->intended('generate');
			} elseif ($user->level == 'editor') {
				return redirect()->intended('generate');
			}
			return redirect()->intended('/');
		}
		return redirect('login')
		->withInput()
		->withErrors(['login_gagal' => 'Invalid username or password. <br> Please try again.']);
	}

	public function logout(Request $request)
	{
		$request->session()->flush();
		Auth::logout();
		return Redirect('login');
	}

	/* Tags:... */
	public function Process_login_api(Request $request)
	{
		$request->validate([
			'email' => 'required',
			'password' => 'required'
		]);
		$user = User::where('email', $request->email)->first();
		if (! $user || ! Hash::check($request->password, $user->password)) {
			throw ValidationException::withMessages([
				'email' => ['The provided credentials are incorrect.'],
			]);
		}
		return response()->json([
			'token' => $user->createToken('user-token')->plainTextToken,
		]);
		// $kredensil = $request->only('username', 'password');
		// $user = User::where('username', $request->username)->first();
		// if (Auth::attempt($kredensil)) {
		// 	$user = Auth::user();
		// 	$user->tokens()->delete();
		// 	$token = $user->createToken('auth_token')->plainTextToken;
		// 	return response()->json([
		// 		'token' => $token,
		// 		'token_type' => 'Bearer',
		// 		'user' => $user
		// 	]);
		// }else {
		// 	return null;
		// }
	}
	public function Process_logout_api(Request $request)
	{
		$request->user()->tokens()->delete();
		return response()->json(['message' => 'Logout berhasil.']);
	}
	/* Tags:... */
	public function station(Request $request)
	{
		return response()->json([
			'success' => true,
			'message' => 'Data berhasil diterima',
			'data' => $request->all()
		], 201);

	}
}
