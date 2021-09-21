<?php
ob_start();
require("config.php");
include("nbb_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Manage Admins</title>
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
        <h2>Manage Admins</h2>
      <main>
          <div class="content">
					<a href="nbb_addadmin.php"><button type='submit' class="btnaddadmin" name="addadmin" value="addadmin">
							&#43; ADD ADMIN</button></a>
            <table align="center" id="donorlist">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Created Date</th>
            <th>Action</th>
            </tr>
            <?php
            $count=1;
            $query="select * from nbb_admin;";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $count; ?></td>
               <td style="text-align:left;"><?php echo $row["nbb_name"]; ?></td>
               <td><?php echo $row["nbb_contact"]; ?></td>
               <td style="text-align:left;"><?php echo $row["nbb_email"]; ?></td>
               <td><?php echo $row["nbb_regdate"]; ?></td>
               <td align="center"><a href="nbb_deleteadmin.php?nbb_id=<?php echo $row["nbb_id"]; ?>">
                 <img src="images/deleteblood.png" height="30" width="30"/></a></td></a></td>
            </tr>
            <?php $count++; } ?>
            </table>
          </div>
      </main>

      <div class="wrapfooter">
      <footer> Powered by YZ Designs </footer>
      </div>
      <script src="js/sidebar.js"></script>
      </body>
      </html>
