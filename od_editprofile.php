<?php
ob_start();
require("config.php");
include("organ_auth.php");
$query=mysqli_query($con,"select * from organ_donors where od_mykad ='" . $_SESSION['od_mykad'] . "'")
or die (mysqli_error($con));
$row=mysqli_fetch_array($query);
?>

<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Edit Profile</title>
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

  <h2> Edit My Profile </h2>
<main>
  <?php
  if(isset($_POST['update']) && $_POST['update']=='update') {
        $od_mykad           = $_REQUEST['od_mykad'];
        $od_name            = stripslashes($_REQUEST['od_name']);
        $od_name            = mysqli_real_escape_string($con,$od_name);
        $od_age             = stripslashes($_REQUEST['od_age']);
        $od_age             = mysqli_real_escape_string($con,$od_age);
        $od_address         = stripslashes($_REQUEST['od_address']);
        $od_address         = mysqli_real_escape_string($con,$od_address);
        $od_city            = stripslashes($_REQUEST['od_city']);
        $od_city            = mysqli_real_escape_string($con,$od_city);
        $od_state           = stripslashes($_REQUEST['od_state']);
        $od_state           = mysqli_real_escape_string($con,$od_state);
        $od_postcode        = stripslashes($_REQUEST['od_postcode']);
        $od_postcode        = mysqli_real_escape_string($con,$od_postcode);
        $od_contact         = stripslashes($_REQUEST['od_contact']);
        $od_contact         = mysqli_real_escape_string($con,$od_contact);
        $od_email           = stripslashes($_REQUEST['od_email']);
        $od_email           = mysqli_real_escape_string($con,$od_email);
        $od_nameofkin       = stripslashes($_REQUEST['od_nameofkin']);
        $od_nameofkin       = mysqli_real_escape_string($con,$od_nameofkin);
        $od_nameofkinmykad  = stripslashes($_REQUEST['od_nameofkinmykad']);
        $od_nameofkinmykad  = mysqli_real_escape_string($con,$od_nameofkinmykad);
        $od_relationship    = stripslashes($_REQUEST['od_relationship']);
        $od_relationship    = mysqli_real_escape_string($con,$od_relationship);
        $od_organ           = stripslashes($_REQUEST['od_organ']);
        $od_organ           = mysqli_real_escape_string($con,$od_organ);
        $od_regdate         = date("Y-m-d H:i:s");

    $update=mysqli_query($con,"update organ_donors set
    od_name='".$od_name."',
    od_age='".$od_age."',
    od_address='".$od_address."',
    od_city='".$od_city."',
    od_state='".$od_state."',
    od_postcode='".$od_postcode."',
    od_contact='".$od_contact."',
    od_email='".$od_email."',
    od_nameofkin='".$od_nameofkin."',
    od_nameofkinmykad='".$od_nameofkinmykad."',
    od_relationship='".$od_relationship."',
    od_regdate='".$od_regdate."'
    where od_mykad='" .$od_mykad. "'")
    or die(mysqli_error($con));

    if($update)
    {
      echo "<script>window.alert('Profile Updated Successfully!');window.location.href='od_myprofile.php'</script>";
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
    <a href="od_myprofile.php"><img class="icon" src="images/profileorgan.png"/></a>
  </div>
  <br>
    <table align="center" class="myprofile">
      <tr>
      <th>Donor MyKad No.</th>
      <td><input type="text" name="od_mykad" value="<?php  echo $row['od_mykad'];?>" readonly/></td>
      </tr>
      <tr>
        <th>Full Name</th>
        <td><input type="text" name="od_name" value="<?php  echo $row['od_name'];?>"/></td>
      </tr>
      <tr>
        <th>Date of Birth</th>
      <td><input type="text" name="od_dob" value="<?php  echo $row['od_dob'];?>" readonly/></td>
      </tr>
      <tr>
        <th>Age</th>
      <td><input type="text" name="od_age" value="<?php  echo $row['od_age'];?>"/></td>
      </tr>
      <tr>
        <th>Gender</th>
      <td><input type="text" name="od_gender" value="<?php  echo $row['od_gender'];?>" readonly/></td>
      </tr>
      <tr>
        <th>Race</th>
      <td><input type="text" name="od_race" value="<?php  echo $row['od_race'];?>" readonly/></td>
      </tr>
      <tr>
         <th>Address</th>
      <td><input type="text" name="od_address" value="<?php  echo $row['od_address'];?>"/></td>
       </tr>
       <tr>
         <th>City</th>
      <td><input type="text" name="od_city" value="<?php  echo $row['od_city'];?>"/></td>
       </tr>
        <tr>
         <th>State</th>
         <td>
         <select name='od_state' id='od_state' required>
            <option value='﻿'>﻿Select State</option>
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
      <td><input type="text" name="od_postcode" value="<?php  echo $row['od_postcode'];?>"/></td>
       </tr>
       <tr>
         <th>Contact No.</th>
      <td><input type="text" name="od_contact" value="<?php  echo $row['od_contact'];?>"/></td>
       </tr>
        <tr>
         <th>Email</th>
      <td><input type="text" name="od_email" value="<?php  echo $row['od_email'];?>"/></td>
       </tr>
     <tr>
       <th>Name of Next Kin</th>
      <td><input type="text" name="od_nameofkin" value="<?php  echo $row['od_nameofkin'];?>"/></td>
     </tr>
     <tr>
      <th>Next of Kin MyKad No.</th>
     <td><input type="text" name="od_nameofkinmykad" value="<?php  echo $row['od_nameofkinmykad'];?>"/></td>
    </tr>
     <tr>
     <th>Relationship</th>
     <td>
       <select name='od_relationship' id='od_relationship' required>
          <option value='﻿'>﻿Select Relationship</option>
          <option value='Spouse'>Spouse</option>
          <option value='Mother'>Mother</option>
          <option value='Father'>Father</option>
          <option value='Daughter'>Daughter</option>
          <option value='Son'>Son</option>
          <option value='Sister'>Siter</option>
          <option value='Brother'>Brother</option>
          <option value='Aunt'>Aunt</option>
          <option value='Uncle'>Uncle</option>
          <option value='Female Cousin'>Female Cousin</option>
          <option value='Male Cousin'>Male Cousin</option>
          <option value='Grandmother'>Grandmother</option>
          <option value='Grandfather'>Grandfather</option>
          <option value='Granddaughter'>Granddaughter</option>
          <option value='Grandson'>Grandson</option>
          <option value='Stepmother'>Stepmother</option>
          <option value='Stepfather'>Stepfather</option>
          <option value='Stepsister'>Stepsister</option>
          <option value='Stepbrother'>Stepbrother</option>
          <option value='Niece'>Niece</option>
          <option value='Nephew'>Nephew</option>
       </select>
     </td>
     </tr>
     <tr>
     <th>Donated Organ(s)</th>
      <td><input type="text" name="od_organ" value="<?php  echo $row['od_organ'];?>"/></td>
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
