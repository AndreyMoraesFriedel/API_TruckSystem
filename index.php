<?php

$url = filter_input(INPUT_GET, 'url' , FILTER_DEFAULT);
$method  = $_SERVER["REQUEST_METHOD"];
$arr_url = explode("/",$url);
$api = $arr_url[0];
$controller = $arr_url[1];
$id = (isset($arr_url[2])) ? $arr_url[2] : 0;
$class = ucfirst($controller) . "Controller";

include_once "Connection/Connection.php";

if(!empty($api) && !empty($controller)){

    //Leitura dos arquivos da pasta MOdel
    $pathModel = "Model/";
    $dir_Model = dir($pathModel);
    while($arquivoModel = $dir_Model->read()){
        if($arquivoModel != ".." && $arquivoModel != "."){
            include_once $pathModel.$arquivoModel;
        }
    }

    //Leitura dos arquivos da pasta Controlelr
    $pathController = "Controller/";
    $dir_Control = dir($pathController);
    while($arquivoControl = $dir_Control->read()){
        if($arquivoControl != ".." && $arquivoControl != "."){
            include_once $pathController.$arquivoControl;
        }
    }

    if(class_exists($class)){

      //  header('Content-Type: application/json'); 
        $ob = new $class;

        switch($method){
            case "GET":
                if($id){
                    $msg = "Busca realizada com Sucesso!";
                    $methodClass = "get".ucfirst($controller) . "Id";
                    $request = array("status" => 200, 
                    "message" => $msg, "data" => $ob->$methodClass($id));
                }else{

                    $methodClass = "get".ucfirst($controller);
                    $msg = "Busca realizada com sucesso!";
                    $request = array("status" => 200, "message" => $msg,
                    "data" => $ob->$methodClass());

                }
          
                echo json_encode($request,JSON_UNESCAPED_UNICODE);

                break;
            case "POST":
                $methodClass = "get".ucfirst($controller)."Create";
                $request = array("status" => 201, "data" => $ob->$methodClass($_POST));
                echo json_encode($request,JSON_UNESCAPED_UNICODE);
                break;
            case "PUT":
                $methodClass = "get".ucfirst($controller)."Edit";
                $uri = "$_SERVER[REQUEST_URI]";
                $uri = explode("?",$uri);
                $var1 = explode("/",$uri[0]);
                $idLink = end($var1);
                $uri = explode("&", $uri[1]);
                $request = array("status" => 202, 
                "data" => $ob->$methodClass($uri, $idLink));
                echo json_encode($request,JSON_UNESCAPED_UNICODE);
                break;
            case "DELETE":
                $methodClass = "get".ucfirst($controller)."Delete";
                $uri = "$_SERVER[REQUEST_URI]";
                $uri = explode("?",$uri);
                $var1 = explode("/",$uri[0]);
                $idDelete = end($var1);
                $request = array("status" => 203, 
                "data" => $ob->$methodClass($idDelete));
                echo json_encode($request,JSON_UNESCAPED_UNICODE);
                break;
        }

    }else{
        $msg = "classe não existe!";
        $request = array("status" => 400, "message" => $msg);
        echo json_encode($request,JSON_UNESCAPED_UNICODE);
    }

    //http://localhost/API_TruckSystem/api/employee/2
    // GET POST PUT DELETE
}else{
    $msg = "Error message!";
    $request = array("status" => 400, "message" => $msg);
    echo json_encode($request,JSON_UNESCAPED_UNICODE);
}
