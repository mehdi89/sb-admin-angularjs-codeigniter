<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    public $table = 'users';

    public function get_roles_list() {
        return $this->db->select('RoleId, RoleName')->get('roles')->result();
    }

    public function get_navigations_list() {
        return $this->db->select('NavigationId, NavName')->get('navigations')->result();
    }

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function get_page($size, $pageno) {
        $this->db
                ->limit($size, $pageno)
                ->select('users.UserId,users.UserName,users.Password,users.FirstName,users.LastName,users.Email,roles.RoleName as roles_RoleName,users.Role,navigations.NavName as navigations_NavName,users.NavigationId,users.IsActive')
                ->join('roles', 'users.Role = roles.RoleId', 'left outer')
                ->join('navigations', 'users.NavigationId = navigations.NavigationId', 'left outer');

        $data = $this->db->get($this->table)->result();
        $total = $this->count_all();
        return array("data" => $data, "total" => $total);
    }

    public function get_page_where($size, $pageno, $params) {
        $this->db->limit($size, $pageno)
                ->select('users.UserId,users.UserName,users.Password,users.FirstName,users.LastName,users.Email,roles.RoleName as roles_RoleName,users.Role,navigations.NavName as navigations_NavName,users.NavigationId,users.IsActive')
                ->join('roles', 'users.Role = roles.RoleId', 'left outer')
                ->join('navigations', 'users.NavigationId = navigations.NavigationId', 'left outer');

        if (isset($params->UserName) && !empty($params->UserName)) {
            $this->db->like("users.UserName", $params->UserName);
        }
        if (isset($params->FirstName) && !empty($params->FirstName)) {
            $this->db->like("users.FirstName", $params->FirstName);
        }
        if (isset($params->LastName) && !empty($params->LastName)) {
            $this->db->like("users.LastName", $params->LastName);
        }
        if (isset($params->Email) && !empty($params->Email)) {
            $this->db->like("users.Email", $params->Email);
        }
        if (isset($params->Role) && !empty($params->Role)) {
            $this->db->where("users.Role", $params->Role);
        }
        if (isset($params->NavigationId) && !empty($params->NavigationId)) {
            $this->db->where("users.NavigationId", $params->NavigationId);
        }
        if (isset($params->IsActive) && !empty($params->IsActive)) {
            $this->db->where("users.IsActive", $params->IsActive);
        }

        $data = $this->db->get($this->table)->result();
        $total = $this->count_where($params);
        return array("data" => $data, "total" => $total);
    }

    public function count_where($params) {
        $this->db
                ->join('roles', 'users.Role = roles.RoleId', 'left outer')
                ->join('navigations', 'users.NavigationId = navigations.NavigationId', 'left outer');

        if (isset($params->UserName) && !empty($params->UserName)) {
            $this->db->like("users.UserName", $params->UserName);
        }
        if (isset($params->FirstName) && !empty($params->FirstName)) {
            $this->db->like("users.FirstName", $params->FirstName);
        }
        if (isset($params->LastName) && !empty($params->LastName)) {
            $this->db->like("users.LastName", $params->LastName);
        }
        if (isset($params->Email) && !empty($params->Email)) {
            $this->db->like("users.Email", $params->Email);
        }
        if (isset($params->Role) && !empty($params->Role)) {
            $this->db->where("users.Role", $params->Role);
        }
        if (isset($params->NavigationId) && !empty($params->NavigationId)) {
            $this->db->where("users.NavigationId", $params->NavigationId);
        }
        if (isset($params->IsActive) && !empty($params->IsActive)) {
            $this->db->where("users.IsActive", $params->IsActive);
        }

        return $this->db->count_all_results($this->table);
    }

    public function count_all() {
        return $this->db
                        ->count_all_results($this->table);
    }

    public function get($id) {
        return $this->db->where('UserId', $id)->get($this->table)->row();
    }

    public function add($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        return $this->db->where('UserId', $id)->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('UserId', $id)->delete($this->table);
        return $this->db->affected_rows();
    }

}

?>