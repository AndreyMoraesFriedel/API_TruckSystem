<?php

class TruckModel extends Connection{

    public function getTruckModel(){
        $sql = "SELECT * FROM `u123002_truck` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getTruckIdModel($id){
        $sql = "SELECT * FROM `u123002_truck` WHERE `id_truck` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getTruckCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_truck`(`Model`, `Brand`, `ProductionYear`, `CapaciityLoad`, `Chassis`, `plate`, `DateCreate`) VALUES 
        ('$model','$brand','$productionYear','$capaciityLoad','$chassis','$plate','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Truck Realizada com Sucesso";
        }else{
            return "Truck Não Realizada";
        }

    }

}