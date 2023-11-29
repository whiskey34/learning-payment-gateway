<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		check_not_login();
        $this->load->model('product_m');
        $this->load->model('supplier_m');
        // $this->load->library('form_validation');
    }


    public function index()
    {
        $data = [
            'title' => "Product",
        ];

        $data['row'] = $this->product_m->get();

		$this->template->load('template', 'pages/product/product_list', $data);
    }

    public function add()
    {
        $product = new stdClass();
        $product->product_id = null;
        $product->name = null;
        $product->images = null;
        $product->stock = null;
        $product->description = null;
        $product->harga = null;
        $product->supplier_id = null;
        
        // Fetch supplier data from your model
        $suppliers = $this->supplier_m->get()->result(); 
        // var_dump($suppliers);
        // die;

        $data = [
            'page' => 'add',
            'subtitle' => 'Add',
            'row' => $product,
            'suppliers' => $suppliers,
            'title' => "Add prdouct form"
        ];

        $this->template->load('template', 'pages/product/product_form', $data);
    }

    public function edit($id = null)
    {
        $product = new stdClass();
        $suppliers = $this->supplier_m->get()->result();

        if (!empty($id)) {
            $query = $this->product_m->get($id);
            if ($query->num_rows() > 0) {
                $product = $query->row();
            } else {
                echo "<script>alert('Data not found.');</script>";
                echo "<script>window.location='".site_url('product/index')."'; </script>";
                return;
            }
        }

        $data = [
            'page' => 'add',
            'subtitle' => empty($id) ? 'Add' : 'Edit',
            'row' => $product,
            'suppliers' => $suppliers,
            'title' => "Edit product form"
        ];

        $this->template->load('template', 'pages/product/product_form', $data);
    }

    public function img_upload()
    {
        $config['upload_path'] = './public/upload_img/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 5120; //5x1024 = 5120
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
    }

    // public function process()
    // {
    //     $post = $this->input->post(null, TRUE);

    //      Debugging: Print the $post array to see its contents
    //     echo '<pre>';
    //     print_r($post);
    //     echo '</pre>';


    //     if ($post) {
    //         Check if supplier_id is present for editing
    //         if (!empty($post['product_id'])) {
    //             $this->product_m->edit($post);
    //         } else {
    //             $this->product_m->add($post, $ImagePath);
    //         }
    //     }

        
    //     redirect('product/index');
    // }

    public function process()
{
    $this->img_upload();
    $post = $this->input->post(null, TRUE);

    // Debugging: Print the $post array to see its contents
    echo '<pre>';
    print_r($post);
    echo '</pre>';

    // Check if the form was submitted
    if (!empty($post)) {
        // Check if the file upload library is loaded
        if ($this->upload->do_upload('img')) {
            $data = $this->upload->data();
            $ImagePath = './public/upload_img/' . $data['file_name'];

            // Now $ImagePath contains the uploaded image file name
            // You can use it in your model or wherever needed

            // Check if product_id is present for editing
            if (!empty($post['product_id'])) {
                $this->product_m->edit($post, $ImagePath);
            } else {
                $this->product_m->add($post, $ImagePath);
            }

            // Redirect to the index page after processing
            redirect('product/index');
        } else {
            // Image upload failed
            $error = $this->upload->display_errors();
            echo "Image upload failed: $error";
        }
    }
}


    public function delete($id)
    {
        // $id = $this->input->post('supplier_id');
        $this->product_m->delete($id);

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data has been deleted')</script>";
        } 
        echo "<script>window.location='".site_url('product/index')."';</script>";
    }
    
}
?>