<?php 


class Controllers{

	public $data = array();


    function loadmodel($name){
        require_once('model/'.$name.'.php');
        $modelname = $name.'_model';
        $this->$modelname = new $modelname();
    }
    
    function set($data){
        $this->data = array_merge($this->data, $data);
    }
        
	function render($filename){            
		extract($this->data);
		require('views/'.get_class($this).'/'.$filename.'.tmpl');
	}

}