<?php

class MaintenanceController{
    public function getMaintenance(){
        $arr  = new MaintenanceModel;
        return $arr->getMaintenanceModel();
    }

    public function getMaintenanceId($id){
        $arr = new MaintenanceModel;
        return $arr->getMaintenanceIdModel($id);
    }

    public function getMaintenanceCreate($array){
        $arr = new MaintenanceModel;
        return $arr->getMaintenanceCreateModel($array);
    }

    public function getMaintenanceEdit($array,$id){
        $arr = new MaintenanceModel;
        return $arr->getMaintenanceEditModel($array,$id);
    }

}