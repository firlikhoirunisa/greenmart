<?php 
class Payments_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this-> load->database();
    }
    public function get_payments_by_id($paymentId) {
        $this->db->select('orders.*, payments.*');
        $this->db->from('orders');
        $this->db->join('payments', 'orders.orderId = payments.orderId');
        $this->db->where('payments.paymentId', $paymentId); // Perbaikan kondisi
        return $this->db->get()->row(); // Mengembalikan satu baris data
    }
    
    public function get_all_payment() {
        $this->db->select('payments.*, orders.orderStatus, orders.totalAmount, users.username, users.email, users.phoneNumber, users.address, products.productName, orderitems.quantity, orderitems.price, products.imageUrl, products.description, products.price');
        $this->db->from('payments');
        $this->db->join('orders', 'orders.orderId = payments.orderId');
        $this->db->join('orderitems', 'orderitems.orderId = orders.orderId');
        $this->db->join('products', 'products.productId = orderitems.productId');
        $this->db->join('users', 'users.userId = orders.userId');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_all($orderId) {
        $this->db->select('payments.*, orders.orderStatus, orders.totalAmount, users.username, users.email, users.phoneNumber, users.address, products.productName, orderitems.quantity, orderitems.price');
        $this->db->from('payments');
        $this->db->join('orders', 'orders.orderId = payments.orderId');
        $this->db->join('orderitems', 'orderitems.orderId = orders.orderId');
        $this->db->join('products', 'products.productId = orderitems.productId');
        $this->db->join('users', 'users.userId = orders.userId');
        $this->db->where('orders.userId', $orderId);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_payment($data) {
        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }
    public function update_payment($paymentId, $data) {
        $this->db->where('paymentId', $paymentId);
        return $this->db->update('payments', $data);
    }
}