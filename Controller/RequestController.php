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

    public function getRequestEdit($array,$id){
        $arr = new RequestModel;
        return $arr->getRequestEditModel($array,$id);
    }

    public function getRequestDelete($id){
        $arr = new RequestModel;
        return $arr->getRequestDeleteModel($id);
    }

}