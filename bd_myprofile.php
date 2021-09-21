<?php
ob_start();
require("config.php");
include("blood_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: My Profile</title>
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

        <h2> My Profile </h2>
      <main>
          <div class="content">
            <div id="icon">
              <a href="bd_editprofile.php"><img class="icon" src="images/editblood.png"/></a>
            <a onclick="window.print()"><img class="icon" src="images/printblood.png"/></a>
          </div>
          <br>
          <table align="center" class="myprofile">
          <?php
          $query=mysqli_query($con,"select * from blood_donors where bd_mykad ='" . $_SESSION['bd_mykad'] . "'")
          or die (mysqli_error($con));
          while ($row=mysqli_fetch_array($query)) {
          ?>
            <tr>
            <th>Donor MyKad No.</th>
            <td><?php echo $row['bd_mykad'];?></td>
          </tr>
            <tr>
              <th>Full Name</th>
              <td><?php echo $row['bd_name'];?></td>
            </tr>
            <tr>
              <th>Date of Birth</th>
              <td><?php echo $row['bd_dob'];?></td>
            </tr>
            <tr>
              <th>Age</th>
              <td><?php echo $row['bd_age'];?></td>
            </tr>
            <tr>
              <th>Gender</th>
              <td><?php echo $row['bd_gender'];?></td>
            </tr>
            <tr>
              <th>Race</th>
              <td><?php echo $row['bd_race'];?></td>
            </tr>
            <tr>
              <th>Marital Status</th>
              <td><?php echo $row['bd_marital'];?></td>
            </tr>
            <tr>
              <th>Occupation</th>
              <td><?php echo $row['bd_job'];?></td>
            </tr>
            <tr>
               <th>Address</th>
               <td><?php echo $row['bd_address'];?></td>
             </tr>
             <tr>
               <th>City</th>
               <td><?php echo $row['bd_city'];?></td>
             </tr>
              <tr>
               <th>State</th>
               <td><?php echo $row['bd_state'];?></td>
             </tr>
              <tr>
               <th>Postcode</th>
               <td><?php echo $row['bd_postcode'];?></td>
             </tr>
             <tr>
               <th>Blood Group</th>
               <td><?php echo $row['bd_group'];?></td>
             </tr>
             <tr>
               <th>Contact No.</th>
               <td><?php echo $row['bd_contact'];?></td>
             </tr>
              <tr>
               <th>Email</th>
               <td><?php echo $row['bd_email'];?></td>
             </tr>
             <tr>
              <th>Date of Registration</th>
              <td><?php echo $row['bd_regdate'];?></td>
            </tr>
       <?php
}?>
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
    </body>
    </html>
