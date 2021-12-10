<?php
require ('admin_classes.php');

function login($adminID){
    $instance = new login_class();
    $query = $instance->return_user($adminID);

    if($query){
        $array_var = array();
        while($row = $instance->fetch()){
            $array_var = $row;

        }
        return $array_var;
    }
    else{
        return false;
    }

}


?>