<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Management_Organization extends REST_Controller {	
	var $alias_table = 'management_organization_';
	public function __construct(){
		parent::__construct();
		$this->load->model('menu/Management_Organization_Model','management_organization_model');
		$this->load->model('util/Function_Model','fn');
        $this->load->model('security/Gateway_Model','gateway_model');
	}

	public function index_GET(){
        $mn_tambah = "'".base_url('src/menu/admin/Management_Organization')."?m_pfx=form'";
        $mn_cancel = "'".base_url('src/menu/admin/Management_Organization')."?m_pfx=view'";
        $mn = "'".base_url('src/menu/admin/Management_Organization')."?m_pfx=form'";
		$data['tambah'] = 'load_menu('.$mn_tambah.')';
		$data['cancel'] = 'load_menu('.$mn_cancel.')';
		$data['management_organization_code'] = $this->input->get('code');

		if(!empty($this->input->get('m_pfx'))){
			if($this->input->get('m_pfx')=="form"){
				$this->load->view('menu/admin/management-organization/form.php',$data);
				return;
			}
		}
		$this->load->view('menu/admin/management-organization/view.php',$data);
		return;
	}

	public function index_POST(){
		if(!empty($this->input->post('management_organization_code'))){
			$where = array('code' => $this->input->post('management_organization_code'));
		}else{
			$where = "";
		}

		$data = $this->management_organization_model->get_One($where);
		print $this->load->view('menu/admin/management-organization/form.php',$data);
	}

	public function ajax_list_GET(){
		if(!empty($this->input->get('management_organization_code'))){$where = array($this->management_organization_model->column_search[0] => $this->input->get('management_organization_code'));
		}else{$where = "1=1";}

		$result = $this->management_organization_model->get_datatables($where);
		$data = array();
		$no = $this->input->get('management_organization_start');
		foreach ($result as $management_organization_list) {
        	$edit_city = "'".base_url('src/menu/management-organization')."?m_pfx=form&code=".$management_organization_list->management_organization_code."'";
			$delete_city = "delete_city('".$management_organization_list->management_organization_code."')";
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $management_organization_list->management_organization_code;
			$row[] = $management_organization_list->management_organization_first_name;
			$row[] = $management_organization_list->management_organization_last_name;
			$row[] = $management_organization_list->management_organization_name;
			$row[] = $management_organization_list->management_organization_organization_code;
			$row[] = $management_organization_list->management_organization_birthdate;
			$row[] = $management_organization_list->management_organization_email;
			$row[] = $management_organization_list->management_organization_phone;
			$row[] = $management_organization_list->management_organization_phone_wa;
			$row[] = $management_organization_list->management_organization_age;
			$row[] = $management_organization_list->management_organization_gender;
			$row[] = $management_organization_list->management_organization_address;
			$row[] = $management_organization_list->management_organization_photo;
			$row[] = $management_organization_list->management_organization_status;
			$row[] = '
					<button class="btn btn-primary" onclick="load_menu('.$edit_city.')" title="edit" ><i class="fa fa-fw fa-lg fa-edit"></i></button>
				';

			$data[] = $row;
		}

		if(!$result){$message = $this->fn->get_message($this->input->get('management_organization_code'), READ, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('management_organization_code'), READ, TRUE); $status = TRUE;}

		$data = array(
				  "draw" => $this->input->get('draw')
				, "recordsTotal" => $this->management_organization_model->get_count($where)
				, "recordsFiltered" => $this->management_organization_model->count_filtered($where)
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
			$where = $this->management_organization_model->column_search[0]." = '".$this->input->get('code')."' ";
		}else{
			$where = "";
		}

		$result = $this->management_organization_model->get_One($where);
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
		$result = $this->management_organization_model->get_list($where);

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
		if(!empty($this->input->post('management_organization_code'))){
			$code = $this->fn->generade_code($this->session->userdata(NAME_SESSION)['user_organisasi'].'-','code','','sys_profile',5);
			$data = array(
					 'code' => $code
					,'first_name' => $this->input->post('management_organization_first_name')
					,'last_name' => $this->input->post('management_organization_last_name')
					,'organisasi_code' => $this->input->post('management_organization_organisasi_code')
					,'birthdate' => $this->input->post('management_organization_birthdate')
					,'email' => $this->input->post('management_organization_email')
					,'phone' => $this->input->post('management_organization_phone')
					,'phone_wa' => $this->input->post('management_organization_phone_wa')
					,'age' => $this->input->post('management_organization_age')
					,'gender' => $this->input->post('management_organization_gender')
					,'address' => $this->input->post('management_organization_address')
					,'photo' => $this->input->post('management_organization_photo')
					,'status' => $this->input->post('management_organization_status')
				);
		}else{
			$data = "";
		}
		$result = $this->management_organization_model->insert($data);

		if(!$result){$message = $this->fn->get_message($this->input->post('management_organization_name'), CREATE,  FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('management_organization_name'), CREATE, TRUE); $status = TRUE;}

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
		if(!empty($this->input->post('management_organization_code'))){
			$data = array(
					 'first_name' => $this->input->post('management_organization_first_name')
					,'last_name' => $this->input->post('management_organization_last_name')
					,'name' => $this->input->post('management_organization_name')
					,'organisasi_code' => $this->input->post('management_organization_organisasi_code')
					,'birthdate' => $this->input->post('management_organization_birthdate')
					,'email' => $this->input->post('management_organization_email')
					,'phone' => $this->input->post('management_organization_phone')
					,'phone_wa' => $this->input->post('management_organization_phone_wa')
					,'age' => $this->input->post('management_organization_age')
					,'gender' => $this->input->post('management_organization_gender')
					,'address' => $this->input->post('management_organization_address')
					,'photo' => $this->input->post('management_organization_photo')
					,'status' => $this->input->post('management_organization_status')
				);
		}else{
			$data = "";
		}

		$result = $this->management_organization_model->update($data, array($this->management_organization_model->column_search[0] => $this->input->post('management_organization_code')));

		if(!$result){$message = $this->fn->get_message($this->input->post('management_organization_name'), UPDATE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->post('management_organization_name'), UPDATE, TRUE); $status = TRUE;}
		
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
		if(!empty($this->input->get('management_organization_code'))){
			$where = array('code' => $this->input->get('management_organization_code'));
		}else{
			$where = "";
		}

		$result = $this->management_organization_model->delete($where);

		if (!$result){$message = $this->fn->get_message($this->input->get('management_organization_code'), DELETE, FALSE); $status = FALSE;
		}else{$message = $this->fn->get_message($this->input->get('management_organization_code'), DELETE, TRUE);  $status = TRUE;}
		
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