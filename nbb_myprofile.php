<?php
ob_start();
require("config.php");
include("nbb_auth.php");
$query=mysqli_query($con,"select * from nbb_admin where nbb_id ='" . $_SESSION['nbb_id'] . "'")
or die (mysqli_error($con));
$row=mysqli_fetch_array($query);
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: My Profile</title>
  <link rel="stylesheet" href="css/main_nbb.css">
	  <link rel="stylesheet" href="css/sidebar.css">
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
        <h2>My Profile</h2>
      <main>
          <div class="content">
            <div id="icon">
              <a href="nbb_editprofile.php"><img class="icon" src="images/editblood.png"/></a>
          </div>
          <br>
          <table align="center" class="myprofile">
          <?php
          $query=mysqli_query($con,"select * from nbb_admin where nbb_id ='" . $_SESSION['nbb_id'] . "'")
          or die (mysqli_error($con));
          while ($row=mysqli_fetch_array($query)) {
          ?>
            <tr>
            <th>Staff ID</th>
            <td><?php echo $row['nbb_id'];?></td>
          </tr>
            <tr>
              <th>Name</th>
              <td><?php echo $row['nbb_name'];?></td>
            </tr>
            <tr>
            <th>Contact No.</th>
            <td><?php echo $row['nbb_contact'];?></td>
          </tr>
           <tr>
            <th>Email</th>
            <td><?php echo $row['nbb_email'];?></td>
          </tr>
            <tr>
             <th>Address</th>
               <td><?php echo $row['nbb_address'];?></td>
             </tr>
             <tr>
              <th>Created Date</th>
              <td><?php echo $row['nbb_regdate'];?></td>
            </tr>

       <?php
}?>
        </table>
      </main>

      <div class="wrapfooter">
      <footer> Powered by YZ Designs </footer>
      </div>
      <script src="js/sidebar.js"></script>
      </body>
      </html>
