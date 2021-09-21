<?php
require("config.php");
if(isset($_REQUEST['register'])) {
  $bd_mykad    = stripslashes($_REQUEST['bd_mykad']); //escapes special characters in a string
  $bd_mykad    = mysqli_real_escape_string($con,$bd_mykad); //escapes special characters in a string
  $bd_name     = stripslashes($_REQUEST['bd_name']);
  $bd_name     = mysqli_real_escape_string($con,$bd_name);
  $bd_dob      = stripslashes(date('Y-m-d',strtotime($_REQUEST['bd_dob'])));
  $bd_dob      = mysqli_real_escape_string($con,$bd_dob);
  $bd_age      = stripslashes($_REQUEST['bd_age']);
  $bd_age      = mysqli_real_escape_string($con,$bd_age);
  $bd_gender   = stripslashes($_REQUEST['bd_gender']);
  $bd_gender   = mysqli_real_escape_string($con,$bd_gender);
  $bd_race     = stripslashes($_REQUEST['bd_race']);
  $bd_race     = mysqli_real_escape_string($con,$bd_race);
  $bd_marital  = stripslashes($_REQUEST['bd_marital']);
  $bd_marital  = mysqli_real_escape_string($con,$bd_marital);
  $bd_job      = stripslashes($_REQUEST['bd_job']);
  $bd_job      = mysqli_real_escape_string($con,$bd_job);
  $bd_address  = stripslashes($_REQUEST['bd_address']);
  $bd_address  = mysqli_real_escape_string($con,$bd_address);
  $bd_city     = stripslashes($_REQUEST['bd_city']);
  $bd_city     = mysqli_real_escape_string($con,$bd_city);
  $bd_state    = stripslashes($_REQUEST['bd_state']);
  $bd_state    = mysqli_real_escape_string($con,$bd_state);
  $bd_postcode = stripslashes($_REQUEST['bd_postcode']);
  $bd_postcode = mysqli_real_escape_string($con,$bd_postcode);
  $bd_group    = stripslashes($_REQUEST['bd_group']);
  $bd_group    = mysqli_real_escape_string($con,$bd_group);
  $bd_contact  = stripslashes($_REQUEST['bd_contact']);
  $bd_contact  = mysqli_real_escape_string($con,$bd_contact);
  $bd_email    = stripslashes($_REQUEST['bd_email']);
  $bd_email    = mysqli_real_escape_string($con,$bd_email);
  $bd_psswd    = stripslashes($_REQUEST['bd_psswd']);
  $bd_psswd    = mysqli_real_escape_string($con,$bd_psswd);
  $bd_repsswd  = stripslashes($_REQUEST['bd_repsswd']);
  $bd_regdate  = date("Y-m-d H:i:s");

	$query=mysqli_query($con,"insert into blood_donors (bd_mykad,bd_name,bd_dob,bd_age,bd_gender,bd_race,
  bd_marital,bd_job,bd_address,bd_city,bd_state,bd_postcode,bd_group,bd_contact,bd_email,bd_psswd, bd_regdate)
  values
  ('$bd_mykad','$bd_name','$bd_dob','$bd_age','$bd_gender','$bd_race','$bd_marital','$bd_job','$bd_address',
  '$bd_city','$bd_state','$bd_postcode','$bd_group','$bd_contact','$bd_email','".md5($bd_psswd)."','$bd_regdate')")
   or die(mysqli_error($con));

  if($query)
{
echo "<script>alert('Blood Donor Registered Successfully!'); window.open('bd_login.php','_self')</script>";
}
else
{
  echo "<script>alert('Registration Unsuccessful, please try again later.');</script>";
}
}
?>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title >Life4U Blood Donor Registration</title>
  <link rel="stylesheet" href="css/blood.css">
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>

<a href="index.html"><img class="home" src="images/home.png"/></a>
  <center><h1>Life4U Blood Donor Registration Form</h1></center>

<div class="login-page">
  <div class="form" >
    <form class="login-form" action="" method='post'>

      <h2>1. PERSONAL INFORMATION</h2>
      <hr>
      <label>Mykad No.</label>
      <input type='text' name='bd_mykad' id='bd_mykad' pattern="[0-9]+{12}" title="Only numbers are allowed" maxlength="12" required/>
      <br>
      <label>Full Name (as per MyKad)</label>
      <input type='text' name='bd_name' id='bd_name' required/>
      <br>
      <label>Date of Birth</label>
      <input type='date' name='bd_dob' id='bd_dob' min="1956-01-01" max="2003-12-31" required/>
      <br>
      <label>Age</label>
      <input type='number' name='bd_age' id='bd_age' min="18" max="65" maxlength="2"required/>
      <br>
      <label>Gender</label>
      <select name='bd_gender' id='bd_gender'  required/>
         <option value=''>Select Gender</option>
         <option value='M'>Male</option>
         <option value='F'>Female</option>
      </select>
      <br>
      <label>Race</label>
      <select name='bd_race' id='bd_race'  required/>
        <option value=''>Select Race</option>
        <option value='Malay'>Malay</option>
        <option value='Chinese'>Chinese</option>
        <option value='Indian'>Indian</option>
        <option value='Others'>Others</option>
      </select>
      <br>
      <label>Marital Status</label>
      <select name='bd_marital' id='bd_marital'  required/>
         <option value=''>Select Marital Status</option>
         <option value='Single'>Single</option>
         <option value='Married'>Married</option>
         <option value='Divorced/Widowed'>Divorced/Widowed</option>
      </select>
      <br>
      <label>Occupation</label>
      <select name='bd_job' id='bd_job'  required/>
         <option value=''>Select Occupation</option>
         <option value='Public Sector'>Public Sector</option>
         <option value='Private Sector'>Private Sector</option>
         <option value='Own Business'>Own Business</option>
         <option value='Freelancing'>Freelancing</option>
         <option value='Unemployed'>Unemployed</option>
         <option value='Student'>Student</option>
         <option value='Others'>Others</option>
      </select>
      <br>
      <label>Address</label>
      <input type='text' name='bd_address' id='bd_address' required/>
      <br>
      <label>City</label>
      <input type='text' name='bd_city' id='bd_city'  required/>
      <br>
      <label>State</label>
      <select name='bd_state' id='bd_state'  required/>
         <option value='﻿'>﻿Select State</option>
         <option value='Federal Territory of Kuala Lumpur'>Federal Territory of Kuala Lumpur</option>
         <option value='Federal Territory of Labuan'>Federal Territory of Labuan</option>
         <option value='Federal Territory of Putrajaya'>Federal Territory of Putrajaya</option>
         <option value='Johor'>Johor</option>
         <option value='Kedah'>Kedah</option>
         <option value='Kelantan'>Kelantan</option>
         <option value='Malacca'>Malacca</option>
         <option value='Negeri Sembilan'>Negeri Sembilan</option>
         <option value='Pahang'>Pahang</option>
         <option value='Perak'>Perak</option>
         <option value='Perlis'>Perlis</option>
         <option value='Penang'>Penang</option>
         <option value='Sabah'>Sabah</option>
         <option value='Sarawak'>Sarawak</option>
         <option value='Selangor'>Selangor</option>
         <option value='Terengganu'>Terengganu</option>
      </select>
      <br>
      <label>Postcode</label>
      <input type='text' name='bd_postcode' id='bd_postcode' maxlength="5"  required/>
      <br>
      <label>Blood Group</label>
      <select name='bd_group' id='bd_group'  required/>
         <option value='﻿'>﻿Select Blood Group</option>
         <option value='A+'>A+</option>
         <option value='A-'>A-</option>
         <option value='A Unknown'>A Unknown</option>
         <option value='B+'>B+</option>
         <option value='B-'>B-</option>
         <option value='B Unknown'>B Unknown</option>
         <option value='AB+'>AB+</option>
         <option value='AB-'>AB-</option>
         <option value='AB Unknown'>AB Unknown</option>
         <option value='O+'>O+</option>
         <option value='O-'>O-</option>
         <option value='O Unknown'>O Unknown</option>
         <option value='Unknown'>Unknown</option>
      </select>
      <br>
      <label>Contact No.</label>
      <input type='text' name='bd_contact' id='bd_contact' maxlength="11" required/>
      <br>
      <label>Email</label>
      <input type='email' name='bd_email' id='bd_email'  required/>
      <br>
      <label>Password</label>
      <input type='password' name='bd_psswd' id='bd_psswd'  required/>
      <br>
      <label>Retype Password</label>
      <input type='password' name='bd_repsswd' id='bd_repsswd'  required/>
      <br>
      <h2>2. DONOR DECLARATION AND CONSENT</h2>
      <hr>

      <div class="inbox">
       <div class="item">
         <input type="checkbox"  required>
         <p>I declare that I have read the <a href="faq_blood.html" target="_blank"><u>terms and conditions</u></a> and acknowledge that
           I don't have any risk stated above.</p>
       </div>
       <div class="item">
         <input type="checkbox"  required>
         <p>I realise that I shall not donate my blood if I belong to any of the groups
         of individuals at risk of contracting HIV/Hepatitis/Syphilis and that I should
         inform the National Blood Bank if I am exposed and request to delete my profile.</p>
       </div>
       <div class="item">
         <input type="checkbox"  required>
         <p>I voluntarily give permission for my blood/blood component to be withdrawn
           and used in testing for HIV, Hepatitis B, Hepatitis C and Syphilis, and in what
           other manner deemed appropriate by the Blood Service Center, Hospital and the
           Ministry of Health, Malaysia.</p>
       </div>
       <div class="item">
         <input type="checkbox"  required>
         <p>I understand that all information given  will be kept confidential.</p>
       </div>
     </div>
<br>
      <button type='submit' name="register" value="register"  onclick="return Validate()">REGISTER</button>
      <button type='reset' name="reset" value='reset'>RESET</button>

      <p class="message">Already registered?&nbsp; &#8594; &nbsp;<a href="bd_login.php">Sign In</a></p>
    </form>
  </div>
</div>
<br>
<br>
<div class="wrapfooter">
<footer> Powered by YZ Designs </footer>
</div>
<script type="text/javascript">
function Validate() {
  var password = document.getElementById("bd_psswd").value;
  var confirmPassword = document.getElementById("bd_repsswd").value;
  if (password != confirmPassword) {
      alert("Passwords do not match.");
      return false;
  }
  return true;
}
</script>
</body>
</html>
