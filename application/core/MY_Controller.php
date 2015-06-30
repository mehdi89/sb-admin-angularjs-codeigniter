<?php

class MY_Controller extends CI_Controller {

    public $data = array();
    public $parser;

    function __construct() {
        parent::__construct();
        $data = new stdClass();
        $this->CI = &get_instance();

        require_once 'application/third_party/lib/DataSourceResult.php';
        //If you need validation library uncomment it and used for validation 
        //This is a validation library 
//        require_once 'application/third_party/gump.class.php';
        
      
        if ($this->session->userdata('login_state') == FALSE) {
            redirect("login");
        } else {
            $this->auth = $this->session->userdata('auth');
            $this->user = $this->session->userdata('user');
        }
    }

    protected function post() {
        return json_decode(file_get_contents("php://input"));
    }
    
    //check is authenticate users for requested action
    protected function is_authentic($roleId, $userId, $action) {
        $query = $this->db->query("SELECT NavigationId, NavName, NavOrder,ParentNavId,ActionPath
            From navigations where NavigationId in(SELECT a.Navigations FROM navigviewright a 
                WHERE a.Roles=" . $this->db->escape($roleId) . " or a.Users=" . $this->db->escape($userId) . ") AND ActionPath =" . $this->db->escape($action) . " order by NavOrder");
        return $query->num_rows() > 0;
    }

    protected $auth;
    protected $user;

    //You can use do_check_request for extra security
    //to ensure is this call valid post, get or ajax call 
//    example : $this->do_check_request("post", "ajax"); 
    protected function do_check_request($ar_call_type) {
        foreach ($ar_call_type as $str_call_type) {
            switch (strtolower($str_call_type)) {
                case 'ajax':
                    if (!$this->CI->input->is_ajax_request()) {
                        die('Not a valid AJAX request');
                    }
                    break;
                case 'cli':
                    if (!$this->CI->input->is_cli_request()) {
                        die('Not a valid CLI request');
                    }
                    break;
                case 'get':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'GET') {
                        die('This is not a valid GET request');
                    }
                    break;
                case 'post':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'POST') {
                        die('This is not a valid POST request');
                    }
                    break;
                case 'json':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'JSON') {
                        die('This is not a valid JSON request');
                    }
                    break;
                case 'jsonp':
                    if ($this->CI->input->server('REQUEST_METHOD') !== 'JSONP') {
                        die('This is not a valid JSONP request');
                    }
                    break;
                default:
                    die('Un authorised access detected');
                    break;
            }
        }
    }

}
