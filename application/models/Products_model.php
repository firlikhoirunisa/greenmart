<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
    public function get_all_products() {
        return $this->db->get('products')->result(); // Asumsi tabel produk bernama `products`
    }

    public function get_product_by_id($productId) {
        $this->db->where('productId', $productId);
        return $this->db->get('products')->row();
    }

    public function insert_product($data) {
        $this->db->insert('products', $data);
    }
}
