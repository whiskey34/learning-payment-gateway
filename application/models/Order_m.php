<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('order_history');
        if ($id != null) {
            $this->db->where('history_id', $id);
        } 

        $query = $this->db->get();

        if (!$query) {
            // Error handling
            echo $this->db->last_query(); // Output the last query for debugging
            echo $this->db->error();      // Output the database error
            return false;
        }
    

        return $query->result();
    }

    public function get_total_rows() {
        return $this->db->count_all('order_history');
    }

    public function get_row($limit, $offset)
    {
        $this->db->from('order_history');
        $this->db->limit($limit, $offset);

        $query = $this->db->get();

        if (!$query) {
            // Log and handle errors as needed
            log_message('error', 'Error in query: ' . $this->db->last_query());
            log_message('error', 'Database error: ' . $this->db->error()['message']);
            return false;
        }

        return $query->result();
    }

}

?>