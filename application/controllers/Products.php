<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    /**
     * 
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->is_authentic($this->auth->RoleId, $this->user->UserId, 'Products')) {
            $data['fx'] = 'return ' . json_encode(array("insert" => $this->auth->IsInsert === "1", "update" => $this->auth->IsUpdate === "1", "delete" => $this->auth->IsDelete === "1"));
            $data['read'] = $this->auth->IsRead;
            $this->load->view('Products_view', $data);
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

            $columns = array('ProductID', 'ProductName', 'UnitPrice', 'UnitsInStock', 'Discontinued');

            switch ($type) {
                case 'create':
                    if ($this->auth->IsInsert) {
                        $result = $result->create('products', $columns, $request->models, 'ProductID');
                    }
                    break;
                case 'read':
                    $result = $result->read('products', $columns, $request);
                    break;
                case 'update':
                    if ($this->auth->IsUpdate) {
                        $result = $result->update('products', $columns, $request->models, 'ProductID');
                    }
                    break;
                case 'destroy':
                    if ($this->auth->IsDelete) {
                        $result = $result->destroy('products', $request->models, 'ProductID');
                    }
                    break;
            }
            echo json_encode($result, JSON_NUMERIC_CHECK);
        }
    }

}

?>