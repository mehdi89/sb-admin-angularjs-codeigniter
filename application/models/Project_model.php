<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function get_navigations($roleId, $userId) {
        $query = $this->db->query("SELECT NavigationId, NavName, NavOrder,ParentNavId,ActionPath
From navigations where NavigationId in(SELECT a.Navigations FROM navigviewright a 
WHERE a.Roles=" . $this->db->escape($roleId) . " or a.Users=" . $this->db->escape($userId) . ")
order by NavOrder");
        return $query->result();
    }

}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */