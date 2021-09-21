<?php
ob_start();
require("config.php");
include("nbb_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Donor Profile</title>
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
        <h2>Donor Profile</h2>
      <main>
          <div class="content">
            <div id="icon">
              <a href="nbb_donorlist.php"><img class="icon" src="images/backblood.png"/></a>
          </div>
          <br>
            <table align="center" class="viewdonor">
            <?php
            $bd_mykad    = $_REQUEST['bd_mykad'];
            $query=mysqli_query($con,"select * from blood_donors where bd_mykad='" .$bd_mykad. "'")
            or die (mysqli_error($con));
            while ($row=mysqli_fetch_array($query)) {
            ?>
              <tr>
              <th>Donor MyKad No.</th>
              <td><?php echo $row['bd_mykad'];?></td>
              <th>Full Name</th>
              <td colspan="3"><?php echo $row['bd_name'];?></td>
            </tr>
              <tr>
                <th>Date of Birth</th>
                <td><?php echo $row['bd_dob'];?></td>
                <th>Age</th>
                <td><?php echo $row['bd_age'];?></td>
                <th>Gender</th>
                <td><?php echo $row['bd_gender'];?></td>
              </tr>
              <tr>
                <th>Race</th>
                <td><?php echo $row['bd_race'];?></td>
                <th>Marital Status</th>
                <td><?php echo $row['bd_marital'];?></td>
                <th>Occupation</th>
                <td><?php echo $row['bd_job'];?></td>
              </tr>
              <tr>
                 <th>Address</th>
                 <td colspan="5"><?php echo $row['bd_address'];?></td>
               </tr>
                <tr>
                 <th>City</th>
                 <td><?php echo $row['bd_city'];?></td>
                 <th>State</th>
                 <td><?php echo $row['bd_state'];?></td>
                 <th>Postcode</th>
                 <td><?php echo $row['bd_postcode'];?></td>
               </tr>
               <tr>
                 <th>Blood Group</th>
                 <td><?php echo $row['bd_group'];?></td>
                 <th>Contact No.</th>
                 <td><?php echo $row['bd_contact'];?></td>
                 <th>Date of Registration</th>
                 <td><?php echo $row['bd_regdate'];?></td>
               </tr>
                <tr>
                 <th>Email</th>
                 <td colspan="5"><?php echo $row['bd_email'];?></td>
               </tr>
         <?php
  }?>
          </table>
          <br>
          <br>
          <table align="center" class="donorhistory">
            <tr>
            <th>#</th>
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
              blood_donors.bd_mykad = blood_donation_history.bdh_mykad where bd_mykad ='" . $bd_mykad . "'")
              or die (mysqli_error($con));
              while ($row=mysqli_fetch_array($query)) {
              ?>
              <td><?php echo $count; ?></td>
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
        <br>
        <br>
      <div class="wrapfooter">
      <footer> Powered by YZ Designs </footer>
      </div>
      <script src="js/sidebar.js"></script>
      </body>
      </html>
