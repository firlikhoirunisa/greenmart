<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    public function __construct() {
            parent::__construct();
            $this->load->library('cart'); // Menggunakan library cart
            $this->load->model('Orders_model');
            $this->load->model('Products_model');
        }
    
    public function index($userId) {
        $data['orders'] = $this->Orders_model->get_orders($userId);
        $this->load->view('orders/index', $data);
    }
    public function add_cart($productId) {
        
        $this->load->view('carts/add_carts', $data);
    }
    public function add_order() {

        // Sample data
        
        $userId = $this->session->userdata('userId'); // Normally from session or request
        $orderId = $this->Orders_model->get_order('userId');
        $totalAmount = $this->input->post('total');

        $orderData = [
            'userId' => $userId,
            'totalAmount' => $totalAmount,
            'orderStatus' => 'Pending'
        ];

        $orderId = $this->Orders_model->insert_order($orderData);
        
        $this->session->set_flashdata('success','Order successfully created!" : "Failed to create order.');
        redirect('index.php/payments');

    }

    
}
    

?>
