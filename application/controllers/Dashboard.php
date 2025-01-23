<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Carts_model');
    }

    public function index() {
        $data['products'] = $this->Products_model->get_all_products(); // Semua produk
        $data['carts_count'] = $this->db->count_all('carts'); // Total keranjang
        $data['orders_count'] = $this->db->count_all('orderitems'); // Total pesanan
        $this->load->view('dashboard/index', $data);
    }
    public function add_product() {
        // Menambah produk baru
        $this->load->view('dashboard/add_product');
    }

    public function save_product() {
        // Menyimpan produk ke database
        $product_data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'image' => $this->input->post('image')
        );
        $this->Product_model->insert_product($product_data);
        redirect('dashboard');
    }
}
