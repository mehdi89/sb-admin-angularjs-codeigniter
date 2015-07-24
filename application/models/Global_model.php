<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Global_model extends CI_Model {
    
    public function get_role() {
       return $this->db->select('RoleId as value, RoleName as text')->get('roles')->result(); 
    }
    public function get_navigation() {
       return $this->db->select('NavigationId as value, NavName as text')->get('navigations')->result(); 
    }
    public function get_users() {
       return $this->db->select('UserId as value, UserName as text')->where(['IsActive' => 1])->get('users')->result(); 
    }
}

?>