<?php
ob_start();
require("config.php");
session_start();
if (isset($_POST['od_mykad'])){
	$od_mykad = stripslashes($_REQUEST['od_mykad']);
	$od_mykad = mysqli_real_escape_string($con,$od_mykad);
	$od_psswd = stripslashes($_REQUEST['od_psswd']);
	$od_psswd = mysqli_real_escape_string($con,$od_psswd);

  $query=mysqli_query($con, "select * from organ_donors where od_mykad='$od_mykad' and od_psswd='".md5($od_psswd)."'")
	or die(mysqli_error($con));

if(isset($_SESSION['od_mykad']) || (trim($_SESSION['od_mykad']) == '') && isset($od_mykad))
        {
					   $_SESSION['od_mykad'] = $od_mykad;
	    header ("Location: od_announcement.php");
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
  <title >Life4U Organ Donor Login</title>
  <link rel="stylesheet" href="css/organ.css">
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>
<a href="index.html"><img class="home" src="images/home.png"/></a>
  <center><h1>Life4U Organ Donor Login Page</h1></center>

<div class="login-page">
  <div class="form">
    <form class="login-form" method='post'>
			<br>
      <label>Mykad No.</label>
      <input type="text" name="od_mykad" id="od_mykad"/>

      <label>Password</label>
      <input type="password" name="od_psswd" id="od_psswd"/>
			<br>
			<br>
      <button type="submit" style="width: 100%;" name="login" value="login">LOGIN</button>
      <p class="message">New User?&nbsp; &#8594; &nbsp;<a href="od_registration.php">Click Here</a></p>
    </form>
  </div>
</div>

<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
</body>
</html>
