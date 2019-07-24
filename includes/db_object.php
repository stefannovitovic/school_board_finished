<?php
include ("database.php");

    class Db_object {

        
        public static function find_by_id($id){
            global $database;
            $result_set_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = '$id'");
            return !empty($result_set_array) ? array_shift($result_set_array) : false;
            
            
        }
        public static function  find_by_query($sql){
            global $database;
            $result_set = $database->query($sql);
            $the_object_array = array();
            while($row = mysqli_fetch_array($result_set)){
                $the_object_array[] = static::istantation($row);
            }
            return $the_object_array;
        }
        public static function istantation($the_record) {
            $calling_class = get_called_class();    
            $the_object = new $calling_class;
            foreach($the_record as $attribute => $value){
                 if($the_object->has_attribute($attribute)){
                    $the_object->$attribute = $value;
                 }
            }
            return $the_object;
        }
        private function has_attribute($attribute){
            $object_properties = get_object_vars($this);
            return array_key_exists($attribute, $object_properties);
        }
    }



?>