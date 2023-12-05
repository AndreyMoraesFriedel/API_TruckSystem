<?php

class RequestModel extends Connection{

    public function getRequestModel(){
        $sql = "SELECT * FROM `u123002_request` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getRequestIdModel($id){
        $sql = "SELECT * FROM `u123002_request` WHERE `id_Request` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getRequestCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_request`(`NameProduct`, `AmountProduct`, `quantity`, `Description`, `SSNClient`, `LocalDelivery`, `Delivery`, `DateArrive`, `idClient`, `id_Payment`, `id_Warehouse`, `id_Route`, `DateCreate`) VALUES 
        ('$nameProduct','$amountProduct','$quantity','$description','$ssnClient','$localDelivery','$delivery','$dateArrive','$idClient','$id_Payment','$id_Warehouse','$id_Route','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Request Realizada com Sucesso";
        }else{
            return "Request Não Realizada";
        }

    }

    public function getRequestEditModel($array,$id){
        $sql = "UPDATE `u123002_request` SET ";
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

        $sql .= "WHERE id_Request = $id";

        var_dump($sql);

    }

}