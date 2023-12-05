<?php

class MaintenanceModel extends Connection{

    public function getMaintenanceModel(){
        $sql = "SELECT * FROM `u123002_maintenance` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getMaintenanceIdModel($id){
        $sql = "SELECT * FROM `u123002_maintenance` WHERE `id_Maintenance` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getMaintenanceCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_maintenance`(`MaintenanceDate`, `MaintenanceType`, `MaintenanceCost`, `MaintenanceDescription`, `DateCreate`) VALUES 
        ('$maintenanceDate','$maintenanceType','$maintenanceCost','$maintenanceDescription','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Maintenance Realizada com Sucesso";
        }else{
            return "Maintenance Não Realizada";
        }

    }

    public function getMaintenanceEditModel($array,$id){
        $sql = "UPDATE `u123002_maintenance` SET ";
        $contArr = count($array);
        $contador = 0;

        foreach($array as $campo){
            $contador++;
            $dado = explode("=",$campo);
            $campoTabela = $dado[0];
            $valTabela = $dado[1];

            if($contador == intval($contArr)){
                $sql .= "`$campoTabela`='$valTabela' ";
            }else{
                $sql .= "`$campoTabela`='$valTabela', ";
            }
        }

        $sql .= "WHERE id_Maintenance = $id";

        var_dump($sql);

    }

}