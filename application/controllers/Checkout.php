<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// namespace App\Controllers;

use Midtrans\Config;
use Midtrans\Snap; 
use CodeIgniter\Controller;

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();

		// $this->load->helper('form');
        // $this->load->helper('security');
		$this->load->helper('curl');
		
		// for load any data from model
		$this->load->model(['product_m', 'supplier_m', 'kasir_m', 'user_m']);
        $this->load->library('form_validation');
		// $this->load->library('midtrans');
		

	}

	public function index()
{
   
    Config::$serverKey = 'SB-Mid-server-vrECg5r6Fp3is40-kNGYx6fI';
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    $params = array(
        'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => 5000,
        )
    );
    
    $snapToken = Snap::getSnapToken($params);
    $data['token'] = $snapToken;

    $this->template->load('template', 'pages/payment/payment', $data);
}


}
?>