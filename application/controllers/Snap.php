<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct(){
        parent::__construct();
        $params = array('server_key' => SERVER_KEY, 'production' => true);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
        $this->load->model('security/Saldo_Model','saldo_model');
        $this->load->model('security/Profile_Model','profile_model');
    }

    public function index(){
    	$this->load->view('checkout_snap');
    }

    public function token(){

		$result = $this->profile_model->get_One("sys_profile.code = '".$this->session->userdata(NAME_SESSION)['user_profile']."'");
		
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $_GET["saldo"], // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => $this->security->get_csrf_hash(),
		  'price' => $_GET["saldo"],
		  'quantity' => 1,
		  'name' => "PENAMBAHAN SALDO"
		);

		// Optional
		$item_details = array ($item1_details);

		// Optional
		$billing_address = array(
		  'first_name'    => $result->profile_first_name,
		  'last_name'     => $result->profile_last_name,
		  'address'       => "-",
		  'city'          => "-",
		  'postal_code'   => "-",
		  'phone'         => "",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => $result->profile_first_name,
		  'last_name'     => $result->profile_last_name,
		  'address'       => "-",
		  'city'          => "-",
		  'postal_code'   => "-",
		  'phone'         => "",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $result->profile_first_name,
		  'last_name'     => $result->profile_last_name,
		  'email'         => $result->profile_email,
		  'phone'         => $result->profile_phone,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		// error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		// error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));
        $data = array(
                 'code' => $this->input->get('order_id')
                ,'profile_code' => $this->session->userdata(NAME_SESSION)['user_profile']
                ,'price' => $result->transaction_details["gross_amount"]
                ,'description' => "PENAMBAHAN SALDO"
                ,'log_date' => date("Y-m-d H:i:s O",$time)
            );
        $this->saldo_model->insert($data);

    }
}
