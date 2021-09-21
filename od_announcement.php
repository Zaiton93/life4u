<?php
require("config.php");
include("organ_auth.php");
if (isset($_REQUEST['submit'])) {
	$ntrc_subject    = stripslashes($_REQUEST['ntrc_subject']);
  $ntrc_subject    = mysqli_real_escape_string($con,$ntrc_subject);
  $ntrc_message    = stripslashes($_REQUEST['ntrc_message']);
  $ntrc_message    = mysqli_real_escape_string($con,$ntrc_message);
  $ntrc_postdate   = date("Y-m-d H:i:s");

		$query=mysqli_query($con,"insert into ntrc_announcement (ntrc_subject, ntrc_message, ntrc_postdate)
			VALUES ('$ntrc_subject', '$ntrc_message', '$ntrc_postdate')");
}
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Current Affairs</title>
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

  <h2> Current Affairs </h2>
<main>
			<div class="content">
  <br>
  <br>
  <div class="prev-comments">
    <?php
    $query = "select * from ntrc_announcement order by ntrc_announceid desc";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="single-item">
      <h4><?php echo $row['ntrc_subject']; ?></h4>
      <p><?php echo $row['ntrc_message']; ?></p>
    </div>
    <?php
      }
    }
    ?>
  </div>
</div>
</main>



<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
</body>
</html>
