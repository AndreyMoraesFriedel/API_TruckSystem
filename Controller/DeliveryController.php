<?php

class DeliveryController{
    public function getDelivery(){
        $arr  = new DeliveryModel;
        return $arr->getDeliveryModel();
    }

    public function getDeliveryId($id){
        $arr = new DeliveryModel;
        return $arr->getDeliveryIdModel($id);
    }

    public function getDeliveryCreate($array){
        $arr = new DeliveryModel;
        return $arr->getDeliveryCreateModel($array);
    }

    public function getDeliveryEdit($array,$id){
        $arr = new DeliveryModel;
        return $arr->getDeliveryEditModel($array,$id);
    }

    public function getDeliveryDelete($id){
        $arr = new DeliveryModel;
        return $arr->getDeliveryDeleteModel($id);
    }

}