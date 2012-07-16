<?php

class home_model extends model {

	public function listing(){
		$exemple = array();
		$exemple[] = 'ninja';
		$exemple[] = 'chucknorris';
		$exemple[] = 'poney3000';
		$exemple[] = 'patrick';
		$exemple[] = 'exemple';
		$exemple[] = 'Atchoum';

		return $exemple;
	}
	
}