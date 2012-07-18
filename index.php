<?php
/*
 * Simple php MVC framework by ScullWM
 * http://www.scullwm.com 
 *
 */

//ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require('model/core.php');
require('controller/core.php');

function LoadClasse($Classe){
    require 'lib/'.strtolower($Classe).'.class.php';
}
spl_autoload_register ('LoadClasse');

if (isset($_GET['c'])) {
    
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
    
} else {
    require_once 'views/default.tmpl'; // else show homepage default
}