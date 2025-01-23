<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts_model extends CI_Model {
    public function get_all_carts() {
        return $this->db->get('carts')->result();
    }

    public function add_cart($data) {
        return $this->db->insert('carts', $data);
    }

    public function update_cart($cartId, $data) {
        $this->db->where('cartId', $cartId);
        return $this->db->update('carts', $data);
    }

    public function delete_cart($cartId) {
        $this->db->where('cartId', $cartId);
        return $this->db->delete('carts');
    }
}
