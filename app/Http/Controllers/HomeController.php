<?php

namespace App\Http\Controllers;

use App\Models\Par_participant;
use App\Models\Rec_gen_record;
use Carbon\Carbon;
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
		->where('par_hash_id',$code)
		->first();
		$data_record = Rec_gen_record::leftJoin('cert_categories', 'rec_gen_records.rec_cert_type','=', 'cert_categories.cert_id')
		->where('rec_id',	$data_participant->par_rec_id)
		->first();
		if ($data_participant->par_exam_date_scd == null || $data_participant->par_exam_date_scd == '') {
			$dt1 = Carbon::parse($data_participant->par_exam_date);
			$date_tab = $dt1->format('F j, Y');
		} else {
			$dt1 = Carbon::parse($data_participant->par_exam_date);
			$dt2 = Carbon::parse($data_participant->par_exam_date_scd);
			if ($dt1->format('m') === $dt2->format('m')) {
				$date_tab = $dt1->format('j') . ' - ' . $dt2->format('j F, Y');
			} else {
				$date_tab = $dt1->format('j F, Y') . ' - ' . $dt2->format('j F, Y');
			}
		}
		if ($data_record->cert_type == 'COA') {
			$cert_type = 'Certificate of Achievement';
		}elseif ($data_record->cert_type == 'COP') {
			$cert_type = 'Certificate of Proficiency';
		} elseif ($data_record->cert_type == 'COC') {
			$cert_type = 'Certificate of Competency';
		}else {
			$cert_type = 'Certificate';
		}
		if ($data_participant == null) {
			// return view('errors.404');
			return redirect()->to('https://education.trusttrain.com/');
		}else{
			$data = [
				'cert_type' => $cert_type,
				'date_exam' => $date_tab,
				'name' => $data_participant->par_name,
				'institution' => $data_participant->cst_name,
				'cst_type' => $data_participant->cst_sts_custom_certificate,
				'par_type' => $data_participant->par_type,
				'word' => $data_participant->par_val_word,
				'excel' => $data_participant->par_val_excel,
				'powerpoint' => $data_participant->par_val_powerpoint,
				'number' => $data_participant->par_cert_number,
				'title' => $data_record->cert_title,
			];
			// die();
			return view('contents.page_home.home',compact('data_participant','data'));
		}
	}
}
