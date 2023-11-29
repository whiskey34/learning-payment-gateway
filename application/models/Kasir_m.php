<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir_m extends CI_Model {

    public function get($id = null) {
        $this->db->from('orders');
        if ($id != null) {
            $this->db->where('order_id', $id);
        } 

        $query = $this->db->get();
        return $query;

    }

    public function insert_order($order_data)
    {
        $this->db->trans_start(); // transactions when dealing with multiple database operations to ensure data integrity. If any part of the transaction fails, all changes can be rolled back.

        // Clean and convert total_amount to a float
        $raw_amount = $order_data['total'][0];
        $total_amount = floatval(str_replace(['Rp. ', ','], '', $raw_amount));


        $order = [
            'user_id' => $order_data['cashier_id'],
            'date_order' => $order_data['date_order'],
            'first_name' => $order_data['first_name'],
            'last_name' => $order_data['last_name'],
            'address' => $order_data['address'],
            'city' => $order_data['city'],
            'postcode' => $order_data['zip_code'],
            'shipping_cost' => $order_data['shipCost'],
            'total_amount' => $total_amount,
            'status' => 'waiting payment', //hardcode status 

        ];

        // Insert order details into 'orders' table
        $this->db->insert('orders', $order);
        $order_id = $this->db->insert_id();

        // Insert the initial order status into 'order_history' table
        $order_history = [
            'order_id' => $order_id,
            'status' => $order['status'],
        ];

        $this->db->insert('order_history', $order_history);


        // Extract and insert each product in the 'products' array
        foreach ($order_data['products'] as $product) {
            // Validate stock availability (optional)
            $current_stock = $this->get_product_stock($product['product_id']);
            if ($current_stock < $product['quantity']) {
                // Handle insufficient stock scenario (e.g., show an error message)
                $this->db->trans_rollback();
                $response = ['status' => 'error', 'message' => 'Insufficient stock for product ID: ' . $product['product_id']];
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode($response));
                return;
            }

            // Update product stock
            $new_stock = $current_stock - $product['quantity'];
            $this->update_product_stock($product['product_id'], $new_stock);

            $orderItem = [
                'order_id' => $order_id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ];

            // Insert each product into 'order_items' table
            $this->db->insert('order_items', $orderItem);
        }

        // Example debugging
        // echo '<pre>';
        // print_r($order);
        // print_r($order_data);
        // echo '</pre>';
        // die();

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $response = ['status' => 'error', 'message' => 'Transaction failed!'];
        } else {
            $response = ['status' => 'success', 'message' => 'Data inserted successfully!'];
        }
        
        // Return a JSON response
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($response));
    }

    public function get_product_price($product_id)
    {
        $query = $this->db->get_where('product', ['product_id' => $product_id]);

        // Check if the query returned a result
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->harga;
        } else {
            // Return a default value or handle the case where no price is found
            return 0;
        }
    }

    public function get_product_stock($product_id) {
        // Implement logic to get the current stock for a given product ID
        // For example:
        $this->db->select('stock');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('product');
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->stock;
        } else {
            return 0; // or handle the case where the product is not found
        }
    }
    
    public function update_product_stock($product_id, $new_stock) {
        // Implement logic to update the product stock for a given product ID
        // For example:
        $this->db->where('product_id', $product_id);
        $this->db->update('product', ['stock' => $new_stock]);
    }
}
?>