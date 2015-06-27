<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $table = 'Users';

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    function login($username, $password) {
        $this->db->select('UserId, UserName, Email, FirstName, LastName, Role');
        $this->db->from('users');
        $this->db->where('UserName', $username);
        $this->db->where('Password', $password);
        $this->db->where('IsActive', TRUE);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_role($roleId) {
        return $this->db->where('RoleId', $roleId)->get('roles')->row();
    }

}

?>