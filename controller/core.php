<?php 

class CoreController {

    public $data = array();

    function loadmodel($name){
        require_once('model/'.$name.'.php');
        $modelname = $name.'_model';
        $this->$modelname = new $modelname();
    }
        
    function render($filename, $data=null){   
        $this->data = array_merge($this->data, $data);
        extract($this->data);
        require('views/'.get_class($this).'/'.$filename.'.tmpl');
    }

}