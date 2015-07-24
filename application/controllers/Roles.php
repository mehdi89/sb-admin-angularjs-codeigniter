<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller {

    /**
     * 
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'Roles')) {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('Roles_view', $data);
        } else {
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

            $columns = array('RoleId', 'RoleName', 'NavigationId', 'IsRead', 'IsInsert', 'IsUpdate', 'IsDelete');

            switch ($type) {
                case 'create':
                    if ($this->auth->IsInsert) {
                        $result = $result->create('roles', $columns, $request->models, 'RoleId');
                    }
                    break;
                case 'read':
                    $result = $result->read('roles', $columns, $request);
                    break;
                case 'update':
                    if ($this->auth->IsUpdate) {
                        $result = $result->update('roles', $columns, $request->models, 'RoleId');
                    }
                    break;
                case 'destroy':
                    if ($this->auth->IsDelete) {
                        $result = $result->destroy('roles', $request->models, 'RoleId');
                    }
                    break;
            }

            echo json_encode($result, JSON_NUMERIC_CHECK);
        }
    }

}

?>