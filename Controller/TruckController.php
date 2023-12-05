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

    public function getTruckEdit($array,$id){
        $arr = new TruckModel;
        return $arr->getTruckEditModel($array,$id);
    }

    public function getTruckDelete($id){
        $arr = new TruckModel;
        return $arr->getTruckDeleteModel($id);
    }

}