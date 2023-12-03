<?php

class TypePersonModel extends Connection{

    public function getTypePersonModel(){
        $sql = "SELECT * FROM `u123002_type_person` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getTypePersonIdModel($id){
        $sql = "SELECT * FROM `u123002_type_person` WHERE `id_RankEmp` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getTypePersonCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_type_person`(`idRank`) VALUES 
        ('$idRank')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "TypePerson Realizada com Sucesso";
        }else{
            return "TypePerson Não Realizada";
        }

    }

}