<?php
ob_start();
require("config.php");
include("nbb_auth.php");
if (isset($_REQUEST['addadmin'])) {
	$nbb_id        = stripslashes($_REQUEST['nbb_id']);
  $nbb_id        = mysqli_real_escape_string($con,$nbb_id);
  $nbb_name      = stripslashes($_REQUEST['nbb_name']);
  $nbb_name      = mysqli_real_escape_string($con,$nbb_name);
  $nbb_contact   = stripslashes($_REQUEST['nbb_contact']);
  $nbb_contact   = mysqli_real_escape_string($con,$nbb_contact);
  $nbb_email     = stripslashes($_REQUEST['nbb_email']);
  $nbb_email     = mysqli_real_escape_string($con,$nbb_email);
  $nbb_addres    = stripslashes($_REQUEST['nbb_address']);
  $nbb_address   = mysqli_real_escape_string($con,$nbb_address);
  $nbb_psswd     = stripslashes($_REQUEST['nbb_psswd']);
  $nbb_psswd     = mysqli_real_escape_string($con,$nbb_psswd);
  $nbb_regdate   = date("Y-m-d H:i:s");
	$nbb_createdby = $_SESSION['nbb_id'];
		$query=mysqli_query($con,"insert into nbb_admin
    (nbb_id, nbb_name, nbb_contact, nbb_email, nbb_address, nbb_psswd, nbb_regdate, nbb_createdby)
		values
    ('$nbb_id', '$nbb_name', '$nbb_contact', '$nbb_email', '$nbb_address', '$nbb_psswd', '$nbb_regdate', '$nbb_createdby')")
    or die (mysqli_error($con));
    if ($query) {
		echo "<script>alert('Profile Created Successfully!'); window.open('nbb_manageadmin.php','_self')</script>";
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
  <link rel="stylesheet" href="css/main_nbb.css">
  <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
  </head>
<body>

    <center><img class="header" src="images/headerblood.png"></center>
	  <button id="openbtn" onclick="openNav()">☰</button>
					<div id="mySidebar" class="sidebar">
  				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
          <a href="nbb_announcement.php">Announcements</a>
          <a href="nbb_donorlist.php">Donor Lists</a>
          <a href="nbb_addhistory.php">Add Record</a>
          <a href="nbb_events.php">Manage Events</a>
          <a href="nbb_manageadmin.php">Manage Admins</a>
          <a href="nbb_myprofile.php">My Profile</a>
          <a href="nbb_changepsswd.php">Change Password</a>
          <a href="nbb_logout.php">Logout</a>
				</div>

					<div class="line"></div>
        <h2>Add New Admin</h2>
      <main>
          <div class="content">
            <div class="form-page">
                <form class="addhistory" action="" method='post'>
                  <label>Staff ID</label>
                  <input type='text' name='nbb_id' id='nbb_id' value=""/>
                  <br>
                  <label>Name</label>
                  <input type='text' name='nbb_name' id='nbb_name' value=""/>
                  <br>
                  <label>Contact</label>
                  <input type='text' name='nbb_contact' id='nbb_contact' value=""/>
                  <br>
                  <label>Email</label>
                  <input type='text' name='nbb_email' id='nbb_email'/>
                  <br>
                  <label>Address</label>
                  <input type='text' name='nbb_address' id='nbb_address'/>
                  <br>
                  <label>Temporary Password</label>
                  <input type='password' name='nbb_psswd' id='nbb_psswd'/>
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
