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

    public function getTypePersonEditModel($array,$id){
        $sql = "UPDATE `u123002_type_person` SET ";
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

        $sql .= "WHERE id_RankEmp = $id";

        var_dump($sql);

    }

}