<?php
require("config.php");
include("blood_auth.php");

if (isset($_REQUEST['submit'])) {
	$nbb_subject    = stripslashes($_REQUEST['nbb_subject']);
  $nbb_subject    = mysqli_real_escape_string($con,$nbb_subject);
  $nbb_message    = stripslashes($_REQUEST['nbb_message']);
  $nbb_message    = mysqli_real_escape_string($con,$nbb_message);
  $nbb_postdate   = date("Y-m-d H:i:s");

		$query=mysqli_query($con,"insert into nbb_announcement (nbb_subject, nbb_message, nbb_postdate)
			VALUES ('$nbb_subject', '$nbb_message', '$nbb_postdate')");
}
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Life4U : Current Affairs</title>
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

  <h2> Current Affairs </h2>
  <main>
		<div class="content">
    <br>
    <br>
      <div class="prev-comments">
        <?php
        $query = "select * from nbb_announcement order by nbb_announceid desc";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="single-item">
          <h4><?php echo $row['nbb_subject']; ?></h4>
          <p><?php echo $row['nbb_message']; ?></p>
        </div>
        <?php
          }
        }
        ?>
      </div>
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
