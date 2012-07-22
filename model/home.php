<?php

//namespace swmvc\Model\Home;

class home_model extends CoreModel {

    public function listing(){
        $exemple = array();
        $exemple[] = 'ninja';
        $exemple[] = 'chucknorris';
        $exemple[] = 'poney3000';
        $exemple[] = 'patrick';
        $exemple[] = 'exemple';
        $exemple[] = 'Atchoum';


        $date_actuelle = mktime();
        $date_disney   = mktime(0, 0, 0 , 9, 8, 2012);

        $date_restante = $date_disney-$date_actuelle;

        $exemple[] = $date_restante/60/60/24;

        return $exemple;
    }

}