<?php

class WarehouseModel extends Connection{

    public function getWarehouseModel(){
        $sql = "SELECT * FROM `u123002_warehouse` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getWarehouseIdModel($id){
        $sql = "SELECT * FROM `u123002_warehouse` WHERE `id_Warehouse` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getWarehouseCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_warehouse`(`ProductName`, `Description`, `WarehouseAmount`, `WarehousePrice`, `WarehouseQuantity`, `DateCreate`) VALUES 
        ('$productName','$description','$warehouseAmount','$warehousePrice','$warehouseQuantity','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Warehouse Realizada com Sucesso";
        }else{
            return "Warehouse Não Realizada";
        }

    }

}