<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login(); //fungsi dari helper untuk jika tidak/ belum login 
        check_admin();
        $this->load->model('user_m');
        // $this->load->library('session');
        $this->load->library('form_validation');

    }

	public function index()
	{
		
		$data = array(
			'title' => "User-settings",
		);

        $data['row'] = $this->user_m->get();

		$this->template->load('template', 'pages/user-setting', $data);

	}

    public function add()
    {
        $data = [
            'title' => "Add New User",
        ];

        
        // print_r($_POST['username']);
        // die;
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]');
        $this->form_validation->set_rules('passconf', 'password', 'required|matches[password]',
            array('matches' => '%s Tidak sama')
        );

        $this->form_validation->set_message('required', '%s masih kosong, harap diisi !');
        $this->form_validation->set_message('min_lenght', '{field} minimal {params} character!');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan !');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('template', 'pages/user_form_add', $data);
        } else {
            // echo "User baru berhasil terbuat";
            // $post = $this->input->post(null, TRUE);
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'level' => $this->input->post('level'),
                'password' => sha1($this->input->post('password'))
            );
    
            // Call the model function to add the user
            $user_id = $this->user_m->add($data);
            // $this->user_m->add($data);
            // redirect('user/index');

            if($this->db->affected_rows() > 0) {
                echo "<script>alert('Data has been saved')</script>";
            } 
            echo "<script>window.location='".site_url('user/index')."';</script>";

        }
    }


    public function edit($id)
    {
        $data = [
            'title' => "Edit User",
        ];

        
        // print_r($_POST['username']);
        // die;
        $this->form_validation->set_rules('username', 'username', 'required|callback_username_check');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');
        if($this->input->post('password')) {

            $this->form_validation->set_rules('password', 'password', 'min_length[3]');
            $this->form_validation->set_rules('passconf', 'password', 'matches[password]',
                array('matches' => '%s Tidak sama')
            );
        }

        if($this->input->post('passconf')) {

            $this->form_validation->set_rules('passconf', 'password', 'matches[password]',
                array('matches' => '%s Tidak sama')
            );
        }

        $this->form_validation->set_message('required', '%s masih kosong, harap diisi !');
        $this->form_validation->set_message('min_lenght', '{field} minimal {params} character!');
        $this->form_validation->set_message('is_unique', '{field} sudah digunakan !');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        if ($this->form_validation->run() == FALSE)
        {
            $query= $this->user_m->get($id);
            if($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'pages/user_form_edit', $data);
            } else {
                echo "<script>alert('Data not found')";
                echo "window.location='".site_url('user/index')."';</script>";

            }
        } else {
            // echo "User berhasil diedit";
            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);


            if($this->db->affected_rows() > 0) {
                echo "<script>alert('Data has been saved')</script>";
            } 
            echo "<script>window.location='".site_url('user/index')."';</script>";

        }
    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan ganti');
            return False;
        } else {
            return TRUE;
        }
    }

    public function delete()
    {
        $id = $this->input->post('user_id');
        $this->user_m->delete($id);

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data has been delete')</script>";
        } 
        echo "<script>window.location='".site_url('user/index')."';</script>";
    }


}
