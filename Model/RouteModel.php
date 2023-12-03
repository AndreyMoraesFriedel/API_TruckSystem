<?php

class RouteModel extends Connection{

    public function getRouteModel(){
        $sql = "SELECT * FROM `u123002_route` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getRouteIdModel($id){
        $sql = "SELECT * FROM `u123002_route` WHERE `id_Route` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getRouteCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_route`(`Destination`, `idClient`, `idRequest`, `DateCreate`) VALUES 
        ('$destination','$idClient','$idRequest','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Route Realizada com Sucesso";
        }else{
            return "Route Não Realizada";
        }

    }

}