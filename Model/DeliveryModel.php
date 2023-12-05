<?php

class DeliveryModel extends Connection{

    public function getDeliveryModel(){
        $sql = "SELECT * FROM `u123002_delivery` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getDeliveryIdModel($id){
        $sql = "SELECT * FROM `u123002_delivery` WHERE `id_Delivery` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getDeliveryCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_delivery`(`SSNClient`, `TypeDelivery`, `DateArrive`, `DateCreate`) VALUES ('$ssnClient','$typeDelivery','$dateArrive','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Entrega Realizada com Sucesso";
        }else{
            return "Entrega Não Realizada";
        }

    }

    public function getDeliveryEditModel($array,$id){
        $sql = "UPDATE `u123002_delivery` SET ";
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

        $sql .= "WHERE id_Delivery = $id";

        var_dump($sql);

    }

}