<?php
ob_start();
require("config.php");
include("nbb_auth.php");
if (isset($_REQUEST['addrecord'])) {
	$bdh_mykad        = stripslashes($_REQUEST['bdh_mykad']);
  $bdh_mykad        = mysqli_real_escape_string($con,$bdh_mykad);
  $bdh_donatedate   = stripslashes(date('Y-m-d',strtotime($_REQUEST['bdh_donatedate'])));
  $bdh_donatedate   = mysqli_real_escape_string($con,$bdh_donatedate);
  $bdh_serialno     = stripslashes($_REQUEST['bdh_serialno']);
  $bdh_serialno     = mysqli_real_escape_string($con,$bdh_serialno);
  $bdh_amount       = stripslashes($_REQUEST['bdh_amount']);
  $bdh_amount       = mysqli_real_escape_string($con,$bdh_amount);
  $bdh_location     = stripslashes($_REQUEST['bdh_location']);
  $bdh_location     = mysqli_real_escape_string($con,$bdh_location);
  $bdh_staffname    = stripslashes($_REQUEST['bdh_staffname']);
  $bdh_staffname    = mysqli_real_escape_string($con,$bdh_staffname);
  $bdh_remarks      = stripslashes($_REQUEST['bdh_remarks']);
  $bdh_remarks      = mysqli_real_escape_string($con,$bdh_remarks);
  $bdh_regdate      = date("Y-m-d H:i:s");
	$bdh_updatedstaff = $_SESSION['nbb_id'];
		$query=mysqli_query($con,"insert into blood_donation_history
    (bdh_mykad, bdh_donatedate, bdh_serialno, bdh_amount, bdh_location, bdh_staffname, bdh_remarks, bdh_regdate, bdh_updatedstaff)
		values
    ('$bdh_mykad', '$bdh_donatedate', '$bdh_serialno', '$bdh_amount', '$bdh_location', '$bdh_staffname', '$bdh_remarks', '$bdh_regdate', '$bdh_updatedstaff')")
    or die (mysqli_error($con));
    if ($query) {
		echo "<script>alert('Donation Record Added Successfully!'); window.open('nbb_addhistory.php','_self')</script>";
	} else {
		echo "<script>alert('Something Went Wrong, Please Try Again Later.')</script>";
	}
}
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Add Donation History</title>
  <link rel="stylesheet" href="css/main_nbb.css">
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
          <a href="nbb_events.php">Events</a>
          <a href="nbb_manageadmin.php">Manage Admins</a>
          <a href="nbb_myprofile.php">My Profile</a>
          <a href="nbb_changepsswd.php">Change Password</a>
          <a href="nbb_logout.php">Logout</a>
				</div>

					<div class="line"></div>
        <h2>Add Blood Donation Record</h2>
      <main>
          <div class="content">

            <div class="form-page">
                <form class="addhistory" action="" method='post'>
                  <label>Donor Mykad No.</label>
                  <input type='text' name='bdh_mykad' id='bdh_mykad' value=""/>
                  <br>
                  <label>Date of Donation</label>
                  <input type='date' name='bdh_donatedate' id='bdh_donatedate' value=""/>
                  <br>
                  <label>Serial No.</label>
                  <input type='text' name='bdh_serialno' id='bdh_serialno' value=""/>
                  <br>
                  <label>Amount Donated (ml)</label>
                  <input type='text' name='bdh_amount' id='bdh_amount'/>
                  <br>
                  <label>Donated Location</label>
                  <select name="bdh_location" id="bdh_location"/>
                  <option value="">﻿Select Location</option>
                  <option value="Hospital Bintulu, Bintulu﻿">Hospital Bintulu, Bintulu</option>
                  <option value="﻿Hospital Duchess Of Kent, Sandakan">Hospital Duchess Of Kent, Sandakan</option>
                  <option value="Hospital Labuan, Labuan ﻿">Hospital Labuan, Labuan</option>
                  <option value="﻿Hospital Melaka, Melaka">Hospital Melaka, Melaka</option>
                  <option value="﻿Hospital Miri, Miri">Hospital Miri, Miri</option>
                  <option value="Hospital Pulau Pinang, Georgetown﻿">Hospital Pulau Pinang, Georgetown</option>
                  <option value="Hospital Queen Elizabeth, Kota Kinabalu﻿">Hospital Queen Elizabeth, Kota Kinabalu</option>
                  <option value="﻿Hospital Queen Elizabeth II, Kota Kinabalu">Hospital Queen Elizabeth II, Kota Kinabalu</option>
                  <option value="﻿Hospital Raja Perempuan Zainab II, Kota Bharu">Hospital Raja Perempuan Zainab II, Kota Bharu</option>
                  <option value="﻿Hospital Raja Permaisuri Bainun, Ipoh">Hospital Raja Permaisuri Bainun, Ipoh</option>
                  <option value="﻿Hospital Seberang Jaya, Seberang Jaya">Hospital Seberang Jaya, Seberang Jaya</option>
                  <option value="﻿Hospital Seri Manjung, Seri Manjung">Hospital Seri Manjung, Seri Manjung</option>
                  <option value="﻿Hospital Sibu, Sibu">Hospital Sibu, Sibu</option>
                  <option value="﻿Hospital Sultanah Aminah, Johor Bahru">Hospital Sultanah Aminah, Johor Bahru</option>
                  <option value="Hospital Sultanah Bahiyah, Alor Setar﻿">Hospital Sultanah Bahiyah, Alor Setar</option>
                  <option value="﻿Hospital Sultanah Nora Ismail, Batu Pahat">Hospital Sultanah Nora Ismail, Batu Pahat</option>
                  <option value="Hospital Sultanah Nur Zahirah, Kuala Terengganu">Hospital Sultanah Nur Zahirah, Kuala Terengganu</option>
                  <option value="Hospital Sultan Haji Ahmad Shah, Temerloh">Hospital Sultan Haji Ahmad Shah, Temerloh</option>
                  <option value="Hospital Taiping, Taiping">Hospital Taiping, Taiping</option>
                  <option value="Hospital Tawau, Tawau">Hospital Tawau, Tawau</option>
                  <option value="Hospital Tengku Ampuan Afzan, Kuantan">Hospital Tengku Ampuan Afzan, Kuantan</option>
                  <option value="Hospital Tengku Ampuan Rahimah, Klang">Hospital Tengku Ampuan Rahimah, Klang</option>
                  <option value="﻿Hospital Tuanku Ja'afar, Seremban">Hospital Tuanku Ja'Afar, Seremban</option>
                  <option value="Hospital Umum Sarawak, Kuching﻿">Hospital Umum Sarawak, Kuching</option>
                  <option value="﻿Pusat Darah Negara, Kuala Lumpur">Pusat Darah Negara, Kuala Lumpur</option>
                  </select>
                  <br>
                  <label>Recorded By</label>
                  <input type='text' name='bdh_staffname' id='bdh_staffname'/>
                  <br>
                  <label>Remarks</label>
                  <input type='text' name='bdh_remarks' id='bdh_remarks'/>
                  <br>
                  <button type='submit' name="addrecord" value="addrecord">ADD RECORD</button>

                </form>
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
      <script src="js/sidebar.js"></script>
      </body>
      </html>
