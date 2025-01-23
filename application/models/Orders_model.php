<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {
    public function create_order($data) {
        $this->db->insert('orders', $data); // Menyimpan data pesanan di tabel `orders`
        return $this->db->insert_id(); // Mendapatkan ID pesanan yang baru dibuat
    }

    public function add_order_items($items) {
        return $this->db->insert_batch('orderitems', $items); // Menambahkan item pesanan ke tabel `orderitems`
    }

    public function get_orders_by_user($userId) {
        $this->db->where('userId', $userId);
        return $this->db->get('orders')->result(); // Mengambil pesanan berdasarkan ID pengguna
    }

    public function get_order_details($orderId) {
        $this->db->select('orderitems.*, products.productName, products.price')
                 ->from('orderitems')
                 ->join('products', 'orderitems.productId = products.productId')
                 ->where('orderitems.orderId', $orderId);
        return $this->db->get()->result(); // Mengambil detail pesanan
    }

    // public function add_order($userId, $total, $orderdate) {
    //     $data = array(
    //         'userId' => $userId,
    //         'totalAmount' => $total,
    //         'orderDate' => $orderdate
    //     );
    //     $this->db->insert('orders', $data);
    // }
    // Menambahkan pesanan baru
    public function insert_order($data) {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }

    // Mendapatkan detail pesanan
    public function get_order($order_id) {
        $this->db->where('orderId', $order_id);
        return $this->db->get('orders')->row();
    }
}
