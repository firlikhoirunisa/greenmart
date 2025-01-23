<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Payments_model');
        $this->load->model('Orders_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        
        $data['orders'] = $this->Payments_model->get_all_payment();

        $this->load->view('payments/index', $data);
    }
    public function paymentss($orderId) {
        $data['order'] = $this->Payments_model->get_all($orderId);

        $this->load->view('payments/payment', $data);
    }
    

    public function add_payment() {
       
        // Validasi input
        $this->form_validation->set_rules('paymentMethod', 'Payment Method', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan pesan error
            $this->session->set_flashdata('error', 'Metode pembayaran harus dipilih.');
            redirect('checkout'); // Kembali ke halaman checkout
        } else {
            // Ambil data dari form
            $orderId = $this->input->post('orderId');
            $data = [
                'orderId' => $this->input->post('orderId'),
                'paymentMethod' => $this->input->post('paymentMethod'),
                'paymentStatus' => $this->input->post('orderStatus'),
                'paymentDate' => date('Y-m-d H:i:s') // Timestamp saat pesanan dibuat
            ];

            // Simpan data ke database melalui model
            $insert_id = $this->Payments_model->insert_payment($data);

            if ($insert_id) {
                // Jika berhasil, tampilkan pesan sukses
                $this->session->set_flashdata('success', 'Pesanan Anda berhasil dibuat.');
                redirect('index.php/payments/paymentss/'.$orderId); // Redirect ke halaman sukses
            } else {
                // Jika gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat membuat pesanan.');
                redirect('checkout');
            }
        }
    }

    public function success() {
        // Tampilkan halaman sukses
        $this->load->view('orders/success');
    }

    
}
?>