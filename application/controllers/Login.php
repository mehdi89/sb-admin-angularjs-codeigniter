<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('login_model', 'model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
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
