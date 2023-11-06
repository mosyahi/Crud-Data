<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function check_login($username, $password) {
        $query = $this->db->get_where('tb_users', array('email' => $username, 'password' => $password));
        return $query->row();
    }
}
