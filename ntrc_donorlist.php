<?php
ob_start();
require("config.php");
include("ntrc_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U</title>
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
        <h2> Donor List </h2>
        <main>
            <div class="content">
              <table align="center" id="donorlist">
            	<tr>
              <th>#</th>
              <th>MyKad No.</th>
              <th>Name</th>
              <th>Contact No.</th>
              <th>Organ Donated</th>
              <th colspan="2">Action</th>
              </tr>
              <?php
              $count=1;
              $query="select * from organ_donors;";
              $result = mysqli_query($con, $query);
              while ($row = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $count; ?></td>
                 <td><?php echo $row["od_mykad"]; ?></td>
                 <td style="text-align:left;"><?php echo $row["od_name"]; ?></td>
                 <td><?php echo $row["od_contact"]; ?></td>
                 <td><?php echo $row["od_organ"]; ?></td>
                 <td align="center"><a href="ntrc_viewdonor.php?od_mykad=<?php echo htmlentities ($row['od_mykad']); ?>">
                   <img src="images/vieworgan.png" height="30" width="30"/></a></td>
                   <td align="center"><a href="ntrc_deletedonor.php?od_mykad=<?php echo htmlentities ($row['od_mykad']); ?>">
                     <img src="images/deleteorgan.png" height="30" width="30"/></a></td>
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
