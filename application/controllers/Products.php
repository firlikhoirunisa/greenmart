<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
    }

    public function detail($productId) {
        $data['product'] = $this->Products_model->get_product_by_id($productId);

        if (!$data['product']) {
            show_404(); // Produk tidak ditemukan
        }

        $this->load->view('products/detail', $data);
    }
}
