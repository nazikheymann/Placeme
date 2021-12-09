<?php
// Include file which makes the
    // Database Connection.    
include 'placeme_connection_test.php'; 
    
if(isset($_POST["submit"])) {


    $fname = $_POST["fname"];
     
    $lname = $_POST["lname"]; 
	$id_no = $_POST["id_no"];
	$password = md5($_POST["password"]);
    
    ;
            
    $sql = "INSERT INTO `candidate` ( `candidateID`, `fname`,`lname`,`user_password`) VALUES ('$id_no', '$fname', '$lname', '$password')";
    $result = mysqli_query($connect, $sql);
    header("location: login.php");
    //$log = mysqli_fetch_array($result);


    // if(!empty($log)){
    //     $hashpassword = md5($password);

    //     if($hashpassword == $log['password']){

    //         //redirect page 
    //         header("location: homepage.php");
    //         exit();
    //     }
    //     else{
    //         echo "Oops! Something went wrong. Please try again later.";
    //     }


    // }



mysqli_close($connect);

}   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Me | Sign Up</title>
    <link rel = "stylesheet" href="placeme.css">
</head>
<body>
<!-- 


    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
 -->



<div class="wrapper">
        <div class="container-fluid">
                    <div class="bg-img">
                        <div class="content">
                            <header>Welcome to Place Me</header>

	<form id="form" class="form" action="" method="post">
		<div class="field">
			<input type="text" placeholder=" First Name" id="fname" name = "fname"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<!-- <small>Error message</small> -->
		</div><br>
        <div class="field">
			<input type="text" placeholder=" Last Name" id="lname" name ="lname"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<!-- <small>Error message</small> -->
		</div><br>
		<div class="field">
			<input type="text" placeholder=" Index number" id="id_no" name = "id_no"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<!-- <small>Error message</small> -->
		</div><br>
		<div class="field">
			<input type="password" placeholder=" Password" id="password" name = "password"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<!-- <small>Error message</small> -->
		</div><br>
		<div class="field">
			<input type="password" placeholder=" Confirm Password" id="password2" name = "password2"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<!-- <small>Error message</small> -->
		</div><br>
        <div class="buttonholder">
		<input type="submit" name ="submit" value="Sign Up">
        </div>
	</form>
    <div class="account">
              Already have an account?
              <a href="login.php">Login</a>
              <a href="admin.php">| Admin</a>
           </div>
            </div>        
        </div>
    </div>
</div>
</body>
</html>