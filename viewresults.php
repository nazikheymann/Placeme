<?php
 require "placeme_connection_test.php";

session_start();
$id=$_SESSION['id'];
$sql_select= "SELECT * FROM `user_selection` WHERE `candidateID`= '$id'";
$result_user = mysqli_query($connect,$sql_select);
if ($row_select=mysqli_fetch_assoc($result_user)) {


  $current_school = $row_select['current_school'];
  $first_choice = $row_select['first_choice'];
  $second_choice = $row_select['second_choice'];
  $third_choice = $row_select['third_choice'];
  $fourth_choice = $row_select['fourth_choice'];
}



?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Place Me | View Results</title>
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
      <div id="content" class="p-4 p-md-5 pt-5">

      <?php
    $rawscore = rand(300,540);
    echo 'Your rawscore is ' . $rawscore;
    
    echo '<br><br>';
if ( in_array($rawscore, range(470,540)) ) {
    echo 'You got first choice';
    echo '<br>';
    echo 'You have been placed in ' . $first_choice;
}

else if ( in_array($rawscore, range(400,469)) ) {
    echo 'You got second choice';
    echo '<br>';
    echo 'You have been placed in ' . $second_choice;
}

else if ( in_array($rawscore, range(360,399)) ) {
    echo 'You got third choice';
    echo '<br>';
    echo 'You have been placed in ' . $third_choice;
}

else {
    echo 'You got fourth choice';
    echo '<br>';
    echo 'You have been placed in ' . $fourth_choice;
}



?>


      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>