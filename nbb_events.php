<?php
ob_start();
require("config.php");
include("nbb_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Manage Events</title>
  <link rel="stylesheet" href="css/main_nbb.css">
	  <link rel="stylesheet" href="css/sidebar.css">
          <script src="js/staffcalendar.js"></script>
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
        <h2>Upcoming Events</h2>
      <main>
        <div class="content">
          <div id="calPeriod"><?php
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
            <input type="color" id="evtcolor" list="color" value="#FFD9D9" required/>
            <datalist id="color">
                   <option>#FFD9D9</option>
                 </datalist>
            <input type="submit" id="calformsave" value="SAVE"/>
            <input type="button" id="calformdel" value="DELETE"/>
            <input type="button" id="calformcx" value="CANCEL"/>
          </form></div>
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
