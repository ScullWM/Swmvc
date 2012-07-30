<?php


class Swmvc_template {

    public $data  = array();
    public $parameter = array();

    public function __construct($dir, $arg){
        $this->parameter[$dir] = $arg;
    }

    public function rendermedia($filename){
        $metas = $this->home->meta($filename);
    }

    public function render($filename, $data=null){   
        $this->data = array_merge($this->data, $data);
        extract($this->data);

        //$meta = $this->rendermedia($filename);

        ob_start();
        require('./views/'. $this->parameter["dir"] .'/'.$filename.'.tmpl');
        $content = ob_get_contents();
        ob_end_clean();


        require('views/layout.tmpl');
    }

}