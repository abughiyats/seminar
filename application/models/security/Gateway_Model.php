
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gateway_Model extends CI_Model {

	public function __construct(){
		parent::__construct();

        // load setting payment gateway
        $params = array('server_key' => SERVER_KEY, 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
	}

	public function transaction_details(){
		return array(
			'order_id' 		=> rand(),
			'gross_amount' 	=> 200000
		);
	}

		// Populate items
	public function item_details(){ 
		return [
			array(
				'id' 		=> 'item1',
				'price' 	=> 100000,
				'quantity' 	=> 1,
				'name' 		=> 'Adidas f50'
			),
			array(
				'id'		=> 'item2',
				'price' 	=> 50000,
				'quantity' 	=> 2,
				'name' 		=> 'Nike N90'
			)
		];
	}

	// Populate customer's billing address
	public function billing_address(){ 
		return array(
			'first_name' 	=> "Andri",
			'last_name' 	=> "Setiawan",
			'address' 		=> "Karet Belakang 15A, Setiabudi.",
			'city' 			=> "Jakarta",
			'postal_code' 	=> "51161",
			'phone' 		=> "081322311801",
			'country_code'	=> 'IDN'
		);
	}

	// Populate customer's shipping address
	public function shipping_address(){ 
		return array(
			'first_name'  => "John",
			'last_name'   => "Watson",
			'address' 	  => "Bakerstreet 221B.",
			'city' 		  => "Jakarta",
			'postal_code' => "51162",
			'phone' 	  => "081322311801",
			'country_code'=> 'IDN'
		);
	}

	// Populate customer's Info
	public function customer_details(){ 
		return array(
			'first_name' 	  => "Andri",
			'last_name' 	  => "Setiawan",
			'email' 		  => "andrisetiawan@me.com",
			'phone' 		  => "081322311801",
			'billing_address' => $this->billing_address(),
			'shipping_address'=> $this->shipping_address()
		);
	}

	// Data yang akan dikirim untuk request redirect_url.
	public function transaction_data() {
        $credit_card['secure'] = true;
        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );

		return $this->midtrans->getSnapToken(
			array(
	            'transaction_details'=> $this->transaction_details(),
	            'item_details'       => $this->item_details(),
	            'customer_details'   => $this->customer_details(),
	            'credit_card'        => $credit_card,
	            'expiry'             => $custom_expiry
	        )
		);
	}
}
