<?php
ob_start();
require("config.php");
include("ntrc_auth.php");
if (isset($_REQUEST['addadmin'])) {
	$ntrc_id        = stripslashes($_REQUEST['ntrc_id']);
  $ntrc_id        = mysqli_real_escape_string($con,$ntrc_id);
  $ntrc_name      = stripslashes($_REQUEST['ntrc_name']);
  $ntrc_name      = mysqli_real_escape_string($con,$ntrc_name);
  $ntrc_contact   = stripslashes($_REQUEST['ntrc_contact']);
  $ntrc_contact   = mysqli_real_escape_string($con,$ntrc_contact);
  $ntrc_email     = stripslashes($_REQUEST['ntrc_email']);
  $ntrc_email     = mysqli_real_escape_string($con,$ntrc_email);
  $ntrc_addres    = stripslashes($_REQUEST['ntrc_address']);
  $ntrc_address   = mysqli_real_escape_string($con,$ntrc_address);
  $ntrc_psswd     = stripslashes($_REQUEST['ntrc_psswd']);
  $ntrc_psswd     = mysqli_real_escape_string($con,$ntrc_psswd);
  $ntrc_regdate   = date("Y-m-d H:i:s");
	$ntrc_createdby = $_SESSION['ntrc_id'];
		$query=mysqli_query($con,"insert into ntrc_admin
    (ntrc_id, ntrc_name, ntrc_contact, ntrc_email, ntrc_address, ntrc_psswd, ntrc_regdate, ntrc_createdby)
		values
    ('$ntrc_id', '$ntrc_name', '$ntrc_contact', '$ntrc_email', '$ntrc_address', '$ntrc_psswd', '$ntrc_regdate', '$ntrc_createdby')")
    or die (mysqli_error($con));
    if ($query) {
		echo "<script>alert('Profile Created Successfully!'); window.open('ntrc_manageadmin.php','_self')</script>";
	} else {
		echo "<script>alert('Something Went Wrong, Please Try Again Later.')</script>";
	}
}
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Add Admin</title>
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
        <h2>Add New Admin</h2>
      <main>
          <div class="content">
            <div class="form-page">
                <form class="changepsswd" action="" method='post'>
                  <label>Staff ID</label>
                  <input type='text' name='ntrc_id' id='ntrc_id' value=""/>
                  <br>
                  <label>Name</label>
                  <input type='text' name='ntrc_name' id='ntrc_name' value=""/>
                  <br>
                  <label>Contact</label>
                  <input type='text' name='ntrc_contact' id='ntrc_contact' value=""/>
                  <br>
                  <label>Email</label>
                  <input type='text' name='ntrc_email' id='ntrc_email'/>
                  <br>
                  <label>Address</label>
                  <input type='text' name='ntrc_address' id='ntrc_address'/>
                  <br>
                  <label>Temporary Password</label>
                  <input type='password' name='ntrc_psswd' id='ntrc_psswd'/>
                  <br>
                  <button type='submit' name="addadmin" value="addadmin">ADD ADMIN</button>
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
      </body>
      </html>
