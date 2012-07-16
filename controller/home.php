<?php

class home extends CoreController {

    function index(){  
        $this->render('default');
    }

    function listing(){
        $var = $this->loadmodel('home');
        $data['d'] = $this->home_model->listing();
        $this->render('listing', $data);
    }

}