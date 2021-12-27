<?php
require 'placeme_connection_test.php';



session_start();
$id=$_SESSION['id'];
$sql_select= "SELECT * FROM `candidate` WHERE `candidateID`= '$id'";
$result_user = mysqli_query($connect,$sql_select);


if ($row_select = mysqli_fetch_assoc($result_user)) {
    //This will be used to display the candidate's first and last name when editing the profile
  $fname= $row_select['fname']; 
  $lname= $row_select['lname'];
}


// $user_select= "SELECT * FROM `user_selection` WHERE `candidateID`= '$id'";
// $result_user_profile = mysqli_query($connect,$user_select);

// if($user_row = mysqli_fetch_array($result_user_profile)){
//    $current_school = $user_row['current_school'];
//     $first_choice = $user_row['first_choice'];
//     $second_choice = $user_row['second_choice'];
//     $third_choice = $user_row['third_choice'];
//     $fourth_choice = $user_row['fourth_choice']; 
// }
    






if(isset($_POST["submit"])) {
    $current_inst = $_POST['current_inst'];
    $first_choice = $_POST['first_choice'];
    $second_choice = $_POST['second_choice'];
    $third_choice = $_POST['third_choice'];
    $fourth_choice = $_POST['fourth_choice'];

    // $sql_update = "INSERT INTO `user_selection` (`candidateID`, `current_school`, `first_choice`, `second_choice`, `third_choice`, `fourth_choice`) 
    // VALUES ('$id','$current_inst','$first_choice','$second_choice','$third_choice','$fourth_choice') ON DUPLICATE KEY UPDATE `current_school` = '$current_inst', `first_choice` = '$first_choice',
    // `second_choice` = '$second_choice', `third_choice` = '$third_choice', `fourth_choice` = '$fourth_choice'"; 
 
    $sql_update1 = "SELECT * FROM `user_selection` WHERE `candidateID` = $id";
    $result1 = mysqli_query($connect, $sql_update1);
    
    
    if(mysqli_num_rows($result1)){
       $sql_update2 = "INSERT INTO `user_selection` (`candidateID`, `current_school`, `first_choice`, `second_choice`, `third_choice`, `fourth_choice`) VALUES ('$id','$current_inst','$first_choice','$second_choice','$third_choice','$fourth_choice')";
       $result2 = mysqli_query($connect, $sql_update2);
       if($result2){echo 'Records inserted successfully';}
       else{echo 'Records not inserted';}

    }
    else{
        $sql_update3 = "UPDATE `user_selection` SET `current_school`= '$current_inst',`first_choice`= '$first_choice',`second_choice`= '$second_choice',`third_choice`= '$third_choice',`fourth_choice`= '$fourth_choice' WHERE `candidateID` = '$id'";
        $result3 = mysqli_query($connect, $sql_update3);
        if($result3){
            echo 'Records updated';
        }
        else{echo 'Records not updated';}
    }
    
    
            // header("location: homepage.php");


        // if the ID exists in the user_selection table but the user wants to edit the selected schools
               

        


    }
?>





<!doctype html>
<html lang="en">
    <head>
        <title>Place Me | Edit Profile</title>
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
                <h1><a href="landing-page.php" class="logo">Place Me</a></h1>
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
                <form action = "" method = "post">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div>
                        <div class="row mt-2">
                        <div class="col-md-6"><label class="labels"><?php echo $_SESSION['id']; ?></label><input type="text" class="form-control" value=""></div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels"><?php echo $fname?></label><input type="text" class="form-control" value=""></div>
                            <div class="col-md-6"><label class="labels"><?php echo $lname?></label><input type="text" class="form-control" value="" placeholder="Last name"></div>
                        </div>
                        <div class="row mt-3">
                            <?php
                           
                            echo 'Current Institution: ';
                            echo '<select name = "current_inst">
                            <option>Select</option>';
                            $sqli = "SELECT * FROM junior_high";
                            $result = mysqli_query($connect, $sqli);
                            while ($row = mysqli_fetch_array($result)) {
                                // $current_instval = $row['inst_name'];
                                // echo '<option value = '. $current_instval . '>'.$row['inst_name'].'</option>';
                                echo "<option value=\"{$row['inst_name']}\">" . $row['inst_name'] . "</option>";
                            }
                            
                            echo '</select>';

                            
                            echo ' 1st Choice School: ';
                            echo '<select name = "first_choice">
                            <option>Select</option>';
                            $sqli = "SELECT * FROM senior_high";
                            $result = mysqli_query($connect, $sqli);
                            while ($row = mysqli_fetch_array($result)) {
                                // $first_choiceval = $row['inst_name'];
                                // echo '<option value = '. $first_choiceval . '>'.$row['inst_name'].'</option>';
                                echo "<option value=\"{$row['inst_name']}\">" . $row['inst_name'] . "</option>";
                            }
                            
                            echo '</select>';

                            
                            echo '2nd Choice School: ';
                            echo '<select name ="second_choice">
                            <option>Select</option>';
                            $sqli = "SELECT * FROM senior_high";
                            $result = mysqli_query($connect, $sqli);
                            while ($row = mysqli_fetch_array($result)) {
                                // $second_choiceval = $row['inst_name'];
                                // echo '<option value = '. $second_choiceval . '>'.$row['inst_name'].'</option>';
                                echo "<option value=\"{$row['inst_name']}\">" . $row['inst_name'] . "</option>";
                            }
                            
                            echo '</select>';

                           
                            echo '3rd Choice School: ';
                            echo '<select name = "third_choice">
                            <option>Select</option>';
                            $sqli = "SELECT * FROM senior_high";
                            $result = mysqli_query($connect, $sqli);
                            while ($row = mysqli_fetch_array($result)) {
                                // $third_choiceval = $row['inst_name'];
                                // echo '<option value = '. $third_choiceval . '>'.$row['inst_name'].'</option>';
                                echo "<option value=\"{$row['inst_name']}\">" . $row['inst_name'] . "</option>";
                            }
                            
                            echo '</select>';

                           
                            echo '4th Choice School: ';
                            echo '<select name = "fourth_choice">
                            <option>Select</option>';
                            $sqli = "SELECT * FROM senior_high";
                            $result = mysqli_query($connect, $sqli);
                            while ($row = mysqli_fetch_array($result)) {
                                // $fourth_choiceval = $row['inst_name'];
                                // echo '<option value = '. $fourth_choiceval . '>'.$row['inst_name'].'</option>';
                                echo "<option value=\"{$row['inst_name']}\">" . $row['inst_name'] . "</option>";
                            }
                            
                            echo '</select>';
                            ?>
                            </form>

                    </div><br><br>
                    <div class="mt-5 text-center">
                        <input class = "btn btn-primary profile-button" type="submit" value="Save Profile" name="submit">
                        <a href="homepage.php"></a>
                    </div>
                        </form>
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

