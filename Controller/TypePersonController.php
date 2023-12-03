<?php

class TypePersonController{
    public function getTypePerson(){
        $arr  = new TypePersonModel;
        return $arr->getTypePersonModel();
    }

    public function getTypePersonId($id){
        $arr = new TypePersonModel;
        return $arr->getTypePersonIdModel($id);
    }

    public function getTypePersonCreate($array){
        $arr = new TypePersonModel;
        return $arr->getTypePersonCreateModel($array);
    }

}