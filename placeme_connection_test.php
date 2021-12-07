<?php
//displays an error and stops the script if the file is missing
require "placeme_credentials.php";

//assigns the database credentials to a variable
$connect = new mysqli(server, username, password, database);

//displays a message if the connection fails or succeeds
// if($connect->connect_error){
//     die("Connection failed" . $connect->connect_error);
// }

//     echo "Connection successful";
?>