<?php


class home extends Controllers{

	function index(){  
        $this->render('default');
		return true;
	}


	function listing(){
        $var = $this->loadmodel('home');
        $data['d'] = $this->home_model->listing();
        $this->set($data);
        $this->render('listing');;
	}	


	function view(){

		$view_file = 'template.php';
		return $view_file;
	}

}