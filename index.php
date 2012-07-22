<?php

/*
 * Simple php MVC framework by ScullWM
 * http://www.scullwm.com 
 *
 */

    require('model/core.php');
    require('controller/core.php');

    //ini_set('error_reporting', E_ALL);
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    // PHP 5.3 will not complain with a default timezone
    if(@date_default_timezone_set(date_default_timezone_get()===false)){
        date_default_timezone_set('UTC');
    }


    require('app/swmvc.php');

    $app = New Swmvc();

    $app->run();

    echo'<pre>';

    //print_r($GLOBALS);