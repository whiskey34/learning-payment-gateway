<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		check_not_login(); //fungsi dari helper untuk jika tidak/ belum login 
		$data = array(
			'title' => "Dashboard",
		);

		$this->template->load('template', 'index', $data);

	}
}
