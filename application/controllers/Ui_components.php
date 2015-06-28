<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ui_components extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function Button()
	{
		$this->load->view('Ui_components/Button');
	}
	public function Dialog()
	{
		$this->load->view('Ui_components/Dialog');
	}
	public function Forms()
	{
		$this->load->view('Ui_components/Forms');
	}
	public function Tabs()
	{
		$this->load->view('Ui_components/Tabs');
	}
	public function Toast()
	{
		$this->load->view('Ui_components/Toast');
	}
}
