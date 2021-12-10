<?php
require ('mvc/admin_controller.php');

if(isset($_POST["submit"])) {



	$admin_id_no = $_POST["admin_id_no"];
	$admin_password = $_POST["admin_password"];
    
    $login_details = login($admin_id_no);
    print_r($login_details);
    if(!empty($login_details)) {
        echo $admin_password;
        echo $login_details['admin_password'];
        if($password == $login_details['admin_password']){
            session_start();
            $_SESSION['adminid'] = $login_details['adminID'];
            header("location: admin_candidates.php");
        }

        else{
            header("location: admin.php?admin_error=Incorrect Admin Password");  
        }
    }
    else{
        header("location: admin.php?admin_error=Incorrect Admin ID");
    }



} 
?>