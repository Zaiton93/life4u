<?php
ob_start();
require("config.php");
include("blood_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Donation History</title>
  <link rel="stylesheet" href="css/main_blood.css">
  <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
  </head>
<body>
    <center><img class="header" src="images/headerblood.png"></center>

    <div class="line"></div>
        <div class="topnav">
          <a href="bd_announcement.php">Current Affairs</a>
          <a href="bd_events.php">Upcoming Events</a>
          <a href="bd_history.php">Donation History</a>
          <a href="bd_myprofile.php">My Profile</a>
          <a href="donor_logout.php">Logout</a>
        </div>

  <h2>Donation History</h2>
<main>
    <div class="content">
      <table align="center" class="donorhistory">
        <tr>
        <th>#</th>
        <th>Donor MyKad No.</th>
        <th>Date of Donation</th>
        <th>Serial No.</th>
        <th>Amount Donated (ml)</th>
        <th>Donated Location</th>
        <th>Recorded By</th>
        <th>Remarks</th>
        <th>Created Date</th>
        <th>Updated By</th>
        </tr>
        <tr>
          <?php
          $count=1;
          $query=mysqli_query($con,"select * from blood_donors inner join blood_donation_history on
          blood_donors.bd_mykad = blood_donation_history.bdh_mykad where bd_mykad ='" . $_SESSION['bd_mykad'] . "'")
          or die (mysqli_error($con));
          while ($row=mysqli_fetch_array($query)) {
          ?>
          <td><?php echo $count; ?></td>
        <td><?php echo $row['bdh_mykad'];?></td>
        <td><?php echo $row['bdh_donatedate'];?></td>
        <td><?php echo $row['bdh_serialno'];?></td>
        <td><?php echo $row['bdh_amount'];?></td>
        <td><?php echo $row['bdh_location'];?></td>
        <td><?php echo $row['bdh_staffname'];?></td>
        <td><?php echo $row['bdh_remarks'];?></td>
        <td><?php echo $row['bdh_regdate'];?></td>
        <td><?php echo $row['bdh_updatedstaff'];?></td>
         </tr>
         <?php $count++; } ?>
    </table>

    </div>
</main>
<br>
<br>
<br>
<br>
<br>
<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
</body>
</html>
