<?php
require('admin_process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Me | Admin Login</title>
    <link rel="stylesheet" href="placeme.css">
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
<!-- <div class="bg-img"> -->
        <div class="content">
           <!-- <img id = "ashesi_logo" src="https://www.ashesi.edu.gh/images/logo-mobile.png"> -->
           <header>Welcome to Place Me Admin</header>
           <h2 style="color: red"> <?php if (isset($_GET['login_error'])) {
                               echo $_GET['login_error'];
                           } ?></h2> 
           <form action="admin_process.php" method="post">
              <div class="field">
                 <input type="text" required placeholder=" Admin ID" name = "id_no">
              </div><br>
              <div class="field">
                 <span class="fa fa-user"></span>
                 <input type="password" required placeholder=" Admin Password" name = "password">
              </div><br>
              <div class="buttonholder">
                 <input type="submit" value="Login" class="login-btn" name = "submit">
                 <a href="admin_candidates.php"></a>
               </div>
               <div class="account">
                  <a href="login.php">Not an admin</a>
               </div>
        </div>
     <!-- </div> -->
     </div>
     </div>
</body>
</html>