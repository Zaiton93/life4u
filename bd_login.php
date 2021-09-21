<?php
ob_start();
require("config.php");
session_start();
if (isset($_POST['bd_mykad'])){
	$bd_mykad = stripslashes($_REQUEST['bd_mykad']);
	$bd_mykad = mysqli_real_escape_string($con,$bd_mykad);
	$bd_psswd = stripslashes($_REQUEST['bd_psswd']);
	$bd_psswd = mysqli_real_escape_string($con,$bd_psswd);

  $query=mysqli_query($con, "select * from blood_donors where bd_mykad='$bd_mykad' and bd_psswd='".md5($bd_psswd)."'")
	or die(mysqli_error($con));

if(isset($_SESSION['bd_mykad']) || (trim($_SESSION['bd_mykad']) == '') && isset($bd_mykad))
        {
					   $_SESSION['bd_mykad'] = $bd_mykad;
	    header ("Location: bd_announcement.php");
		}
       else
         {
  echo "<script>alert('Login Unsuccessful, please try again later.');</script>";
	}
}
?>

<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title >Life4U Blood Donor Login</title>
  <link rel="stylesheet" href="css/blood.css">
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>

<a href="index.html"><img class="home" src="images/home.png"/></a>
  <center><h1>Life4U Blood Donor Login Page</h1></center>

<div class="login-page">
  <div class="form">
    <form class="login-form" method='post'>
			<br>
      <label>Mykad No.</label>
      <input type="text" name="bd_mykad" id="bd_mykad"/>

      <label>Password</label>
      <input type="password" name="bd_psswd" id="bd_psswd"/>
			<br>
			<br>
      <button type="submit" style="width: 100%;" name="login" value="login">LOGIN</button>

      <p class="message">New User?&nbsp; &#8594; &nbsp; <a href="bd_registration.php">Click Here</a></p>
    </form>
  </div>
</div>
<br>
<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
</body>
</html>
