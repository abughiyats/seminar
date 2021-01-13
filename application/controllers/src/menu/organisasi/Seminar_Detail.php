<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Seminar_Detail extends REST_Controller {	
	var $alias_table = 'seminar_detail_';
	public function __construct(){
		parent::__construct();
		$this->load->model('menu/Seminar_Detail_Model','seminar_detail_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
        $this->load->model('security/Transaction_Log_Model','transaction_log_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/menu/organisasi/Seminar_Detail')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/menu/organisasi/Seminar_Detail')."?m_pfx=view'";
        $mn = "'".base_url('src/menu/organisasi/Seminar_Detail')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['seminar_detail_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('menu/organisasi/seminar_detail/form.php',$data);
				return;
			}
		}
		$this->load->view('menu/organisasi/seminar_detail/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('seminar_detail_code'))){
			$where = array('code' => $this->input->post('seminar_detail_code'));
		}else{
			$where = "";
		}

		$data = $this->seminar_detail_model->get_One($where);
		print $this->load->view('menu/organisasi/seminar_detail/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('seminar_detail_code'))){$where = array($this->seminar_detail_model->column_search[0] => $this->input->get('seminar_detail_code'));
		}else{$where = "1=1";}

		$result = $this->seminar_detail_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('seminar_detail_start');
		foreach ($result as $seminar_detail_list) {
			$update_seminar_detail = "update_seminar_detail('".$seminar_detail_list->seminar_detail_code."','".$seminar_detail_list->seminar_detail_payment_amount."')";

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $seminar_detail_list->seminar_detail_code;
			$row[] = $seminar_detail_list->seminar_detail_seminar_code;
			$row[] = $seminar_detail_list->seminar_detail_profile_code;
			$row[] = $seminar_detail_list->seminar_detail_paid_amount;
			$row[] = $seminar_detail_list->seminar_detail_payment_amount;
			$row[] = '
					<button class="btn btn-primary" onclick="'.$update_seminar_detail.'" title="edit" ><i class="fa fa-fw fa-lg fa-edit"></i></button>
				';
			$data[] = $row;
		}

		if(!$result){
			$message = $this->fn->get_message($this->input->get('seminar_detail_code'), READ, FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->get('seminar_detail_code'), READ, TRUE); $status = TRUE;
		}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->seminar_detail_model->get_count($where)
				, "recordsFiltered" => $this->seminar_detail_model->count_filtered($where)
				, "data" => $data
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI MENGAMBIL SATU DATA
	public function reqs_one_GET(){
		if(!empty($this->input->get('code'))){
			$where = $this->seminar_detail_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->seminar_detail_model->get_One($where);
		if(!$result){
			$message = $this->fn->get_message($this->input->get('code'), READ, FALSE);$status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->get('code'), READ, TRUE); $status = TRUE;
		}

		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI MENGAMBIL BANYAK DATA
	public function reqs_list_GET(){
		if(!empty($this->input->get('code'))){
			$where = "code LIKE '%".$this->input->get('code')."%' ";
		}else{
			$where = "";
		}
		$result = $this->seminar_detail_model->get_list($where);

		if(!$result){
			$message = $this->fn->get_message($this->input->get('code'), READ, FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->get('code'), READ, TRUE); $status = TRUE;
		}
		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI UBAH DATA
	public function update_GET(){
		if(!empty($this->input->get('seminar_detail_code'))){
			$data = array(
					 'payment_type' => "Cash"
					,'paid_amount' => $this->input->get('seminar_detail_paid_amount')
					,'updated_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'updated_date' => date("Y-m-d H:i:s")
				);
		}else{
			$data = "";
		}

		$result = $this->seminar_detail_model->update($data, array($this->seminar_detail_model->column_search[0] => $this->input->get('seminar_detail_code')));

		if(!$result){
			$message = $this->fn->get_message($this->input->post('seminar_detail_name'), UPDATE, FALSE); $status = FALSE;
		}else{
			$message = $this->fn->get_message($this->input->post('seminar_detail_name'), UPDATE, TRUE); $status = TRUE;


				$code = $this->input->post('seminar_code');
				$code_log = $this->fn->generade_code('LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','code','LOG/'.$code.'/'.$this->session->userdata(NAME_SESSION)['user_profile'].'-','sys_transaction_log',3);
				$data_log = array(
					 'code' => $code_log
					,'menu_alias' => 'SMR_DET'
					,'transaction_code' => $code
					,'action' => 'UPDATE_DATA'
					,'profile_code' => $this->session->userdata(NAME_SESSION)['user_profile']
					,'description' => 'Berhasil'
					,'created_by' => $this->session->userdata(NAME_SESSION)['user_name']
					,'created_date' => date("Y-m-d H:i:s")
				);
				$this->transaction_log_model->insert($data_log);}
		
		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}
}