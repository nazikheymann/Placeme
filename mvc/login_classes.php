<?php

//require credentials
require ('database_connection.php');


class login_class extends Database{
    public function return_user($candidateID){
        $query = "SELECT * FROM `candidate` WHERE candidateID = '$candidateID'";
        return $this->run($query);
    }
}
?>