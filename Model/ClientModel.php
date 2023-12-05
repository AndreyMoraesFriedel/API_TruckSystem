<?php

class ClientModel extends Connection{

    //Método responsável por retornar todos os usuários
    public function getClientModel(){

        //Sql responsável pela busca
        $sql = "SELECT * FROM `u123002_client` WHERE 1";
        //Query da bsuca
        $data = $this->dbConnection()->query($sql);
        //Executa a busca
        $data->execute();
        //Retorna dados da busca
        return $data->fetchAll();
            
    }

    public function getClientIdModel($id){
        $sql = "SELECT * FROM `u123002_client` WHERE `id_client` = $id LIMIT 1";
        //Query da bsuca
        $data = $this->dbConnection()->query($sql);
        //Executa a busca
        $data->execute();
        //Retorna dados da busca
        return $data->fetch();
    }

    public function getClientCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_client`(`Name`, `SSN`, `Address`, `NumberPhone`, `Password`, `DateArrive`, `id_Payment`, `id_Request`, `Delivery`, `DateCreate`) VALUES 
        ('$name','$ssn','$address','$numberPhone','$password','$dateArrive','$id_Payment','$id_Request','$delivery','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Client Realizada com Sucesso";
        }else{
            return "Client Não Realizada";
        }

    }

    public function getClientEditModel($array,$id){
        $sql = "UPDATE `u123002_client` SET ";
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

        $sql .= "WHERE id_client = $id";

        var_dump($sql);

    }

}