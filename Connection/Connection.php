<?php

    class Connection{

        public function dbConnection(){
            try{
        
                $conn = new PDO('mysql:host=localhost;dbname=u123002_truck','root','');
                if($conn){
                    return $conn;
                }
            
            }catch(PDOException $error){
                echo $error->getMessage();
            }
        }

    }
    

