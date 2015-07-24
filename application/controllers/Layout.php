<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends MY_Controller {

    /**
     *
     */
    public function index() {
        $this->load->view('layout');
    }

}
