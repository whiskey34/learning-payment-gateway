<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_m extends CI_Model {
    
    public function get($id = null) {
        $this->db->from('product');
        if ($id != null) {
            $this->db->where('product_id', $id);
        } 

        $query = $this->db->get();
        return $query;

    }

    public function add($post, $ImagePath)
    {
        $params = [
            'name' => $post['name'],
            // 'images' => $post['img'],
            'images' => $ImagePath,
            'stock' => $post['stock'],
            'harga' => $post['harga'],
            'description' => $post['description'],
            'supplier_id' => $post['supplier'],

        ];

        $this->db->insert('product', $params);

        if ($this->db->affected_rows() > 0) {
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data: " . $this->db->error();
        }
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'images' => $post['img'],
            'stock' => $post['stock'],
            'harga' => $post['harga'],
            'description' => $post['description'],
            'supplier_id' => $post['supplier'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Check if supplier_id is present for editing
        if (!empty($post['product_id'])) {
            $this->db->where('product_id', $post['product_id']);
            $this->db->update('product', $params);
        } else {
            // Set created timestamp for new record
            $params['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('product', $params);
        }
    }

    public function delete($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('product');
    }
}

?>