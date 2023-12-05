<?php

class WarehouseController{
    public function getWarehouse(){
        $arr  = new WarehouseModel;
        return $arr->getWarehouseModel();
    }

    public function getWarehouseId($id){
        $arr = new WarehouseModel;
        return $arr->getWarehouseIdModel($id);
    }

    public function getWarehouseCreate($array){
        $arr = new WarehouseModel;
        return $arr->getWarehouseCreateModel($array);
    }

    public function getWarehouseEdit($array,$id){
        $arr = new WarehouseModel;
        return $arr->getWarehouseEditModel($array,$id);
    }

    public function getWarehouseDelete($id){
        $arr = new WarehouseModel;
        return $arr->getWarehouseDeleteModel($id);
    }

}