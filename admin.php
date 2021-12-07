<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Me | Admin</title>
    <link rel="stylesheet" href="placeme.css">
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
<div class="bg-img">
        <div class="content">
           <!-- <img id = "ashesi_logo" src="https://www.ashesi.edu.gh/images/logo-mobile.png"> -->
           <header>Welcome to Place Me</header>
           <form action="Homepage.php" method="post">
              
                 <label for = "admin">Admin</label>
                 <!-- <input type="text" required placeholder=" Index number"> -->
              <div class="field">
                 <span class="fa fa-user"></span>
                 <input type="password" required placeholder=" Admin Password">
              </div><br>
              <div class="buttonholder">
		<input type="submit" value="Login" class="login-btn">
        <a href="admin.php"></a>
        </div>
        <div class="account">
                <a href="login.php">Not an admin</a>
            </div>
</div>
</div>
</div>
</div>
</body>
</html>