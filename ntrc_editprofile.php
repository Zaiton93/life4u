<?php
ob_start();
require("config.php");
include("ntrc_auth.php");
$query=mysqli_query($con,"select * from ntrc_admin where ntrc_id ='" . $_SESSION['ntrc_id'] . "'")
or die (mysqli_error($con));
$row=mysqli_fetch_array($query);
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Edit Profile</title>
  <link rel="stylesheet" href="css/main_ntrc.css">
	  <link rel="stylesheet" href="css/sidebar.css">
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
        <h2>Edit My Profile</h2>
      <main>
        <?php
          if(isset($_POST['update']) && $_POST['update']=='update') {
            $ntrc_id       = $_REQUEST['ntrc_id'];
            $ntrc_name     = stripslashes($_REQUEST['ntrc_name']);
            $ntrc_name     = mysqli_real_escape_string($con,$ntrc_name);
            $ntrc_contact  = stripslashes($_REQUEST['ntrc_contact']);
            $ntrc_contact  = mysqli_real_escape_string($con,$ntrc_contact);
            $ntrc_email    = stripslashes($_REQUEST['ntrc_email']);
            $ntrc_email    = mysqli_real_escape_string($con,$ntrc_email);
            $ntrc_address  = stripslashes($_REQUEST['ntrc_address']);
            $ntrc_address  = mysqli_real_escape_string($con,$ntrc_address);
            $ntrc_regdate  = date("Y-m-d H:i:s");

            $update=mysqli_query($con,"update ntrc_admin set
            ntrc_name='".$ntrc_name."',
            ntrc_contact='".$ntrc_contact."',
            ntrc_email='".$ntrc_email."',
            ntrc_address='".$ntrc_address."'
            where ntrc_id='" .$ntrc_id. "'")
            or die(mysqli_error($con));

            if($update)
            {
              echo "<script>window.alert('Profile Updated Successfully!');window.location.href='ntrc_myprofile.php'</script>";
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
          <a href="ntrc_myprofile.php"><img class="icon" src="images/profileorgan.png"/></a>
        </div>
        <br>
        <table align="center" class="myprofile">
          <tr>
          <th>Staff ID</th>
          <td><input type="text" name="ntrc_id" value="<?php  echo $row['ntrc_id'];?>" readonly/></td>
        </tr>
          <tr>
            <th>Name</th>
          <td><input type="text" name="ntrc_name" value="<?php  echo $row['ntrc_name'];?>"/></td>
          </tr>
           <tr>
             <th>Contact No.</th>
             <td><input type="text" name="ntrc_contact" value="<?php  echo $row['ntrc_contact'];?>"/></td>
           </tr>
            <tr>
             <th>Email</th>
             <td><input type="text" name="ntrc_email" value="<?php  echo $row['ntrc_email'];?>"/></td>
           </tr>
           <tr>
              <th>Address</th>
           <td><input type="text" name="ntrc_address" value="<?php  echo $row['ntrc_address'];?>"/></td>
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
