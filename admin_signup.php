<?php
// Include file which makes the
    // Database Connection.    
include 'placeme_connection_test.php'; 
    
if(isset($_POST["submit"])) {


    $fname = $_POST["fname"];
    $lname = $_POST["lname"]; 
	$id_no = $_POST["id_no"];
	$password = md5($_POST["password"]);
    $confirm_password = md5($_POST["password2"]);
    


    if($password != $confirm_password)
    {
        header("location: admin_signup.php?error=Passwords do not match");
       exit();
    }

    //select indexes in the db
    $id_check = "SELECT * FROM `admin` WHERE `adminID` = '$id_no'";
    $result1 = mysqli_query($connect,$id_check);
    $row = mysqli_fetch_assoc($result1);
     if(isset($row['candidateID'])){
        header("location: admin_signup.php?error=ID already exists");
        exit();
    }
    else{
        $sql = "INSERT INTO `admin` ( `adminID`, `admin_password`,`fname`,`lname`) VALUES ('$id_no', '$password', '$fname', '$lname')";
        $result = mysqli_query($connect, $sql);
        header("location: admin.php");
    }



    
    


    




mysqli_close($connect);

}   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Me | Admin Sign Up</title>
    <link rel = "stylesheet" href="placeme.css">
</head>
<body>




<div class="wrapper">
        <div class="container-fluid">
                    <div class="bg-img">
                        <div class="content">
                            <header>Welcome to Place Me Admin</header>
                           <h2 style="color: red"> <?php if (isset($_GET['error'])) {
                               echo $_GET['error'];
                           } ?></h2> 
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

		</div><br>
		<div class="field">
			<input type="password" placeholder=" Confirm Password" id="password2" name = "password2"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>

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