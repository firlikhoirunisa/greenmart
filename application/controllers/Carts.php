<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Carts_model');
        $this->load->model('Products_model');
    }

    public function index() {
        $data['carts'] = $this->Carts_model->get_all_carts();
        $this->load->view('carts/index', $data);
    }
    public function add_cart($productId) {
        $data['product'] = $this->Products_model->get_product_by_id($productId);
        $this->load->view('carts/add_carts', $data);

    }
    public function add() {
        // Ambil produk dari database
        $productId = $this->input->post('id');
        $userId = $this->input->post('userid');
        $quantity = $this->input->post('quantity');

        // Data untuk dimasukkan ke dalam keranjang
        $data = array(
            'cartid'      => null,
            'userid' => $userId,
            'productid'   => $productId,
            'quantity'     => $quantity
        );

        // Tambahkan produk ke dalam keranjang
        $this->Carts_model->add_cart($data);

        redirect('index.php/carts/add_cart/'.$productId);
    }

    public function remove($rowid) {
        $this->cart->remove($rowid);
        redirect('cart');
    }
}

