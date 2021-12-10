<?php
// Include connection test file
require_once "placeme_connection_test.php";

// Define variables and initialize with empty values

if(isset($_POST["submit"])) {


    $fname = $_POST["fname"];
    $lname = $_POST["lname"]; 
	$id_no = $_POST["id_no"];

    



    //select indexes in the db
    $id_check = "SELECT * FROM `candidate` WHERE `candidateID` = '$id_no'";
    $result1 = mysqli_query($connect,$id_check);
    $row = mysqli_fetch_assoc($result1);
     if(isset($row['candidateID'])){
        header("location: create.php?error=ID already exists");
        exit();
    }
    else{
        $sql = "INSERT INTO `candidate` ( `candidateID`, `fname`,`lname`) VALUES ('$id_no', '$fname', '$lname')";
        $result = mysqli_query($connect, $sql);
        header("location: admin_candidates.php");
    }



    
    


    




mysqli_close($connect);

}   
  

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Homepage.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <h2 style="color: red"> <?php if (isset($_GET['error'])) {
                               echo $_GET['error'];
                           } ?></h2> 
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add candidate record to the database.</p>
                    <form action="" method="post">
                    <div>
                    <div class="form-group">
                            <label>Candidate ID</label>
                            <input type="text" placeholder=" Index number" id="id_no" name = "id_no"/>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" placeholder=" First Name" id="fname" name = "fname"/>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder=" Last Name" id="lname" name ="lname"/>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit" name = "submit">
                        <a href="admin_candidates.php" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>