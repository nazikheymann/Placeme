<?php
require ('login_classes.php');

function login($candidateID){
    $instance = new login_class();
    $query = $instance->return_user($candidateID);

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