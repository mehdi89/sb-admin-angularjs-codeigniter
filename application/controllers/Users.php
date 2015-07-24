<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    /**
     * 
     */
    function __construct() {
        parent::__construct();
        $this->load->model('Users_model', 'model');
    }

    public function index() {
        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'Users')) {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('Users_view', $data);
        } else {
            $this->load->view('forbidden');
        }
    }
    
    //operation function used to perform read, create, update, delete (CRUD) operation. 
    public function operation() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json');

            $request = json_decode(file_get_contents('php://input'));
            $result = new DataSourceResult('');

            $type = $_GET['type'];

            $columns = array('UserId', 'UserName', 'Password', 'FirstName', 'LastName', 'Email', 'Role', 'IsActive');

            switch ($type) {
                case 'create':
                    if ($this->auth->IsInsert) {
                        $result = $result->create('users', $columns, $request->models, 'UserId');
                    }
                    break;
                case 'read':
                    $result = $result->read('users', $columns, $request);
                    break;
                case 'update':
                    if ($this->auth->IsUpdate) {
                        $result = $result->update('users', $columns, $request->models, 'UserId');
                    }
                    break;
                case 'destroy':
                    if ($this->auth->IsDelete) {
                        $result = $result->destroy('users', $request->models, 'UserId');
                    }
                    break;
            }

            echo json_encode($result, JSON_NUMERIC_CHECK);
        }
    }

}

?>