<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

    public function get_user($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }
}
