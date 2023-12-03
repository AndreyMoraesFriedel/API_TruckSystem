<?php

class TruckController{
    public function getTruck(){
        $arr  = new TruckModel;
        return $arr->getTruckModel();
    }

    public function getTruckId($id){
        $arr = new TruckModel;
        return $arr->getTruckIdModel($id);
    }

    public function getTruckCreate($array){
        $arr = new TruckModel;
        return $arr->getTruckCreateModel($array);
    }

}