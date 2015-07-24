<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Global_info extends MY_Controller {

    /**
     * 
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Global_model', 'model');
    }

    public function all() {
        //get all value globally to use multiple time without http request in app
        $data['role'] = $this->get_role();
        $data['navigation'] = $this->get_navigation();
        $data['users'] = $this->get_users();

        echo json_encode($data);
    }
    
    public function get_users() {
        return $this->model->get_users();
    }

    public function get_role() {
        return $this->model->get_role();
    }

    public function get_navigation() {
        return $this->model->get_navigation();
    }

}

?>