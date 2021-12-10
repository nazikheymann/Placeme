<?php

//require credentials
require ('database_connection.php');


class login_class extends Database{
    public function return_user($adminID){
        $query = "SELECT * FROM `admin` WHERE adminID = '$admin'";
        return $this->run($query);
    }
}
?>