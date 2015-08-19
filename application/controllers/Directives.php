<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Directives extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    /**
     *
     */
    public function sidebar()
    {
        $this->load->view('directives/sidebar');
    }

    public function header()
    {
        $this->load->view('directives/header');
    }

    public function stats()
    {
        $this->load->view('directives/stats');
    }
}
