<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Me | Login</title>
    <link rel="stylesheet" href="placeme.css">
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
<!-- <div class="bg-img"> -->
        <div class="content">
           <!-- <img id = "ashesi_logo" src="https://www.ashesi.edu.gh/images/logo-mobile.png"> -->
           <header>Welcome to Place Me</header>
           <form action="Homepage.php" method="post">
              <div class="field">
                 <input type="text" required placeholder=" Index number">
              </div><br>
              <div class="field">
                 <span class="fa fa-user"></span>
                 <input type="password" required placeholder=" Password">
              </div><br>
              <div class="buttonholder">
                 <input class = "login-btn" type="submit" value="Login">
                 <a href="Homepage.php"></a>
              </div>
           </form>
               <div class="account">
                Don't have account?
                <a href="signup.php">Signup Now</a>
                <a href="admin.php">| Admin</a>
            </div>
        </div>
     <!-- </div> -->
     </div>
     </div>
</body>
</html>