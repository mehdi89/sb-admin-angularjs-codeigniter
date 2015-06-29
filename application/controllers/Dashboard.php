<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    /**
     * 
     */
    public function main() {
        $this->load->view('dashboard/main');
    }

    public function home() {
        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'Home')) {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('dashboard/home', $data);
        } else {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $this->load->view('forbidden', $data);
        }
    }

}
