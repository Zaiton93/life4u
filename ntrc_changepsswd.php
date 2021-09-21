<?php
ob_start();
require("config.php");
include("ntrc_auth.php");
$query=mysqli_query($con,"select * from ntrc_admin where ntrc_id ='" . $_SESSION['ntrc_id'] . "'")
or die (mysqli_error($con));
$row=mysqli_fetch_array($query);
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Change Password</title>
  <link rel="stylesheet" href="css/main_ntrc.css">
  <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
  </head>
<body>
  <center><img class="header" src="images/headerorgan.png"></center>
	<button id="openbtn" onclick="openNav()">☰</button>
				<div id="mySidebar" class="sidebar">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
				<a href="ntrc_announcement.php">Announcements</a>
				<a href="ntrc_donorlist.php">Donor Lists</a>
				<a href="ntrc_events.php">Manage Events</a>
				<a href="ntrc_manageadmin.php">Manage Admins</a>
				<a href="ntrc_myprofile.php">My Profile</a>
				<a href="ntrc_changepsswd.php">Change Password</a>
				<a href="ntrc_logout.php">Logout</a>
			</div>

					<div class="line"></div>
        <h2>Change Password</h2>
      <main>
        <?php
        if(isset($_POST['changepsswd']) && $_POST['changepsswd']=='changepsswd') {
        $ntrc_psswd = stripslashes($_REQUEST['ntrc_psswd']);
        $ntrc_psswd = mysqli_real_escape_string($con,$ntrc_psswd);
        $ntrc_repsswd = stripslashes($_REQUEST['ntrc_repsswd']);

        $update=mysqli_query($con,"update ntrc_admin set ntrc_psswd='".md5($ntrc_psswd)."' where ntrc_id='" .$ntrc_id. "'")
        or die(mysqli_error($con));
          if ($query) {
      		echo "<script>alert('Password Successfully Changed!'); window.open('ntrc_changepsswd.php','_self')</script>";
      	} else {
      		echo "<script>alert('Something Went Wrong, Please Try Again Later.')</script>";
      	}
      }
      ?>

          <div class="content">
            <div class="form-page">
                <form class="changepsswd" action="" method='post'>
                  <label>New Password</label>
                  <input type='password' ='ntrc_psswd' id='ntrc_psswd' value=""/>
                  <br>
                  <label>Confirm Password</label>
                  <input type='password' name='ntrc_repsswd' id='ntrc_repsswd' value=""/>
                  <br>
                  <button type='submit' name="changepsswd" value="changepsswd" onclick="return Validate()">CHANGE PASSWORD</button>
                </form>
              </div>
            </div>
      </main>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="wrapfooter">
      <footer> Powered by YZ Designs </footer>
      </div>
      <script src="js/sidebar.js"></script>
      <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("ntrc_psswd").value;
        var confirmPassword = document.getElementById("ntrc_repsswd").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
    </script>
      </body>
      </html>
