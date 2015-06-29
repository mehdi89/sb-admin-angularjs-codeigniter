<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Navigations extends MY_Controller {

    /**
     * 
     */
    
    function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'Navigations')) {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('Navigations_view', $data);
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

            $columns = array('NavigationId', 'NavName', 'NavOrder', 'ActionPath', 'ParentNavId');

            switch ($type) {
                case 'create':
                    if ($this->auth->IsInsert) {
                        if ($request->models[0]->ParentNavId === 0) {
                            $request->models[0]->ParentNavId = null;
                        };
                        $result = $result->create('navigations', $columns, $request->models, 'NavigationId');
                    } else {
                        $result = ['status' => "error", "message" => $this->config->item('NoPermissionMsg')];
                    }
                    break;
                case 'read':
                    $result = $result->read('navigations', $columns, $request);

                    foreach ($result['data'] as $key => $value) {
                        if ($value['ParentNavId'] === null) {
                            $value['ParentNavId'] = 0;
                        }
                        array_push($result['data'], $value);
                    }
                    break;
                case 'update':
                    if ($this->auth->IsUpdate) {
                        $result = $result->update('navigations', $columns, $request->models, 'NavigationId');
                    } else {
                        $result = ['status' => "error", "message" => $this->config->item('NoPermissionMsg')];
                    }
                    break;
                case 'destroy':
                    if ($this->auth->IsDelete) {
                        $result = $result->destroy('navigations', $request->models, 'NavigationId');
                    } else {
                        $result = ['status' => "error", "message" => $this->config->item('NoPermissionMsg')];
                    }
                    break;
            }

            echo json_encode($result, JSON_NUMERIC_CHECK);
        }
    }

}

?>