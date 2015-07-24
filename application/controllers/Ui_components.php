<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ui_components extends CI_Controller {

    /**
     * 
     */
    public function Button() {
        //load button view
        $this->load->view('Ui_components/Button');
    }

    public function Dialog() {
        //load dialog view
        $this->load->view('Ui_components/Dialog');
    }

    public function Forms() {
        //load Form view
        $this->load->view('Ui_components/Forms');
    }

    public function Tabs() {
        //load tabs view
        $this->load->view('Ui_components/Tabs');
    }

    public function Toast() {
        $this->load->view('Ui_components/Toast');
    }

}
