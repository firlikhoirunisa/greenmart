<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Carts_model');
        $this->load->model('Orders_model');
    }

    public function index() {
        $data['cart_items'] = $this->Carts_model->get_all_carts(); // Ambil semua item di keranjang
        $this->load->view('checkout/index', $data);
    }

    public function process() {
        $userId = 1; // Misalnya pengguna ID 1 (disesuaikan)
        
        // Simpan data pesanan
        $order_data = [
            'userId' => $userId,
            'orderDate' => date('Y-m-d H:i:s'),
        ];
        $orderId = $this->Orders_model->create_order($order_data);

        // Simpan item pesanan
        $cart_items = $this->Carts_model->get_all_carts();
        $order_items = [];
        foreach ($cart_items as $item) {
            $order_items[] = [
                'orderId' => $orderId,
                'productId' => $item->productId,
                'quantity' => $item->quantity,
                'price' => 0 // Diisi sesuai harga produk (jika ada)
            ];
        }
        $this->Orders_model->add_order_items($order_items);

        // Kosongkan keranjang
        $this->db->truncate('carts');

        redirect('orders'); // Redirect ke daftar pesanan
    }
}
