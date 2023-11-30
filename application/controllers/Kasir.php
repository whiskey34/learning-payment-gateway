<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use Midtrans\Config;
use Midtrans\Snap; 
use CodeIgniter\Controller;

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		Config::$serverKey = 'your-midtrans-server-key';
		Config::$clientKey = 'your-midtrans-client-key';
		Config::$isProduction = false; //set true if your ready to production
		Config::$isSanitized = true;
		Config::$is3ds = true;

		$this->load->helper('form');
        // $this->load->helper('security');
		$this->load->helper('curl');

		
		// for load any data from model
		$this->load->model(['product_m', 'supplier_m', 'kasir_m', 'user_m']);
        $this->load->library('form_validation', 'session');
		
        

	}

	public function index()
	{
		$user = $this->user_m->get()->result();
		$products = $this->product_m->get()->result();
		// var_dump($user);
        // die;

		// filtering user for cashier only
		$filtered_users = array_filter($user, function ($user) {
			return $user->level == 2;
		});

		

		// $data['row'] = $this->product_m->get();

		
		$data = array(
			'title' => "Order via kasir",
			'cashiers' => $filtered_users,
			'product' => $products,
			'row' => $products,
			
		);
		

		$this->template->load('template', 'pages/kasir/kasir', $data);
	}

	
	
	public function get_product_price() {
        $product_id = $this->input->post('product_id');
        $product_price = $this->kasir_m->get_product_price($product_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['harga' => $product_price]));
    }

	public function process_order()
	{

		$json_data = file_get_contents("php://input");
		$order_data = json_decode($json_data, true);

		

		if (json_last_error() != JSON_ERROR_NONE) {
			$response = array('error' => 'JSON decoding error: ' . json_last_error_msg());


		} else {
			// insert the data into model to db
			$order_id = $this->kasir_m->insert_order($order_data);

			$this->session->set_userdata('order_data', $order_data);

			

			redirect('kasir/confirm_order');

			
		}	
		
		
	

	}

	public function confirm_order()
	{
		// Retrieve order data from the session
		$order_data = $this->session->userdata('order_data');

		// Cast gross_amount to float
		$gross_amount = $order_data['totals'][0];
		$gross_amount = str_replace(',', '', $gross_amount);
		$gross_amount = (float) $gross_amount;

		// Other parameters
		$shipCost = $order_data['shipCost'];
		$name = $order_data['first_name'];
		$date = $order_data['date_order'];
		$address = $order_data['address'];

		// Check if payment was successful
		$payment_status = $this->session->flashdata('payment_status');
		if ($payment_status === 'success') {
			// Payment was successful, handle accordingly
			// ...

			// For example, you can display a success message
			$this->session->set_flashdata('success_message', 'Payment was successful!');

			// Clear the payment_status flashdata to avoid showing the success message on subsequent requests
			$this->session->unset_flashdata('payment_status');
		}

		// Construct params array
		$params = array(
			'transaction_details' => array(
				'order_id' => rand(),
				'gross_amount' => (float) $gross_amount,
				'shipping_cost' => $shipCost,
			),
			'customer_details' => array(
				'name' => $name,
				'address' => $address,
				'email' => "pratama.hanif683@gmail.com",
			),
		);
		// var_dump((float) $gross_amount);

		// Get SnapToken
		$snapToken = Snap::getSnapToken($params);

		// Pass data to the view
		$data = array(
			'title' => "Confirm Order",
			'order_id' => rand(),
			'total' => (float) $gross_amount, // Use the casted gross_amount here
			'shipCost' => $shipCost,
			'token' => $snapToken,
			'name' => $name,
			'date' => $date,
			'address' => $address,
			// 'email' => $email
		);

		// Load the view
		$this->template->load('template', 'pages/kasir/confirmed_order', $data);
	}


	public function handleNotif() {
         // Set a variable to indicate success
		$paymentSuccess = true;

		// Store payment status in session
		$this->session->set_flashdata('payment_status', $paymentSuccess ? 'success' : 'failure');

		// Retrieve order data from the session
		$order_data = $this->session->userdata('order_data');

		// Construct data array for SweetAlert
		$sweetAlertData = array(
			'title' => 'Payment Success',
			'message' => 'Thank you for your purchase!',
			'order_id' => $order_data['order_id'], // Add any other relevant data
		);

		// Pass data to the view
		$data = array(
			'sweetAlertData' => $sweetAlertData,
			// Add any other data needed for the view
		);

		// Load the view
		$this->template->load('template', 'pages/order/list', $data);
    }




}
