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

    public function getWarehouseEditModel($array,$id){
        $sql = "UPDATE `u123002_warehouse` SET ";
        $contArr = count($array);
        $contador = 0;

        foreach($array as $campo){
            $contador++;
            $dado = explode("=",$campo);
            $campoTabela = $dado[0];
            $valTabela = $dado[1];

            if($contador == ($contArr)){
                $sql .= "`$campoTabela`='$valTabela' ";
            }else{
                $sql .= "`$campoTabela`='$valTabela', ";
            }
        }

        $sql .= "WHERE id_Warehouse = $id";

        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Warehouse Editada com Sucesso";
        }else{
            return "Warehouse Não Editada";
        }

    }

    public function getWarehouseDeleteModel($id){
        $sql = "DELETE FROM `u123002_warehouse` WHERE id_Warehouse = $id";    
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Warehouse Deletado com Sucesso";
        }else{
            return "Warehouse Não Deletado";
        }
    }

}