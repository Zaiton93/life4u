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
      <h2> Donor Profile </h2>
      <main>
          <div class="content">
            <div id="icon">
              <a href="ntrc_donorlist.php"><img class="icon" src="images/backorgan.png"/></a>
          </div>
          <br>
            <table align="center" class="viewdonor">
            <?php
            $od_mykad    = $_REQUEST['od_mykad'];
            $query=mysqli_query($con,"select * from organ_donors where od_mykad='" .$od_mykad. "'")
            or die (mysqli_error($con));
            while ($row=mysqli_fetch_array($query)) {
            ?>
              <tr>
              <th>Full Name</th>
              <td colspan="5"><?php echo $row['od_name'];?></td>
            </tr>
              <tr>
                <th>Donor MyKad No.</th>
                <td><?php echo $row['od_mykad'];?></td>
                <th>Date of Birth</th>
                <td><?php echo $row['od_dob'];?></td>
              </tr>
              <tr>
                <th>Age</th>
                <td><?php echo $row['od_age'];?></td>
                <th>Gender</th>
                <td><?php echo $row['od_gender'];?></td>
                <th>Race</th>
                <td><?php echo $row['od_race'];?></td>
              </tr>
              <tr>
                 <th>Address</th>
                 <td colspan="5"><?php echo $row['od_address'];?></td>
               </tr>
                <tr>
                 <th>City</th>
                 <td><?php echo $row['od_city'];?></td>
                 <th>State</th>
                 <td><?php echo $row['od_state'];?></td>
                 <th>Postcode</th>
                 <td><?php echo $row['od_postcode'];?></td>
               </tr>
               <tr>
                 <th>Contact No.</th>
                 <td><?php echo $row['od_contact'];?></td>
                 <th>Email</th>
                 <td colspan="3"><?php echo $row['od_email'];?></td>
               </tr>
                <tr>
                  <th>Name of Next Kin</th>
                  <td colspan="3"><?php echo $row['od_nameofkin'];?></td>
                  <th>Next of Kin MyKad No.</th>
                  <td><?php echo $row['od_nameofkinmykad'];?></td>

               </tr>
               <tr>
                 <th>Relationship</th>
                 <td><?php echo $row['od_relationship'];?></td>
                 <th>Organs Pledged</th>
                 <td><?php echo $row['od_organ'];?></td>
                 <th>Date of Registration</th>
                 <td><?php echo $row['od_regdate'];?></td>
              </tr>
              <tr>
                <th colspan="6" style="text-align: center;">MyKad Document</th>
              </tr>
              <tr>
                <td colspan="6"  style="text-align: center;">
                   <img class="uploadedimage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['od_document']); ?> " />
                </td>
              </tr>
              <tr>
                <th colspan="6"  style="text-align: center;">Proof of Identification</th>
              </tr>
              <tr>
                <td colspan="6"  style="text-align: center;">
                    <img class="uploadedimage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['od_selfie']); ?>" />
                </td>
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
      <script src="js/sidebar.js"></script>
      </body>
      </html>
