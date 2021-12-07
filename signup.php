<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'placeme_connection_test.php';   
    
    $fname = $_POST["fname"]; 
    $lname = $_POST["lname"]; 
	$id_no = $_POST["id_no"];
	$password = $_POST["password"];
    $password2 = $_POST["password2"];
            
    
    $sql = "Select * from candidate where candidateID ='$id_no'";
    
    $result = mysqli_query($connect, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $password2) && $exists==false) {
    
            $hash = password_hash($password, 
                                PASSWORD_DEFAULT);
                
            // Password Hashing is used here. 
            $sql = "INSERT INTO `candidate` ( `candidateID`, `fname`,`lname`,`user_password`) VALUES ('$id_no', '$fname', '$lname', '$hash')";
    
            $result = mysqli_query($connect, $sql);
    
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="ID already in use"; 
   } 
    
}//end if   
    
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

<?php
    
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
   
?>



<div class="wrapper">
        <div class="container-fluid">
                    <div class="bg-img">
                        <div class="content">
                            <!-- <img id = "ashesi_logo" src="https://www.ashesi.edu.gh/images/logo-mobile.png"> -->
                            <header>Welcome to Place Me</header>
	<form id="form" class="form" action="login.php" method="post">
		<div class="field">
			<input type="text" placeholder=" First Name" id="fname" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div><br>
        <div class="field">
			<input type="text" placeholder=" Last Name" id="lname" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div><br>
		<div class="field">
			<input type="text" placeholder=" Index number" id="id_no" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div><br>
		<div class="field">
			<input type="password" placeholder=" Password" id="password"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div><br>
		<div class="field">
			<input type="password" placeholder=" Confirm Password" id="password2"/>
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div><br>
        <div class="buttonholder">
		<input type="submit" value="Sign Up">
        <a href="login.php"></a>
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