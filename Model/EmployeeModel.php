<?php

class EmployeeModel extends Connection{

    public function getEmployeeModel(){
        $sql = "SELECT * FROM `u123002_employee` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getEmployeeIdModel($id){
        $sql = "SELECT * FROM `u123002_employee` WHERE `id_Employee` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getEmployeeCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_employee`(`Name`, `EmployeeBirthday`, `SSN`, `idRank`, `CDL`, `EmployeeWage`, `DateHiring`, `EmployeeNumber`, `DateCreate`) VALUES ('$name','$employeeBirthday','$ssn','$idRank','$cdl','$employeeWage','$dateHiring','$employeeNumber','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Employee Cadastrado";
        }else{
            return "Employee não cadastrado";
        }

    }

}