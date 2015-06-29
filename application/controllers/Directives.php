<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Directives extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Project_model', 'model');
    }

    /**
     * 
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
                    $menu.='<li ui-sref-active="active"><a ui-sref="dashboard.' . $item->ActionPath . '"><strong>' . $item->NavName . '</strong></a></li>';
                } else {
                    $menu .='<li ng-class="{active: collapseVar==' . $item->NavigationId . '}">{{dropDown}}
                        <a href="" ng-click="check(' . $item->NavigationId . ')"><strong>' . $item->NavName . '</strong><span
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
                    $html.='<li ui-sref-active="active"><a ui-sref="dashboard.' . $item->ActionPath . '"><strong>' . $item->NavName . '</strong></a></li>';
                } else {
                    $html .='<li ng-class="{active: collapseVar==' . $item->NavigationId . '}">{{dropDown}}
                        <a href="" ng-click="check(' . $item->NavigationId . ')"><strong>' . $item->NavName . '</strong><span
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
