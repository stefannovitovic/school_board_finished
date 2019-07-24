<?php

require_once("db_config.php");

    class Database {

        private $conn;

        private function get_connection(){

            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->conn->connect_errno){
                
                die("Something went wrong" . $this->conn->connect_error);

            }
        }

        function __construct(){
            $this->get_connection();
            
        }

        public function query($sql){
            
            $result = $this->conn->query($sql);
            $this->queryValidation($result);
            return $result;
            

        }

        private function queryValidation($result){
            if(!$result){
                die("Something went wrong" . $this->conn->error);
            }
        }

    }

    $database = new Database();


?>