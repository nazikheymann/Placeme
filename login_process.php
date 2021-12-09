<?php
require ('mvc/login_controller.php');

if(isset($_POST["submit"])) {



	$id_no = $_POST["id_no"];
	$password = md5($_POST["password"]);
    
    $login_details = login($id_no);
    print_r($login_details);
    if(!empty($login_details)) {
        echo $password;
        echo $login_details['user_password'];
        if($password == $login_details['user_password']){
            session_start();
            $_SESSION['id'] = $login_details['candidateID'];
            header("location: homepage.php");
        }
        else{
            echo 'Password is incorrect';
        }
    }
    else{
        echo 'Username is incorrect';
    }





}  
?>