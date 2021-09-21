<?php
require("config.php");
include("blood_auth.php");
$query=mysqli_query($con,"select * from blood_donors where bd_mykad ='" . $_SESSION['bd_mykad'] . "'")
or die (mysqli_error($con));
$row=mysqli_fetch_array($query);
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Edit Profile</title>
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

  <h2> Edit My Profile </h2>
  <main>
    <?php
      if(isset($_POST['update']) && $_POST['update']=='update') {
        $bd_mykad    = $_REQUEST['bd_mykad'];
        $bd_name     = stripslashes($_REQUEST['bd_name']);
        $bd_name     = mysqli_real_escape_string($con,$bd_name);
        $bd_age      = stripslashes($_REQUEST['bd_age']);
        $bd_age      = mysqli_real_escape_string($con,$bd_age);
        $bd_marital  = stripslashes($_REQUEST['bd_marital']);
        $bd_marital  = mysqli_real_escape_string($con,$bd_marital);
        $bd_job      = stripslashes($_REQUEST['bd_job']);
        $bd_job      = mysqli_real_escape_string($con,$bd_job);
        $bd_address  = stripslashes($_REQUEST['bd_address']);
        $bd_address  = mysqli_real_escape_string($con,$bd_address);
        $bd_city     = stripslashes($_REQUEST['bd_city']);
        $bd_city     = mysqli_real_escape_string($con,$bd_city);
        $bd_state    = stripslashes($_REQUEST['bd_state']);
        $bd_state    = mysqli_real_escape_string($con,$bd_state);
        $bd_postcode = stripslashes($_REQUEST['bd_postcode']);
        $bd_postcode = mysqli_real_escape_string($con,$bd_postcode);
        $bd_group    = stripslashes($_REQUEST['bd_group']);
        $bd_group    = mysqli_real_escape_string($con,$bd_group);
        $bd_contact  = stripslashes($_REQUEST['bd_contact']);
        $bd_contact  = mysqli_real_escape_string($con,$bd_contact);
        $bd_email    = stripslashes($_REQUEST['bd_email']);
        $bd_email    = mysqli_real_escape_string($con,$bd_email);
        $bd_regdate  = date("Y-m-d H:i:s");

        $update=mysqli_query($con,"update blood_donors set
        bd_name='".$bd_name."',
        bd_age='".$bd_age."',
        bd_marital='".$bd_marital."',
        bd_job='".$bd_job."',
        bd_address='".$bd_address."',
        bd_city='".$bd_city."',
        bd_state='".$bd_state."',
        bd_postcode='".$bd_postcode."',
        bd_group='".$bd_group."',
        bd_contact='".$bd_contact."',
        bd_email='".$bd_email."'
        where bd_mykad='" .$bd_mykad. "'")
        or die(mysqli_error($con));

        if($update)
        {
          echo "<script>window.alert('Profile Updated Successfully!');window.location.href='bd_myprofile.php'</script>";
        }
        else
        {
          echo "<script>alert('Profile Updating Unsuccessful, please try again later.');</script>";
        }
      }
    ?>

      <form action="" method="post">
      <div class="content">
        <div id="icon">
          <a href="bd_myprofile.php"><img class="icon" src="images/profileblood.png"/></a>
      </div>
      <br>
      <table align="center" class="myprofile">
        <tr>
        <th>Donor MyKad No.</th>
        <td><input type="text" name="bd_mykad" value="<?php  echo $row['bd_mykad'];?>" readonly/></td>
      </tr>
        <tr>
          <th>Full Name</th>
        <td><input type="text" name="bd_name" value="<?php  echo $row['bd_name'];?>"/></td>
        </tr>
        <tr>
          <th>Date of Birth</th>
        <td><input type="text" name="bd_dob" value="<?php  echo $row['bd_dob'];?>" readonly/></td>
        </tr>
        <tr>
          <th>Age</th>
      <td><input type="text" name="bd_age" value="<?php  echo $row['bd_age'];?>"/></td>
        </tr>
        <tr>
          <th>Gender</th>
        <td><input type="text" name="bd_gender" value="<?php  echo $row['bd_gender'];?>" readonly/></td>
        </tr>
        <tr>
          <th>Race</th>
        <td><input type="text" name="bd_race" value="<?php  echo $row['bd_race'];?>" readonly/></td>
        </tr>
        <tr>
          <th>Marital Status</th>
          <td><select name='bd_marital' id='bd_marital'/>
         <option value=<?php  echo $row['bd_marital'];?>>﻿<?php  echo $row['bd_marital'];?></option>
         <option value='Single'>Single</option>
         <option value='Married'>Married</option>
         <option value='Divorced/Widowed'>Divorced/Widowed</option>
      </select>
    </td>
        </tr>
        <tr>
          <th>Occupation</th>
          <td><select name='bd_job' id='bd_job'/>
         <option value=<?php  echo $row['bd_job'];?>>﻿<?php  echo $row['bd_job'];?></option>
         <option value='Public Sector'>Public Sector</option>
         <option value='Private Sector'>Private Sector</option>
         <option value='Own Business'>Own Business</option>
         <option value='Freelancing'>Freelancing</option>
         <option value='Unemployed'>Unemployed</option>
         <option value='Student'>Student</option>
         <option value='Others'>Others</option>
      </select>
    </td>
        </tr>
        <tr>
           <th>Address</th>
        <td><input type="text" name="bd_address" value="<?php  echo $row['bd_address'];?>"/></td>
         </tr>
         <tr>
           <th>City</th>
        <td><input type="text" name="bd_city" value="<?php  echo $row['bd_city'];?>"/></td>
         </tr>
          <tr>
           <th>State</th>
           <td> <select name='bd_state' id='bd_state'/>
         <option value=<?php  echo $row['bd_state'];?>>﻿﻿<?php  echo $row['bd_state'];?></option>
         <option value='Federal Territory of Kuala Lumpur'>Federal Territory of Kuala Lumpur</option>
         <option value='Federal Territory of Labuan'>Federal Territory of Labuan</option>
         <option value='Federal Territory of Putrajaya'>Federal Territory of Putrajaya</option>
         <option value='Johor'>Johor</option>
         <option value='Kedah'>Kedah</option>
         <option value='Kelantan'>Kelantan</option>
         <option value='Malacca'>Malacca</option>
         <option value='Negeri Sembilan'>Negeri Sembilan</option>
         <option value='Pahang'>Pahang</option>
         <option value='Perak'>Perak</option>
         <option value='Perlis'>Perlis</option>
         <option value='Penang'>Penang</option>
         <option value='Sabah'>Sabah</option>
         <option value='Sarawak'>Sarawak</option>
         <option value='Selangor'>Selangor</option>
         <option value='Terengganu'>Terengganu</option>
      </select>
    </td>
         </tr>
          <tr>
           <th>Postcode</th>
      <td><input type="text" name="bd_postcode" value="<?php  echo $row['bd_postcode'];?>"/></td>
         </tr>
         <tr>
           <th>Blood Group</th>
           <td><select name='bd_group' id='bd_group'/>
         <option value=<?php  echo $row['bd_group'];?>>﻿﻿<?php  echo $row['bd_group'];?></option>
         <option value='A+'>A+</option>
         <option value='A-'>A-</option>
         <option value='A Unknown'>A Unknown</option>
         <option value='B+'>B+</option>
         <option value='B-'>B-</option>
         <option value='B Unknown'>B Unknown</option>
         <option value='AB+'>AB+</option>
         <option value='AB-'>AB-</option>
         <option value='AB Unknown'>AB Unknown</option>
         <option value='O+'>O+</option>
         <option value='O-'>O-</option>
         <option value='O Unknown'>O Unknown</option>
         <option value='Unknown'>Unknown</option>
      </select></td>
         </tr>
         <tr>
           <th>Contact No.</th>
      <td><input type="text" name="bd_contact" value="<?php  echo $row['bd_contact'];?>"/></td>
         </tr>
          <tr>
           <th>Email</th>
      <td><input type="text" name="bd_email" value="<?php  echo $row['bd_email'];?>"/></td>
         </tr>
         <tr>
          <th>Date of Registration</th>
          <td><input type="text" name="bd_regdate" value="<?php  echo $row['bd_regdate'];?>" readonly/></td>
        </tr>
         <tr>
          <td colspan="2"><button type="submit" name="update" value="update">UPDATE PROFILE</button></td>
       </tr>
    </table>
    </form>
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
