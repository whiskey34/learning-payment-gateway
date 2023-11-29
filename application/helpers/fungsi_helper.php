<?php 

function check_already_login() {
    $ci = get_instance(); // add "&" after "=" if get any trouble
    $user_session = $ci->session->userdata('user_id');
    if($user_session){
        redirect('dashboard/index');
    }
} //untuk fungsi jika user sudah login 

function check_not_login() {
    $ci = get_instance(); // add "&" after "=" if get any trouble
    $user_session = $ci->session->userdata('user_id');
    if(!$user_session){
        redirect('auth/login');
    }
}//jika belum login

function check_admin() {
    $ci = get_instance(); // add "&" after "=" if get any trouble
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard/index');
    }
}



?>