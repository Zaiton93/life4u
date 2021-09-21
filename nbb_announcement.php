<?php
ob_start();
require("config.php");
include("nbb_auth.php");
if (isset($_REQUEST['submit'])) {
	$nbb_subject    = stripslashes($_REQUEST['nbb_subject']);
  $nbb_subject    = mysqli_real_escape_string($con,$nbb_subject);
  $nbb_message    = stripslashes($_REQUEST['nbb_message']);
  $nbb_message    = mysqli_real_escape_string($con,$nbb_message);
  $nbb_postdate   = date("Y-m-d H:i:s");

		$query=mysqli_query($con,"insert into nbb_announcement (nbb_subject, nbb_message, nbb_postdate)
			VALUES ('$nbb_subject', '$nbb_message', '$nbb_postdate')");
		if ($query) {
		echo "<script>window.open('nbb_announcement.php','_self')</script>";
	} else {
		echo "<script>alert('Something Went Wrong, Please Try Again Later.')</script>";
	}
}
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Post Announcements</title>
  <link rel="stylesheet" href="css/main_nbb.css">
  <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
  </head>
<body>

    <center><img class="header" src="images/headerblood.png"></center>
	  <button id="openbtn" onclick="openNav()">☰</button>
	 				<div id="mySidebar" class="sidebar">
	   			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
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
        <h2>Post Announcements</h2>
      <main>
        <div class="wrapper">
          <form action="" method="post" class="form">
            <div class="row">
              <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="nbb_subject" id="name">
              </div>
            </div>
            <div class="input-group textarea">
              <label for="details">Details</label>
              <textarea id="nbb_message" name="nbb_message"></textarea>
            </div>
            <div class="input-group">
              <button name="submit" class="btn">POST ANNOUNCEMENT</button>
            </div>
          </form>
                </div>
          <div class="prev-comments">
            <?php
            $query = "select * from nbb_announcement order by nbb_announceid desc";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="single-item">
              <h4><?php echo $row['nbb_subject']; ?><a href="nbb_deleteannouncement.php?nbb_announceid=<?php echo $row["nbb_announceid"]; ?>"><img src="images/close.png"/></a></h4>
              <p><?php echo $row['nbb_message']; ?></p>
            </div>
            <?php
              }
            }
            ?>
          </div>
      </main>
<br>
<br>
<br>
<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
      <script src="js/sidebar.js"></script>
</body>
</html>
