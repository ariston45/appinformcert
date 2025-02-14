<?php

namespace App\Http\Controllers;

use App\Models\Par_participant;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		return view('layout.app');
	}
	public function viewCert(Request $request)
	{
		$code = $request->id;
		$data_participant = Par_participant::join('cst_customers', 'par_participants.par_customer_id','=', 'cst_customers.cst_id')
		->where('par_hash_id',$code)->first();
		if ($data_participant == null) {
			return view('errors.404');
		}else{
			$data = [
				'date_exam' => date('F d, Y', strtotime($data_participant->par_exam_date)),
				'name' => $data_participant->par_name,
				'institution' => $data_participant->cst_name,
				'cst_type' => $data_participant->cst_sts_custom_certificate,
				'par_type' => $data_participant->par_type,
				'word' => $data_participant->par_val_word,
				'excel' => $data_participant->par_val_excel,
				'powerpoint' => $data_participant->par_val_powerpoint,
			];
			return view('contents.page_home.home',compact('data_participant','data'));
		}
	}
}
