<?php

//namespace swmvc\Controller\Home;

class home extends CoreController {

    function index(){  
        $this->render('default');
    }

    public function meta($param){
        $meta["test"] = array('title'=>'exemple de balise title','description'=>'ma description','keyword'=>'test, test, description');
        $meta["autre"] = array('title'=>'exemple de balise title','description'=>'ma description','keyword'=>'test, test, description');
        $meta["kikoo"] = array('title'=>'exemple de balise title','description'=>'ma description','keyword'=>'test, test, description');
        return $meta[$param];
    }

    function listing(){
    	global $app;
        $var = $this->loadmodel('home');
        $data['d'] = $this->home_model->listing();
        $app->template->render('listing', $data);
        //echo get_class($app->template);

        /*echo'<pre>';
        print_r(get_declared_classes());
        echo'</pre>';*/
    }

}