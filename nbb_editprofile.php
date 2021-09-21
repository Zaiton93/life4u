<?php
ob_start();
require("config.php");
include("nbb_auth.php");
$query=mysqli_query($con,"select * from nbb_admin where nbb_id ='" . $_SESSION['nbb_id'] . "'")
or die (mysqli_error($con));
$row=mysqli_fetch_array($query);
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Edit Profile</title>
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
        <h2>Edit My Profile</h2>
      <main>
        <?php
          if(isset($_POST['update']) && $_POST['update']=='update') {
            $nbb_id       = $_REQUEST['nbb_id'];
            $nbb_name     = stripslashes($_REQUEST['nbb_name']);
            $nbb_name     = mysqli_real_escape_string($con,$nbb_name);
            $nbb_contact  = stripslashes($_REQUEST['nbb_contact']);
            $nbb_contact  = mysqli_real_escape_string($con,$nbb_contact);
            $nbb_email    = stripslashes($_REQUEST['nbb_email']);
            $nbb_email    = mysqli_real_escape_string($con,$nbb_email);
            $nbb_address  = stripslashes($_REQUEST['nbb_address']);
            $nbb_address  = mysqli_real_escape_string($con,$nbb_address);
            $nbb_regdate  = date("Y-m-d H:i:s");

            $update=mysqli_query($con,"update nbb_admin set
            nbb_name='".$nbb_name."',
            nbb_contact='".$nbb_contact."',
            nbb_email='".$nbb_email."',
            nbb_address='".$nbb_address."'
            where nbb_id='" .$nbb_id. "'")
            or die(mysqli_error($con));

            if($update)
            {
              echo "<script>window.alert('Profile Updated Successfully!');window.location.href='nbb_myprofile.php'</script>";
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
          <a href="nbb_myprofile.php"><img class="icon" src="images/profileblood.png"/></a>
        </div>
        <br>
        <table align="center" class="myprofile">
          <tr>
          <th>Staff ID</th>
          <td><input type="text" name="nbb_id" value="<?php  echo $row['nbb_id'];?>" readonly/></td>
        </tr>
          <tr>
            <th>Name</th>
          <td><input type="text" name="nbb_name" value="<?php  echo $row['nbb_name'];?>"/></td>
          </tr>
           <tr>
             <th>Contact No.</th>
             <td><input type="text" name="nbb_contact" value="<?php  echo $row['nbb_contact'];?>"/></td>
           </tr>
            <tr>
             <th>Email</th>
             <td><input type="text" name="nbb_email" value="<?php  echo $row['nbb_email'];?>"/></td>
           </tr>
           <tr>
              <th>Address</th>
           <td><input type="text" name="nbb_address" value="<?php  echo $row['nbb_address'];?>"/></td>
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
  <script src="js/sidebar.js"></script>
  </body>
  </html>
