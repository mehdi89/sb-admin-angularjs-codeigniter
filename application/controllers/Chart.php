<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends MY_Controller {

    /**
     * 
     */
    public function index() {
        $this->load->view('chart');
    }

}
