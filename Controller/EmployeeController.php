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

    public function getEmployeeEdit($array,$id){
        $arr = new EmployeeModel;
        return $arr->getEmployeeEditModel($array,$id);
    }

}