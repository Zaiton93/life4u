<?php
ob_start();
require("config.php");
include("nbb_auth.php");
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Welcome to Life4U: Donor Lists</title>
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
        <h2>Donor Lists</h2>
      <main>
          <div class="content">
            <table align="center" id="donorlist">
          	<tr>
            <th>#</th>
            <th>MyKad No.</th>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Contact No.</th>
            <th>State</th>
            <th colspan="2">Action</th>
            </tr>
            <?php
            $count=1;
            $query="select * from blood_donors;";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $count; ?></td>
               <td><?php echo $row["bd_mykad"]; ?></td>
               <td style="text-align:left;"><?php echo $row["bd_name"]; ?></td>
               <td><?php echo $row["bd_group"]; ?></td>
               <td><?php echo $row["bd_contact"]; ?></td>
               <td><?php echo $row["bd_state"]; ?></td>
               <td align="center"><a href="nbb_viewdonor.php?bd_mykad=<?php echo htmlentities ($row['bd_mykad']); ?>">
                 <img src="images/viewblood.png" height="30" width="30"/></a></td>
                 <td align="center"><a href="nbb_deletedonor.php?bd_mykad=<?php echo htmlentities ($row['bd_mykad']); ?>">
                   <img src="images/deleteblood.png" height="30" width="30"/></a></td>
            </tr>
            <?php $count++; } ?>
            </table>
          </div>
      </main>

      <div class="wrapfooter">
      <footer> Powered by YZ Designs </footer>
      </div>
      <script src="js/sidebar.js"></script>
      <script>
      function searchDonor() {
          var input, filter, found, table, tr, td, i, j;
          input = document.getElementById("searchbar");
          filter = input.value.toUpperCase();
          table = document.getElementById("donorlist");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td");
              for (j = 0; j < td.length; j++) {
                  if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                      found = true;
                  }
              }
              if (found) {
                  tr[i].style.display = "";
                  found = false;
              } else {
                  tr[i].style.display = "none";
              }
          }
      }
    </script>
      </body>
      </html>
