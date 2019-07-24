<?php

require_once ("db_object.php");

    class Student extends Db_object {

        protected static $db_table = "students";
        public $id;
        public $first_name;
        public $last_name;
        public $school_board;
        
        
       

        public function get_grades($id){
            
            global $database;
            $sql = "SELECT grade_value FROM grades WHERE id = '$id'"; 
            $result = $database->query($sql);
            return $result;
            
        }

        public function get_average($id){

            global $database;

            $sql = "SELECT AVG(grades.grade_value) FROM grades WHERE id = '$id'";
            $result = $database->query($sql);
            $row = mysqli_fetch_array($result);
            return array_shift($row);
        }
        
        public function get_max_grade($id){
            global $database;

            $sql = "SELECT MAX(grades.grade_value) FROM grades WHERE id = '$id'";
            $result = $database->query($sql);
            $row = mysqli_fetch_array($result);
            return array_shift($row);
        }

    

      
    }




?>