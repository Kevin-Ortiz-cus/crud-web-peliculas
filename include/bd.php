<?php
    include_once("config_BD.php");
    class Bd{
        private $hostname = HOST;
        private $database = BD;
        private $user = USER;
        private $password = PASSWORD;
        private $charset = CHARSET;
        private $conexion;


        function conexion(){
            try{
                $this->conect = new PDO("mysql:host=$this->hostname; dbname=$this->database; charset=$this->charset", $this->user, $this->password);
                return $this->conect;
            } catch(PDOException $error){
                echo $error->getMessage();
                die();
            }
        }

        function closeConex(){
            $this->conect = null;
        }
    }

?>