<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Midtrans\Config;
use Midtrans\Snap; 
use CodeIgniter\Controller;

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		Config::$serverKey = 'SB-Mid-server-vrECg5r6Fp3is40-kNGYx6fI';
		Config::$clientKey = 'SB-Mid-client-oiKxuIaEuQvDEopC';
		Config::$isProduction = false;
		Config::$isSanitized = true;
		Config::$is3ds = true;

		$this->load->helper('form');
        // $this->load->helper('security');
		$this->load->helper('curl');

		
		// for load any data from model
		$this->load->model(['product_m', 'supplier_m', 'kasir_m', 'user_m', 'order_m']);
        $this->load->library('form_validation', 'session');
		
	}

    public function index()
    {
        $this->template->load('template', 'pages/order/delivery');
    }

    public function list()
    {
        $order_list = $this->order_m->get();

        

        $data = [
            'title' => "Order List",
            'list' => $order_list,
        ];


        $this->template->load('template', 'pages/order/list', $data);
    }

    public function notification()
    {

        // Load a view that displays the notification
        $this->template->load('template','pages/order/notification');

    }

    


   

}
?>