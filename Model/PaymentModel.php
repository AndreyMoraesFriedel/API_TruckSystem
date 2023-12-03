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

}