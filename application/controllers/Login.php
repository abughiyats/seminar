<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {	
	var $alias_table = 'seminar_';
	public function __construct(){
		parent::__construct();
        $this->load->model('security/Auth_Model','auth_model');
        $this->load->model('security/Gateway_Model','gateway_model');
	}

    public function index_GET() {
        // check session & user auth
        if($this->auth_model->check_log()){$this->load->view('login/index.php');return;}
        $result = $this->auth_model->auth_menu($this->session->userdata(NAME_SESSION)['token_mod']);
        $profile = "'".base_url('src/user')."?m_pfx=view'";
        $data['mn_profile'] = 'load_menu('.$profile.')';
        $data['list_menu'] = '';
        if ($result) {
            foreach ($result as $list_mn) {
                $mn = "'".base_url($list_mn->menu_url)."?m_pfx=view'";
                $data['list_menu'] .= '
                  <ul class="sidebar-menu">
                    <li><a onclick="load_menu('.$mn.')"><i class="fa fa-table"></i><span>'.$list_mn->menu_name_id.'</span></a></li>
                  </ul>
                ';
            }
        }

        $this->load->view('dashboard/index.php',$data);
		return;
    }
}