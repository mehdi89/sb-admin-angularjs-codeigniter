<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NavigViewRight extends MY_Controller {

    /**
     * 
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        //check in authenticated
        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'navigviewright')) {
            //if yes then proceed 
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('NavigViewRight_view', $data);
        } else {
            //else load permission deny page 
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $this->load->view('forbidden', $data);
        }
    }

    public function operation() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));
            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('NavgViewId', 'Navigations', 'Roles', 'Users');

            switch ($type) {
                case 'create':
                    if ($this->auth->IsInsert) {
                        $result = $result->create('navigviewright', $columns, $request->models, 'NavgViewId');
                    }
                    break;
                case 'read':
                    $result = $result->read('navigviewright', $columns, $request);
                    break;
                case 'update':
                    if ($this->auth->IsUpdate) {
                        $result = $result->update('navigviewright', $columns, $request->models, 'NavgViewId');
                    }
                    break;
                case 'destroy':
                    if ($this->auth->IsDelete) {
                        $result = $result->destroy('navigviewright', $request->models, 'NavgViewId');
                    }
                    break;
            }

            echo json_encode($result, JSON_NUMERIC_CHECK);
        }
    }

}

?>