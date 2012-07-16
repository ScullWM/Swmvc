<?php
/*
 * Simple php MVC framework by ScullWM
 * http://www.scullwm.com 
 *
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

//require('config.php');
require('model/core.php');
require('controllers/core.php');


// here we include all our external class
// ask it if you need it

foreach(glob("lib/*.class.php") as $f):
    require_once($f);
endforeach;

include("views/header.tmpl"); // header is simply include there

if (isset($_GET['c']) && isset($_GET['a'])) {
    
    $controller_file = 'controllers/'.$_GET['c'].'.php';

    if(file_exists($controller_file)){
        require_once $controller_file;  
        // Constroller instanciation
        $controleur = $_GET['c'];
        $controleur = new $controleur();

        // Get Action and Id
        if(isset($_GET['a'])){   $action = $_GET['a'];  }else { $action = 'index'; }
        if(isset($_GET['id'])){  $id     = $_GET['id']; }

        // does the action existe in the controller asked ?
        if (method_exists($controleur, $action)) {
            $controleur->$action();
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

include("views/footer.tmpl"); // and there go the footer