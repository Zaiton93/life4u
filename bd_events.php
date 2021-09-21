<?php
require("config.php");
include("blood_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Upcoming Events</title>
  <link rel="stylesheet" href="css/main_blood.css">
  <script src="js/donorcalendar.js"></script>
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

  <h2> Upcoming Events </h2>
<main>
    <div class="content">

      <!-- (B) PERIOD SELECTOR -->
      <div id="calPeriod"><?php
        // (B1) MONTH SELECTOR
        // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
        $months = [
          1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
          5 => "May", 6 => "June", 7 => "July", 8 => "August",
          9 => "September", 10 => "October", 11 => "November", 12 => "December"
        ];
        $monthNow = date("m");
        echo "<select id='calmonth'>";
        foreach ($months as $m=>$mth) {
          printf("<option value='%s'%s>%s</option>",
            $m, $m==$monthNow?" selected":"", $mth
          );
        }
        echo "</select>";

        // (B2) YEAR SELECTOR
        echo "<input type='number' id='calyear' value='".date("Y")."'/>";
      ?></div>

      <!-- (C) CALENDAR WRAPPER -->
      <div id="calwrap"></div>

      <!-- (D) EVENT FORM -->
      <div id="calblock"><form id="calform">
        <input type="hidden" id="evtid"/>
        <label for="start">Date Start</label>
        <input type="date" id="evtstart" required/>
        <label for="end">Date End</label>
        <input type="date" id="evtend" required/>
        <label for="txt">Event</label>
        <textarea id="evttxt" required></textarea>
        <label for="color">Color</label>
        <input type="color" id="evtcolor" list="color" value="#ffffff" required/>
        <datalist id="color">
               <option>#ffd9d9</option>
               <option>#D0E9D9</option>
             </datalist>
        <input type="submit" id="calformsave" value="Save"/>
        <input type="button" id="calformdel" value="Delete"/>
        <input type="button" id="calformcx" value="Cancel"/>
      </form></div>
    </div>
</main>
<br>
<br>
<br>
<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
</body>
</html>
