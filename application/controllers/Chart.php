<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

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
	public function index()
	{
		$this->load->view('chart');
	}

	public function get_accounts()
	{
		$query = $this->db->select('*')
		->from('accounts')
		->get();
		$month = [];
		$type = [];
		$income = [];
		$expend = [];
		foreach ($query->result() as $key => $value) {
			if (!in_array($value->month, $month)) {
				array_push($month, $value->month);
			}

			if (!in_array($value->type, $type)) {
				array_push($type, $value->type);
			}
			if ($value->type === "income") {
				array_push($income, $value->amount);
			} elseif ($value->type === "expend") {
				array_push($expend, $value->amount);
			}
		}
		$data['month'] = $month;
		$data['type'] = $type;
		$data['data'] = [0 => $income, 1 => $expend];

		echo json_encode($data);
	}
}
