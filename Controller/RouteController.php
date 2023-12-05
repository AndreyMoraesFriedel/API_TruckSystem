<?php

class RouteController{
    public function getRoute(){
        $arr  = new RouteModel;
        return $arr->getRouteModel();
    }

    public function getRouteId($id){
        $arr = new RouteModel;
        return $arr->getRouteIdModel($id);
    }

    public function getRouteCreate($array){
        $arr = new RouteModel;
        return $arr->getRouteCreateModel($array);
    }

    public function getRouteEdit($array,$id){
        $arr = new RouteModel;
        return $arr->getRouteEditModel($array,$id);
    }

}