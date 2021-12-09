<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Me | Profile</title> 
    <link rel = "stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <?php
    require "placeme_connection_test.php";
    ?>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="First name" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Last name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email Address</label><input type="text" class="form-control" placeholder="enter email address" value=""></div>
                    <!-- <div class="col-md-12"><label class="labels">Current institution</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                    <div class="col-md-12"><label class="labels">First Choice School</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->

                    <?php
                    echo '<br>';
                    echo 'Current Institution: ';
                    echo '<select>
                    <option>Select</option>';
                    $sqli = "SELECT * FROM junior_high";
                    $result = mysqli_query($connect, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['inst_name'].'</option>';
                    }
                    
                    echo '</select><br>';

                    echo '<br>';
                    echo ' 1st Choice School: ';
                    echo '<select>
                    <option>Select</option>';
                    $sqli = "SELECT * FROM senior_high";
                    $result = mysqli_query($connect, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['inst_name'].'</option>';
                    }
                    
                    echo '</select>';

                    echo '<br>';
                    echo '2nd Choice School: ';
                    echo '<select>
                    <option>Select</option>';
                    $sqli = "SELECT * FROM senior_high";
                    $result = mysqli_query($connect, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['inst_name'].'</option>';
                    }
                    
                    echo '</select>';

                    echo '<br>';
                    echo '3rd Choice School: ';
                    echo '<select>
                    <option>Select</option>';
                    $sqli = "SELECT * FROM senior_high";
                    $result = mysqli_query($connect, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['inst_name'].'</option>';
                    }
                    
                    echo '</select>';

                    echo '<br>';
                    echo '4th Choice School: ';
                    echo '<select>
                    <option>Select</option>';
                    $sqli = "SELECT * FROM senior_high";
                    $result = mysqli_query($connect, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['inst_name'].'</option>';
                    }
                    
                    echo '</select>';
                    ?>

                    <!-- <div class="col-md-12"><label class="labels">Second Choice School</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Third Choice School</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Fourth Choice School</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                -->
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div> 
                <!--
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
</div>
</div>
</div>
</body>
</html>