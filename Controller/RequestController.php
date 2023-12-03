<?php

class RequestController{
    public function getRequest(){
        $arr  = new RequestModel;
        return $arr->getRequestModel();
    }

    public function getRequestId($id){
        $arr = new RequestModel;
        return $arr->getRequestIdModel($id);
    }

    public function getRequestCreate($array){
        $arr = new RequestModel;
        return $arr->getRequestCreateModel($array);
    }

}