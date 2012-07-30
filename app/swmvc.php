<?php

class Swmvc {

    public $template;

    public function __construct(){
        $this->autoload();
    }

    private function autoload(){
        require_once('app/swmvc_template.php');
        $this->template = New Swmvc_template('dir', strtolower($_GET["c"]));
        return $this->template;
    }

    public function run(){

        $controller_file = 'controller/'.$_GET['c'].'.php';

        if(file_exists($controller_file)){
            require_once $controller_file;  
            // Constroller instanciation
            $controller = new $_GET['c']();

            // Get Action and Id
            if(isset($_GET['a'])){   $action = $_GET['a'];  }else { $action = 'index'; }
            if(isset($_GET['id'])){  $id     = $_GET['id']; }

            // does the action existe in the controller asked ?
            if (method_exists($controller, $action)) {
                $controller->$action();
            }else {
                $error = 'This action does not exist in this controller';
                require_once 'views/error.tmpl';
            }
        }else {
            $error = 'no controller exist';
            require_once 'views/error.tmpl';
              
        }
    }

}
