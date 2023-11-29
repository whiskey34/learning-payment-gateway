<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		check_not_login();
        $this->load->model('supplier_m');
        // $this->load->library('form_validation');
    }

	public function index()
	{
		$data = array(
			'title' => "Supllier",
		);

        $data['row'] = $this->supplier_m->get();

		$this->template->load('template', 'pages/supplier/supplier', $data);
	}

    
    
    public function add()
    {
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        
        $data = [
            'subtitle' => 'Add',
            'page' => 'add',
            'row' => $supplier
        ];

        $this->template->load('template', 'pages/supplier/supplier_form', $data);
    }

    public function edit($id = null)
    {
        $supplier = new stdClass();

        if (!empty($id)) {
            $query = $this->supplier_m->get($id);
            if ($query->num_rows() > 0) {
                $supplier = $query->row();
            } else {
                echo "<script>alert('Data not found.');</script>";
                echo "<script>window.location='".site_url('supplier/index')."'; </script>";
                return;
            }
        }

        $data = [
            'subtitle' => empty($id) ? 'Add' : 'Edit',
            'page' => 'Edit',
            'row' => $supplier,
        ];

        $this->template->load('template', 'pages/supplier/supplier_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);

         // Debugging: Print the $post array to see its contents
        // echo '<pre>';
        // print_r($post);
        // echo '</pre>';

        if ($post) {
            // Check if supplier_id is present for editing
            if (!empty($post['supplier_id'])) {
                $this->supplier_m->edit($post);
            } else {
                $this->supplier_m->add($post);
            }
        }

        // Redirect to the index page after processing
        redirect('supplier/index');
    }
    
    

    public function delete($id)
    {
        // $id = $this->input->post('supplier_id');
        $this->supplier_m->delete($id);

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data has been deleted')</script>";
        } 
        echo "<script>window.location='".site_url('supplier/index')."';</script>";
    }
}
