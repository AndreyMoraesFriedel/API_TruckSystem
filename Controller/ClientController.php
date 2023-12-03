<?php

class ClientController{
    //Método responsável por retornar os dados dos usuários
    public function getClient(){
        //Instância a classe
        $arr  = new ClientModel;
        //Retorna a resposta do método getClientModel
        return $arr->getClientModel();
    }

    public function getClientId($id){
        $arr = new ClientModel;
        return $arr->getClientIdModel($id);
    }

    public function getClientCreate($array){
        $arr = new ClientModel;
        return $arr->getClientCreateModel($array);
    }

}