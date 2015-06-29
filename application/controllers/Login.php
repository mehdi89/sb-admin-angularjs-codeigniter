<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * 
     */
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('login_model', 'model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function submit() {
        $uname = $this->input->post('username');
        $pwd = $this->input->post('password');

        $result = $this->model->login($uname, $pwd);

        if ($result) {
            $this->session->set_userdata('login_state', TRUE);
            $this->session->set_userdata('auth', $this->model->get_role($result->Role));
            $this->session->set_userdata('user', $result);
            redirect('/', TRUE);
        } else {
            redirect('login', TRUE);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login', TRUE);
    }

}
