<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        // $this->load->library('session');
    }

	public function login()
	{
        check_already_login();
		$data = array(
			'title' => "Login",
		);

		$this->load->view('auth/login', $data);

	}

    public function register()
    {
        $data = array(
            'title' => "Sign Up",
        );

        $this->load->view('auth/register', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['signin'])){
            // $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if($query->num_rows() > 0) {
                // echo "login berhasil";
                $row = $query->row();
                // echo $row->username;

                $params = [
                    'user_id' => $row->user_id, 
                    'level' => $row->level,
                ];

                $this->session->set_userdata($params);
                // var_dump($this->session->userdata());
                echo "<script>
                    alert('Selamat login berhasil');
                    window.location='".site_url('dashboard/index')."';
                </script>"; // diganti dengan sweetalert 
                
            } else {
                echo "<script>
                    alert('login gagal username/password salah');
                    window.location='".site_url('auth/login')."';
                </script>"; // diganti dengan sweetalert nanti
            }
        } 
    }

    public function process_regist()
    {
        echo "signup here";
    }

    public function logout()
    {
        $params = ['user_id', 'level'];
        $this->session->unset_userdata($params);
        redirect('auth/login'); // Redirect to login page or any other desired page
    }
}
