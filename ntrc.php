<?php
ob_start();
require("config.php");
session_start();
$errors = array();
if (isset($_POST['ntrc_id'])){
	$ntrc_id = stripslashes($_REQUEST['ntrc_id']);
	$ntrc_id = mysqli_real_escape_string($con,$ntrc_id);
	$ntrc_psswd = stripslashes($_REQUEST['ntrc_psswd']);
	$ntrc_psswd = mysqli_real_escape_string($con,$ntrc_psswd);

  $query=mysqli_query($con, "select * from ntrc_admin where ntrc_id='$ntrc_id' and ntrc_psswd='".md5($ntrc_psswd)."'")
	or die(mysqli_error($con));

if(isset($_SESSION['ntrc_id']) || (trim($_SESSION['ntrc_id']) == '') && isset($ntrc_id))
        {
					   $_SESSION['ntrc_id'] = $ntrc_id;
	    header ("Location: ntrc_announcement.php");
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
  <title >Life4U NTRC Admin Login</title>
  <link rel="stylesheet" href="css/organ.css">
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>
<a href="index.html"><img class="home" src="images/home.png"/></a>
  <center><h1>Life4U NTRC Staff Login Page</h1></center>

<div class="login-page">
  <div class="form">
    <form class="login-form" method='post'>
      <br>
      <label>Staff ID</label>
      <input type='text' name="ntrc_id" id="ntrc_id">

      <label>Password</label>
      <input type='password' name="ntrc_psswd" id="ntrc_psswd">
      <br>
      <br>
        <button type="submit" style="width: 100%;" value="login">LOGIN</button>

      <p class="message">Forgot Password? Please contact the administrator.</a></p>
    </form>
  </div>

  <div class="wrapfooter">
  <footer> Powered by YZ Designs </footer>
  </div>
</div>
</body>
</html>
