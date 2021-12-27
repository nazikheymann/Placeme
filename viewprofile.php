<?php
 require "placeme_connection_test.php";
session_start();
$id=$_SESSION['id'];
$sql_select= "SELECT * FROM `candidate` WHERE `candidateID`= '$id'";
$result_user = mysqli_query($connect,$sql_select);


if ($row_select=mysqli_fetch_assoc($result_user)) {
  $fname= $row_select['fname']; 
  $lname= $row_select['lname'];

}



?>

<!doctype html>
<html lang="en">
    <head>
        <title>Place Me | Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="wrapper d-flex align-items-stretch">
          <nav id="sidebar">
              <div class="custom-menu">
                  <button type="button" id="sidebarCollapse" class="btn btn-primary">
                      <i class="fa fa-bars"></i>
                      <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <h1><a href="index.php" class="logo">Place Me</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="homepage.php"><span class="fa fa-user mr-3"></span> Profile</a>
                    </li>
                    <li>
                        <a href="viewresults.php"><span class="fa fa-user mr-3"></span> View Results</a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
           
            
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold"></span><span class="text-black-50"></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div>
                    <div class="col-md-6"><label class="labels"><?php echo $_SESSION['id']; ?></label><input type="text" class="form-control" value=""></div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels"><?php echo $fname?></label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-6"><label class="labels"><?php echo $lname?></label><input type="text" class="form-control" value="" placeholder="Last name"></div>
                        </div>
                        <div class="row mt-3">
                            <?php

                            //If profile has not been edited, do not view anything. If selected, display edits after saving profile//
                            $id_check = "SELECT * FROM `user_selection` WHERE `candidateID` = '$id'";
                            $result1 = mysqli_query($connect,$id_check);
                            $row = mysqli_fetch_assoc($result1);
                            if(isset($row['candidateID'])){
                                echo '<br>';
                                echo 'Current Institution: ' . $current_school;
                            
                            
                                echo '<br>';

                                echo '<br>';

                                echo ' 1st Choice School: ' . $first_choice;

                                echo '<br>';

                                echo '<br>';

                                echo '2nd Choice School: ' . $second_choice;

                                echo '<br>';

                                echo '<br>';

                                echo '3rd Choice School: ' . $third_choice;

                                echo '<br>';

                                echo '<br>';

                                echo '4th Choice School: ' . $fourth_choice;

                                echo '<br>';

                                exit();
                            }
                            else{
                                echo 'ID not in table';
                            }
                            
                            ?>
                            

                    </div>
                    <div class="mt-5 text-center">
                    <a href="edit_profile.php" class="btn btn-primary profile-button">Edit Profile</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
        </div>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>