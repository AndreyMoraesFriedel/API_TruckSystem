<?php

class PaymentModel extends Connection{

    public function getPaymentModel(){
        $sql = "SELECT * FROM `u123002_payment` WHERE 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetchAll();
            
    }

    public function getPaymentIdModel($id){
        $sql = "SELECT * FROM `u123002_payment` WHERE `id_Payment` = $id LIMIT 1";
        $data = $this->dbConnection()->query($sql);
        $data->execute();
        return $data->fetch();
    }

    public function getPaymentCreateModel($array){

        extract($array);

        $sql = "INSERT INTO `u123002_payment`(`AmountPayment`, `quantity`, `PaidPayment`, `idRequest`, `DateCreate`) VALUES 
        ('$amountPayment','$quantity','$paidPayment','$idRequest','$dateCreate')";
        $data = $this->dbConnection()->prepare($sql);
        if($data->execute()){
            return "Payment Realizada com Sucesso";
        }else{
            return "Payment Não Realizada";
        }

    }

    public function getPaymentEditModel($array,$id){
        $sql = "UPDATE `u123002_payment` SET ";
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

        $sql .= "WHERE id_Payment = $id";

        var_dump($sql);

    }

}