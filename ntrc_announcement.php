<?php
ob_start();
require("config.php");
include("ntrc_auth.php");
if (isset($_REQUEST['submit'])) {
	$ntrc_subject    = stripslashes($_REQUEST['ntrc_subject']);
  $ntrc_subject    = mysqli_real_escape_string($con,$ntrc_subject);
  $ntrc_message    = stripslashes($_REQUEST['ntrc_message']);
  $ntrc_message    = mysqli_real_escape_string($con,$ntrc_message);
  $ntrc_postdate   = date("Y-m-d H:i:s");

		$query=mysqli_query($con,"insert into ntrc_announcement (ntrc_subject, ntrc_message, ntrc_postdate)
			VALUES ('$ntrc_subject', '$ntrc_message', '$ntrc_postdate')");
		if ($query) {
		echo "<script>window.open('ntrc_announcement.php','_self')</script>";
	} else {
		echo "<script>alert('Something Went Wrong, Please Try Again Later.')</script>";
	}
}
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
				<h2> Announcements </h2>
			<main>
				<div class="wrapper">
					<form action="" method="POST" class="form">
						<div class="row">
							<div class="input-group">
								<label for="name">Title</label>
								<input type="text" name="ntrc_subject" id="name">
							</div>
						</div>
						<div class="input-group textarea">
							<label for="comment">Details</label>
							<textarea id="ntrc_message" name="ntrc_message"></textarea>
						</div>
						<div class="input-group">
							<button name="submit" class="btn">POST ANNOUNCEMENT</button>
						</div>
					</form>
								</div>
					<div class="prev-comments">
						<?php
						$query = "select * from ntrc_announcement order by ntrc_announceid desc";
						$result = mysqli_query($con, $query);
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
						?>
						<div class="single-item">
              <h4><?php echo $row['ntrc_subject']; ?><a href="ntrc_deleteannouncement.php?ntrc_announceid=<?php echo $row["ntrc_announceid"]; ?>"><img src="images/close.png"/></a></h4>
              <p><?php echo $row['ntrc_message']; ?></p>
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
