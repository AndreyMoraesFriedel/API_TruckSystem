<?php

class PaymentController{
    public function getPayment(){
        $arr  = new PaymentModel;
        return $arr->getPaymentModel();
    }

    public function getPaymentId($id){
        $arr = new PaymentModel;
        return $arr->getPaymentIdModel($id);
    }

    public function getPaymentCreate($array){
        $arr = new PaymentModel;
        return $arr->getPaymentCreateModel($array);
    }

    public function getPaymentEdit($array,$id){
        $arr = new PaymentModel;
        return $arr->getPaymentEditModel($array,$id);
    }

    public function getPaymentDelete($id){
        $arr = new PaymentModel;
        return $arr->getPaymentDeleteModel($id);
    }

}