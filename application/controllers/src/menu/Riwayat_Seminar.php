<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Riwayat_Seminar extends REST_Controller {	
	var $alias_table = 'riwayat_seminar_';
	public function __construct(){
		parent::__construct();
		$this->load->model('menu/Riwayat_Seminar_Model','riwayat_seminar_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/menu/Riwayat_Seminar')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/menu/Riwayat_Seminar')."?m_pfx=view'";
        $mn = "'".base_url('src/menu/Riwayat_Seminar')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['riwayat_seminar_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('menu/riwayat-seminar/form.php',$data);
				return;
			}
		}
		$this->load->view('menu/riwayat-seminar/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('riwayat_seminar_code'))){
			$where = array('code' => $this->input->post('riwayat_seminar_code'));
		}else{
			$where = "";
		}

		$data = $this->riwayat_seminar_model->get_One($where);
		print $this->load->view('menu/riwayat-seminar/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('riwayat_seminar_code'))){$where = array($this->riwayat_seminar_model->column_search[0] => $this->input->get('riwayat_seminar_code'));
		}else{$where = "1=1";}

		$result = $this->riwayat_seminar_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('seminar_start');
		foreach ($result as $seminar_list) {
        	$edit_seminar = "'".base_url('src/menu/Riwayat_Seminar')."?m_pfx=form&code=".$seminar_list->riwayat_seminar_code."'";

			$delete_seminar = "delete_seminar('".$seminar_list->riwayat_seminar_code."')";
			$print_seminar = "print_review('".base_url()."auth/print?code=".$seminar_list->riwayat_seminar_code."')";
			$checkout_seminar = "check_out('".$seminar_list->riwayat_seminar_code/**$this->gateway_model->transaction_data()**/."')";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $seminar_list->seminar_code;
			$row[] = $seminar_list->seminar_title;
			$row[] = date("d-m-Y", strtotime($seminar_list->seminar_target_date));
			$row[] = $seminar_list->seminar_pembicara;
			$row[] = $seminar_list->seminar_location;
			$row[] = date("d-m-Y", strtotime($seminar_list->seminar_close_regist_date));
			$row[] = $seminar_list->seminar_qouta;
			$row[] = $seminar_list->seminar_price;

			$data[] = $row;
		}

		if(!$result){$message = $this->fn->get_message($this->input->get('riwayat_seminar_code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('riwayat_seminar_code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->riwayat_seminar_model->get_count($where)
				, "recordsFiltered" => $this->riwayat_seminar_model->count_filtered($where)
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
			$where = $this->riwayat_seminar_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->riwayat_seminar_model->get_One($where);
		if(!$result){$message = $this->fn->get_message($this->input->get('code'), READ, FALSE);$status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('code'), READ, TRUE); $status = TRUE;}

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
		$result = $this->riwayat_seminar_model->get_list($where);

		if(!$result){$message = $this->fn->get_message($this->input->get('code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('code'), READ, TRUE); $status = TRUE;}
		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI MENYIMPAN DATA
	public function insert_POST() {	
		if(!empty($this->input->post('riwayat_seminar_code'))){
			$code = $this->fn->generade_code($this->session->userdata(NAME_SESSION)['user_branch'].'-','code','','mn_seminar',5);
			$data = array(
					 'code' => $code
					,'title' => $this->input->post('seminar_title')
					,'target_date' => date("Y-m-d", strtotime($this->input->post('seminar_target_date')))
					,'pembicara' => $this->input->post('seminar_pembicara')
					,'open_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_open_regist_date')))
					,'close_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_close_regist_date')))
					,'qouta' => $this->input->post('seminar_qouta')
					,'price' => $this->input->post('seminar_price')
					,'certificate_status' => $this->input->post('seminar_certificate_status')
					,'remark' => $this->input->post('seminar_remark')
				);
		}else{
			$data = "";
		}
		$result = $this->riwayat_seminar_model->insert($data);

		if(!$result){$message = $this->fn->get_message($this->input->post('seminar_name'), CREATE,  FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('seminar_name'), CREATE, TRUE); $status = TRUE;}

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
	public function update_POST(){
		if(!empty($this->input->post('riwayat_seminar_code'))){
			$data = array(
					 'title' => $this->input->post('seminar_title')
					,'target_date' => date("Y-m-d", strtotime($this->input->post('seminar_target_date')))
					,'pembicara' => $this->input->post('seminar_pembicara')
					,'open_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_open_regist_date')))
					,'close_regist_date' => date("Y-m-d", strtotime($this->input->post('seminar_close_regist_date')))
					,'qouta' => $this->input->post('seminar_qouta')
					,'price' => $this->input->post('seminar_price')
					,'certificate_status' => $this->input->post('seminar_certificate_status')
					,'remark' => $this->input->post('seminar_remark')
				);
		}else{
			$data = "";
		}

		$result = $this->riwayat_seminar_model->update($data, array($this->riwayat_seminar_model->column_search[0] => $this->input->post('riwayat_seminar_code')));

		if(!$result){$message = $this->fn->get_message($this->input->post('seminar_name'), UPDATE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('seminar_name'), UPDATE, TRUE); $status = TRUE;}
		
		$data = array(
				  "data" 	=> $result
				, "message"	=> $message
				, "status" 	=> $status
			);

		//FORMAT RETURN JSON
        $this->response($data, REST_Controller::HTTP_OK);
        return;
	}

	// FUNGSI HAPUS
	public function delete_GET(){
		if(!empty($this->input->get('riwayat_seminar_code'))){
			$where = array('code' => $this->input->get('riwayat_seminar_code'));
		}else{
			$where = "";
		}

		$result = $this->riwayat_seminar_model->delete($where);

		if (!$result){$message = $this->fn->get_message($this->input->get('riwayat_seminar_code'), DELETE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('riwayat_seminar_code'), DELETE, TRUE);  $status = TRUE;}
		
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