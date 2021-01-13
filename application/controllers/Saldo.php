<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Saldo extends REST_Controller {

    /** START SHOW ERROR STYLE ARRAY **
        show_error(highlight_string("<?php\n\$result =\n".var_export($result, true).";\n?>"), 505, $heading = 'DEBUG');
    /** END SHOW ERROR STYLE ARRAY **/ 

    public function __construct() {
        parent::__construct();
        $this->load->model('security/Auth_Model','auth_model');
        $this->load->model('security/Salado_Model','saldo_model');
    }

    public function index_GET() {
        $saldo_profile = $this->auth_model->auth_saldo($this->session->userdata(NAME_SESSION)['user_profile']);
        $data['saldo_profile'] = $saldo_profile;
        $data['saldo_description'] = ($this->session->userdata(NAME_SESSION)['user_role']=="ROLE-003") ? "Saldo: Rp. ".number_format((float)$saldo_profile[0]->user_saldo,2) : $this->session->userdata(NAME_SESSION)['user_role_id'];;

        $data["message"] = "-";
        $data["status"] = FALSE;
        $data["url"] = base_url();
        $this->response($data, REST_Controller::HTTP_OK);
        return;
    }

}