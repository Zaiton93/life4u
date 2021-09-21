<?php
ob_start();
require("config.php");
session_start();
if (isset($_POST['nbb_id'])){
	$nbb_id = stripslashes($_REQUEST['nbb_id']);
	$nbb_id = mysqli_real_escape_string($con,$nbb_id);
	$nbb_psswd = stripslashes($_REQUEST['nbb_psswd']);
	$nbb_psswd = mysqli_real_escape_string($con,$nbb_psswd);

  $query=mysqli_query($con, "select * from nbb_admin where nbb_id='$nbb_id' and nbb_psswd='".md5($nbb_psswd)."'")
	or die(mysqli_error($con));

if(isset($_SESSION['nbb_id']) || (trim($_SESSION['nbb_id']) == '') && isset($nbb_id))
        {
					   $_SESSION['nbb_id'] = $nbb_id;
	    header ("Location: nbb_announcement.php");
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
  <title >Life4U NBB Admin Login</title>
  <link rel="stylesheet" href="css/blood.css">
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>
<a href="index.html"><img class="home" src="images/home.png"/></a>
  <center><h1>Life4U NBB Staff Login Page</h1></center>

<div class="login-page">
  <div class="form">
    <form class="login-form" method='post'>
      <br>
      <label>Staff ID</label>
      <input type='text' name="nbb_id" id="nbb_id">

      <label>Password</label>
      <input type='password' name="nbb_psswd" id="nbb_psswd">
      <br>
      <br>
        <button type="submit" style="width: 100%;" value="login">LOGIN</button>

      <p class="message">Forgot Password? Please contact the administrator.</a></p>
    </form>
  </div>
</div>

<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
</body>
</html>
