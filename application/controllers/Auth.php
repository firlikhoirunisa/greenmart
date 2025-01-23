<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model'); // Load model untuk autentikasi
    }

    public function index() {
        // Cek apakah user sudah login
        // if ($this->session->userdata('logged_in')) {
        //     redirect('dashboard'); // Redirect ke dashboard jika sudah login
        // }
        $this->load->view('auth/login'); // Tampilkan halaman login
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->login_model->get_user($username);
        $this->load->view('auth/login', $user);
        if ($user) {
            // Set session data
            $session_data = [
                'userid' => $user->userId,
                'username' => $user->username,
                'logged_in' => true
            ];

            $this->session->set_userdata($session_data);

            redirect('index.php/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah.');
            redirect('index/auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
