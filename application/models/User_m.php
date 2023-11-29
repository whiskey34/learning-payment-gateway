<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();

        return $query;

    }

    public function get($id = null) {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        } 

        $query = $this->db->get();
        return $query;

    }

    public function add($data)
    {
         // Insert user data into the 'users' table
         $this->db->insert('user', $data);
    }

    public function edit($post)
    {
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = $post['password'];

        }
        $params['email'] = $post['email'];
        $params['name'] = $post['name'];
        $params['level'] = $post['level'];
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
         // Insert user data into the 'users' table
         $this->db->where('user_id', $post['user_id']);
         $this->db->update('user', $params);
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    // public function clear_session()
    // {
    //     $this->session->sess_destroy();
    // }
}
?>