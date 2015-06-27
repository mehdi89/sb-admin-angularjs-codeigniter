<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Directives extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Project_model', 'model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function sidebar() {
        $result = $this->model->get_navigations($this->auth->RoleId, $this->user->UserId);
        $menu = $this->get_menu($result);
        $this->load->view('directives/sidebar', ['menu' => $menu]);
    }

    public function header() {
        $this->load->view('directives/header');
    }

    public function stats() {
        $this->load->view('directives/stats');
    }

    private function get_menu($res) {
        //NavigationId, NavName, NavOrder,ParentNavId,ActionPath
        $menu = "";
        foreach ($res as $item) {
//            var_dump($item);
            if (is_null($item->ParentNavId)) {
                $subMenu = $this->getSubMenu($res, $item->NavigationId);
                if ($subMenu == "") {
                    $menu.='<li ui-sref-active="active"><a ui-sref="dashboard.' . $item->ActionPath . '">' . $item->NavName . '</a></li>';
                } else {
                    $menu .='<li ng-class="{active: collapseVar==' . $item->NavigationId . '}">{{dropDown}}
                        <a href="" ng-click="check(' . $item->NavigationId . ')">' . $item->NavName . '<span
                        class="fa arrow"></span></a>
									<ul class="nav nav-second-level" collapse="collapseVar!=' . $item->NavigationId . '">
										' . $subMenu . '
									</ul>
							</li>';
                }
            }
        }
        return $menu;
    }

    private function getSubMenu($list, $navId) {
        $html = "";
        foreach ($list as $item) {
//            var_dump($item); 
            if ($item->ParentNavId == $navId) {
                $subMenu = $this->getSubMenu($list, $item->NavigationId);
                if ($subMenu == "") {
                    $html.='<li ui-sref-active="active"><a ui-sref="dashboard.' . $item->ActionPath . '">' . $item->NavName . '</a></li>';
                } else {
                    $html .='<li ng-class="{active: collapseVar==' . $item->NavigationId . '}">{{dropDown}}
                        <a href="" ng-click="check(' . $item->NavigationId . ')">' . $item->NavName . '<span
                        class="fa arrow"></span></a>
									<ul class="nav nav-second-level" collapse="collapseVar!=' . $item->NavigationId . '">
										' . $subMenu . '
									</ul>
							</li>';
                }
            }
        }
        return $html;
    }

}
