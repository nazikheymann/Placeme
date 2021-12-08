<?php
// Include config file
require_once "placeme_connection_test.php";
 
// Define variables and initialize with empty values
$fname = $lname = $gender = $candidateID = "";
$fname_err = $lname_err = $gender_err = $candidate_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate CandidateId
    $input_ID = trim($_POST["candidateID"]);
    if(empty($input_ID)){
        $candidate_err = "Please enter the candidate's ID.";
    } elseif(!filter_var($input_ID, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $candidate_err = "Please enter a valid ID.";
    } else{
        $candidateID = $input_ID;
    }

    // Validate first name
    $input_fname = trim($_POST["fname"]);
    if(empty($input_fname)){
        $fname_err = "Please enter the candidate's first name.";
    } elseif(!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fname_err = "Please enter a valid name.";
    } else{
        $fname = $input_fname;
    }
    
    // Validate last name
    $input_lname = trim($_POST["lname"]);
    if(empty($input_lname)){
        $lname_err = "Please enter the candidate's last name.";
    } elseif(!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lname_err = "Please enter a valid name.";
    } else{
        $lname = $input_lname;
    }
    
    
    // Validate gender 
    $input_gender = trim($_POST["gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter the gender.";
    } elseif(!filter_var($input_gender, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $gender_err = "Please enter a valid gender.";
    } else{
        $gender= $input_gender;
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($lname_err) && empty($gender_err)) && empty($candidate_err){
        // Prepare an insert statement
        $sql = "INSERT INTO candidate (candidateID, fname, lname, gender) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($connect, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_ID, $param_fname, $param_lname, $param_gender);
            
            // Set parameters
            $param_ID = $candidateID
            $param_fname = $fname;
            $param_lname = $lname;
            $param_gender = $gender;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: admin_candidates.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add candidate record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label>Candidate ID</label>
                            <input type="text" name="candidateID" class="form-control <?php echo (!empty($candidate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $candidateID; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <textarea name="lname" class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>"><?php echo $lname; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
        
                            <input type="text" name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gender; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="members_page.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>