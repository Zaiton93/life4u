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
  <title>Welcome to Life4U: My Profile</title>
  <link rel="stylesheet" href="css/main_ntrc.css">
	  <link rel="stylesheet" href="css/sidebar.css">
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
        <h2>My Profile</h2>
      <main>
          <div class="content">
            <div id="icon">
              <a href="ntrc_editprofile.php"><img class="icon" src="images/editorgan.png"/></a>
          </div>
          <br>
          <table align="center" class="myprofile">
          <?php
          $query=mysqli_query($con,"select * from ntrc_admin where ntrc_id ='" . $_SESSION['ntrc_id'] . "'")
          or die (mysqli_error($con));
          while ($row=mysqli_fetch_array($query)) {
          ?>
            <tr>
            <th>Staff ID</th>
            <td><?php echo $row['ntrc_id'];?></td>
          </tr>
            <tr>
              <th>Name</th>
              <td><?php echo $row['ntrc_name'];?></td>
            </tr>
            <tr>
            <th>Contact No.</th>
            <td><?php echo $row['ntrc_contact'];?></td>
          </tr>
           <tr>
            <th>Email</th>
            <td><?php echo $row['ntrc_email'];?></td>
          </tr>
            <tr>
             <th>Address</th>
               <td><?php echo $row['ntrc_address'];?></td>
             </tr>
             <tr>
              <th>Created Date</th>
              <td><?php echo $row['ntrc_regdate'];?></td>
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
