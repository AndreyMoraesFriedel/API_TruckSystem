<?php

class EmployeeController{
    public function getEmployee(){
        $arr  = new EmployeeModel;
        return $arr->getEmployeeModel();
    }

    public function getEmployeeId($id){
        $arr = new EmployeeModel;
        return $arr->getEmployeeIdModel($id);
    }

    public function getEmployeeCreate($array){
        $arr = new EmployeeModel;
        return $arr->getEmployeeCreateModel($array);
    }

}