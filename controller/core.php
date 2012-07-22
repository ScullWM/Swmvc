<?php 

//namespace swmvc\Controller\Core;

abstract class CoreController {

    private $data = array();
    private $parameters = array();
    public $template;

    public function __set($key, $value){
        $this->parameters[$key] = $value;
    }

    public function __get($key){
        return $this->parameters[$key];
    }

    function loadmodel($name){
        require_once('model/'.$name.'.php');
        $modelname = $name.'_model';
        $this->$modelname = new $modelname();
    }
        


}