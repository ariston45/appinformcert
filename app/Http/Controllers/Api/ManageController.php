<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cert_category;
use Illuminate\Http\Request;
use App\Models\Cst_customer;
use App\Models\Par_participant;
use App\Models\Rec_gen_record;
use DB;
use LDAP\Result;

class ManageController extends Controller
{
	/* Tags:... */
	public function actionStoreGoldSilver(Request $request)
	{
		DB::setDefaultConnection('mysql_online');
		$raw_data = json_decode($request->getContent());
		// return $raw_data;
		foreach ($raw_data[0] as $key => $value) {
			if ($key == 'data_customer') {
				$data_customer = [
					'cst_id' => $value->cst_id,
					'cst_name' => $value->cst_name,
					'cst_address' => $value->cst_address,
					'cst_email' => $value->cst_email,
					'cst_sts_custom_certificate' => $value->cst_sts_custom_certificate
				];
			} elseif ($key == 'data_record') {
				$data_record = [
					"rec_id" => $value->rec_id,
					"rec_customer_id" => $value->rec_customer_id,
					"rec_date" => $value->rec_date,
					"rec_sync_date" => $value->rec_sync_date,
					"rec_note" => $value->rec_note,
					"rec_name" => $value->rec_name,
					"rec_count" => $value->rec_count,
					"rec_cert_type" => $value->rec_cert_type,
					"rec_option" => $value->rec_option,
					"rec_template" => $value->rec_template,
				];
			}elseif ($key == 'data_gold') {
				$data1 = $value;
			}elseif ($key == 'data_silver') {
				$data2 = $value;
			}
		}
		foreach ($data1 as $key => $value) {
			$data_gold[$key] = [
				"par_id" => $value->par_id,
				"par_customer_id" => $value->par_customer_id,
				"par_rec_id" => $value->par_rec_id,
				"par_cert_number" => $value->par_cert_number,
				"par_name" => $value->par_name,
				"par_exam_date"=> $value->par_exam_date_raw,
				"par_exam_date_scd" => $value->par_exam_date_scd_raw,
				"par_hash_id" => $value->par_hash_id,
				"par_type" =>  $value->par_type,
				"par_val_word" => $value->par_val_word,
				"par_val_excel" => $value->par_val_excel,
				"par_val_powerpoint"=> $value->par_val_powerpoint,
			];
		}
		foreach ($data2 as $key => $value) {
			$data_silver[$key] = [
				"par_id" => $value->par_id,
				"par_customer_id" => $value->par_customer_id,
				"par_rec_id" => $value->par_rec_id,
				"par_cert_number" => $value->par_cert_number,
				"par_name" => $value->par_name,
				"par_exam_date" => $value->par_exam_date_raw,
				"par_exam_date_scd" => $value->par_exam_date_scd_raw,
				"par_hash_id" => $value->par_hash_id,
				"par_type" =>  $value->par_type,
				"par_val_word" => $value->par_val_word,
				"par_val_excel" => $value->par_val_excel,
				"par_val_powerpoint" => $value->par_val_powerpoint,
			];
		}
		Cst_customer::upsert(
			$data_customer,
			['cst_id'],
			['cst_id', 'cst_name', 'cst_address', 'cst_email', 'cst_sts_custom_certificate']
		);
		Rec_gen_record::upsert(
			$data_record,
			['rec_id'],
			['rec_customer_id', 'rec_date', 'rec_sync_date', 'rec_note', 'rec_name', 'rec_count'],
		);
		Par_participant::upsert(
			$data_gold,
			['par_id'],
			['par_customer_id','par_rec_id','par_cert_number','par_name','par_type','par_exam_date','par_hash_id','par_val_word','par_val_excel','par_val_powerpoint']
		);
		Par_participant::upsert(
			$data_silver,
			['par_id'],
			['par_customer_id','par_rec_id','par_cert_number','par_name','par_type','par_exam_date','par_hash_id','par_val_word','par_val_excel','par_val_powerpoint']
		);
	}
	public function actionStoreGeneral(Request $request)
	{
		DB::setDefaultConnection('mysql_online');
		$raw_data = json_decode($request->getContent());
		// return $raw_data;
		foreach ($raw_data[0] as $key => $value) {
			if ($key == 'data_customer') {
				$data_customer = [
					'cst_id' => $value->cst_id,
					'cst_name' => $value->cst_name,
					'cst_address' => $value->cst_address,
					'cst_email' => $value->cst_email,
					'cst_sts_custom_certificate' => $value->cst_sts_custom_certificate
				];
			} elseif ($key == 'data_record') {
				$data_record = [
					"rec_id" => $value->rec_id,
					"rec_customer_id" => $value->rec_customer_id,
					"rec_date" => $value->rec_date,
					"rec_sync_date" => $value->rec_sync_date,
					"rec_note" => $value->rec_note,
					"rec_name" => $value->rec_name,
					"rec_count" => $value->rec_count,
					"rec_cert_type" => $value->rec_cert_type,
					"rec_option" => $value->rec_option,
					"rec_template" => $value->rec_template,
				];
			} elseif ($key == 'data_general') {
				$data1 = $value;
			}
		}
		foreach ($data1 as $key => $value) {
			$data_general[$key] = [
				"par_id" => $value->par_id,
				"par_customer_id" => $value->par_customer_id,
				"par_rec_id" => $value->par_rec_id,
				"par_cert_number" => $value->par_cert_number,
				"par_name" => $value->par_name,
				"par_exam_date" => $value->par_exam_date_raw,
				"par_exam_date_scd" => $value->par_exam_date_scd_raw,
				"par_hash_id" => $value->par_hash_id,
				"par_type" =>  $value->par_type,
				"par_val_word" => $value->par_val_word,
				"par_val_excel" => $value->par_val_excel,
				"par_val_powerpoint" => $value->par_val_powerpoint,
			];
		}
		// DB::enableQueryLog();
		Cst_customer::upsert(
			$data_customer,
			['cst_id'],
			['cst_id', 'cst_name', 'cst_address', 'cst_email', 'cst_sts_custom_certificate']
		);
		Rec_gen_record::upsert(
			$data_record,
			['rec_id'],
			['rec_customer_id', 'rec_date', 'rec_sync_date', 'rec_note', 'rec_name', 'rec_count', 'rec_cert_type', 'rec_option', 'rec_template'],
		);
		Par_participant::upsert(
			$data_general,
			['par_id'],
			['par_customer_id', 'par_rec_id', 'par_cert_number', 'par_name', 'par_type', 'par_exam_date', 'par_exam_date_scd', 'par_hash_id', 'par_val_word', 'par_val_excel', 'par_val_powerpoint']
		);
		// dd(DB::getQueryLog());
	}
	/* Tags:... */
	public function actionStoreCertSetting(Request $request)
	{
		DB::setDefaultConnection('mysql_online');
		$raw_data = json_decode($request->getContent());
		foreach ($raw_data[0] as $key => $value) {
			$data[$key] = [
				'cert_id' => $value->cert_id,
				'cert_type' => $value->cert_type,
				'cert_title' => $value->cert_title,
			];
		}
		Cert_category::upsert(
			$data,['cert_id'],['cert_type','cert_title']
		);
	}
}
