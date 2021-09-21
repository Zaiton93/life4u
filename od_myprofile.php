<?php
ob_start();
require("config.php");
include("organ_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: My Profile</title>
  <link rel="stylesheet" href="css/main_organ.css">
  <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
  </head>
<body>
    <center><img class="header" src="images/headerorgan.png"></center>

    <div class="line"></div>
        <div class="topnav">
          <a href="od_announcement.php">Current Affairs</a>
          <a href="od_events.php">Upcoming Events</a>
          <a href="od_myprofile.php">My Profile</a>
          <a href="donor_logout.php">Logout</a>
        </div>

      <h2> My Profile </h2>
    <main>
        <div class="content">
          <div id="icon">
      <a href="od_editprofile.php?id=" . $rows['od_mykad'] . "\"><img class="icon" src="images/editorgan.png"/></a>
          <a onclick="window.print()"><img class="icon" src="images/printorgan.png"/></a>
        </div>
        <br>
        <table align="center" class="myprofile">
        <?php
        $query=mysqli_query($con,"select * from organ_donors where od_mykad ='" . $_SESSION['od_mykad'] . "'")
        or die (mysqli_error($con));
        while ($row=mysqli_fetch_array($query)) {
        ?>
          <tr>
          <th>Donor MyKad No.</th>
          <td><?php  echo $row['od_mykad'];?></td>
        </tr>
          <tr>
            <th>Full Name</th>
            <td><?php  echo $row['od_name'];?></td>
          </tr>
          <tr>
            <th>Date of Birth</th>
            <td><?php  echo $row['od_dob'];?></td>
          </tr>
          <tr>
            <th>Age</th>
            <td><?php  echo $row['od_age'];?></td>
          </tr>
          <tr>
            <th>Gender</th>
            <td><?php  echo $row['od_gender'];?></td>
          </tr>
          <tr>
            <th>Race</th>
            <td><?php  echo $row['od_race'];?></td>
          </tr>
          <tr>
             <th>Address</th>
             <td><?php  echo $row['od_address'];?></td>
           </tr>
           <tr>
             <th>City</th>
             <td><?php  echo $row['od_city'];?></td>
           </tr>
            <tr>
             <th>State</th>
             <td><?php  echo $row['od_state'];?></td>
           </tr>
            <tr>
             <th>Postcode</th>
             <td><?php  echo $row['od_postcode'];?></td>
           </tr>
           <tr>
             <th>Contact No.</th>
             <td><?php  echo $row['od_contact'];?></td>
           </tr>
            <tr>
             <th>Email</th>
             <td><?php  echo $row['od_email'];?></td>
           </tr>
         <tr>
           <th>Name of Next Kin</th>
           <td><?php  echo $row['od_nameofkin'];?></td>
         </tr>
         <tr>
            <th>Next of Kin MyKad No.</th>
            <td><?php  echo $row['od_nameofkinmykad'];?></td>
          </tr>
          <tr>
           <th>Relationship</th>
           <td><?php  echo $row['od_relationship'];?></td>
         </tr>
         <tr>
         <th>Donated Organ(s)</th>
         <td><?php  echo $row['od_organ'];?></td>
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
