<?php
require("config.php");
if(isset($_POST['register'])) {
    $od_name            = stripslashes($_REQUEST['od_name']);
    $od_name            = mysqli_real_escape_string($con,$od_name);
    $od_mykad           = stripslashes($_REQUEST['od_mykad']); //escapes special characters in a string
    $od_mykad           = mysqli_real_escape_string($con,$od_mykad); //escapes special characters in a string
    $od_dob             = stripslashes(date('Y-m-d',strtotime($_REQUEST['od_dob'])));
    $od_dob             = mysqli_real_escape_string($con,$od_dob);
    $od_age             = stripslashes($_REQUEST['od_age']);
    $od_age             = mysqli_real_escape_string($con,$od_age);
    $od_race            = stripslashes($_REQUEST['od_race']);
    $od_race            = mysqli_real_escape_string($con,$od_race);
    $od_gender          = stripslashes($_REQUEST['od_gender']);
    $od_gender          = mysqli_real_escape_string($con,$od_gender);
    $od_address         = stripslashes($_REQUEST['od_address']);
    $od_address         = mysqli_real_escape_string($con,$od_address);
    $od_city            = stripslashes($_REQUEST['od_city']);
    $od_city            = mysqli_real_escape_string($con,$od_city);
    $od_state           = stripslashes($_REQUEST['od_state']);
    $od_state           = mysqli_real_escape_string($con,$od_state);
    $od_postcode        = stripslashes($_REQUEST['od_postcode']);
    $od_postcode        = mysqli_real_escape_string($con,$od_postcode);
    $od_contact         = stripslashes($_REQUEST['od_contact']);
    $od_contact         = mysqli_real_escape_string($con,$od_contact);
    $od_email           = stripslashes($_REQUEST['od_email']);
    $od_email           = mysqli_real_escape_string($con,$od_email);
    $od_psswd           = stripslashes($_REQUEST['od_psswd']);
    $od_psswd           = mysqli_real_escape_string($con,$od_psswd);
    $od_repsswd         = stripslashes($_REQUEST['od_repsswd']);
    $od_nameofkin       = stripslashes($_REQUEST['od_nameofkin']);
    $od_nameofkin       = mysqli_real_escape_string($con,$od_nameofkin);
    $od_nameofkinmykad  = stripslashes($_REQUEST['od_nameofkinmykad']);
    $od_nameofkinmykad  = mysqli_real_escape_string($con,$od_nameofkinmykad);
    $od_relationship    = stripslashes($_REQUEST['od_relationship']);
    $od_relationship    = mysqli_real_escape_string($con,$od_relationship);
    $organlist          = $_REQUEST['od_organ'];
    $od_organ           = implode(', ' , $organlist);
    $od_document_file   = $_FILES['od_document']['tmp_name'];
    $od_document_selfie = $_FILES['od_selfie']['tmp_name'];
    $od_document_mime   = $_FILES['od_document']['type'];
    $od_document_mime   = $_FILES['od_selfie']['type'];
    $od_document        = addslashes(file_get_contents($od_document_file));
    $od_selfie          = addslashes(file_get_contents($od_document_selfie));
    $od_regdate         = date("Y-m-d H:i:s");

//  move_uploaded_file($tmp_name, "../images/$od_document");

	$query=mysqli_query($con,"insert into organ_donors(od_name,od_mykad,od_dob,od_age,od_race,od_gender,od_address,od_city,od_state,
    od_postcode,od_contact,od_email,od_psswd,od_nameofkin,od_relationship,od_organ,od_document,od_selfie,od_regdate)
  values
  ('$od_name','$od_mykad','$od_dob','$od_age','$od_race','$od_gender','$od_address','$od_city','$od_state','$od_postcode',
    '$od_contact','$od_email','$od_psswd','$od_nameofkin','$od_relationship','$od_organ','$od_document','$od_selfie','$od_regdate')")
    or die(mysqli_error($con));

  if($query)
  {
echo "<script>alert('Organ Donor Registered Successfully!'); window.open('od_login.php','_self')</script>";
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
  <title >Life4U Organ Donor Registration</title>
  <link rel="stylesheet" href="css/organ.css">
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.png"/>
</head>
<body>
<a href="index.html"><img class="home" src="images/home.png"/></a>
  <center><h1>Life4U Organ Donor Registration Form</h1></center>

<div class="login-page">
  <div class="form">
    <form class="login-form" method='post' action="" enctype="multipart/form-data">
      <h2>1. PERSONAL INFORMATION</h2>
      <hr>

      <label>Full Name (as per MyKad)</label>
      <input type='text' name='od_name' id='od_name' required/>

      <label>Mykad No.</label>
      <input type='text' name='od_mykad' id='od_mykad' pattern="[0-9]+{12}" title="Only numbers are allowed" maxlength="12" required/>

      <label>Date of Birth</label>
      <input type='date' name='od_dob' id='od_dob' min="1871-01-01" max="2003-12-31" required/>

      <label>Age</label>
      <input type='number' name='od_age' id='od_age' min="18" max="150" maxlength="2" required/>

      <label >Race</label>
      <select name='od_race' id='od_race' required>
         <option value=''>Select Race</option>
         <option value='Malay'>Malay</option>
         <option value='Chinese'>Chinese</option>
         <option value='Indian'>Indian</option>
         <option value='Others'>Others</option>
      </select>

      <label>Gender</label>
      <select name='od_gender' id='od_gender' required>
         <option value=''>Select Gender</option>
         <option value='M'>Male</option>
         <option value='F'>Female</option>
      </select>

      <label>Address</label>
      <input type='text' name='od_address' id='od_address' required/>

      <label>City</label>
      <input type='text' name='od_city' id='od_city' required/>

      <label>State</label>
      <select name='od_state' id='od_state' required>
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

      <label>Postcode</label>
      <input type='text' name='od_postcode' id='od_postcode' maxlength="5" required/>

      <label>Contact No.</label>
      <input type='text' name='od_contact' id='od_contact' maxlength="11" required/>

      <label>Email</label>
      <input type='email' name='od_email' id='od_email' required/>

      <label>Password</label>
      <input type='password' name='od_psswd' id='od_psswd' required/>

      <label>Retype Password</label>
      <input type='password' name='od_repsswd' id='od_repsswd' required/>
      <br>
      <h2>2. MY NEXT OF KIN</h2>
      <hr>

      <label>Name of Next Kin (as per MyKad)</label>
      <input type='text' name='od_nameofkin' id='od_nameofkin' required>

      <label>Next of Kin MyKad No.</label>
      <input type='text' name='od_nameofkinmykad' id='od_nameofkinmykad' required/>

      <label>Relationship</label>
      <select name='od_relationship' id='od_relationship' required>
         <option value='﻿'>﻿Select Relationship</option>
         <option value='Spouse'>Spouse</option>
         <option value='Mother'>Mother</option>
         <option value='Father'>Father</option>
         <option value='Daughter'>Daughter</option>
         <option value='Son'>Son</option>
         <option value='Sister'>Sister</option>
         <option value='Brother'>Brother</option>
         <option value='Aunt'>Aunt</option>
         <option value='Uncle'>Uncle</option>
         <option value='Female Cousin'>Female Cousin</option>
         <option value='Male Cousin'>Male Cousin</option>
         <option value='Grandmother'>Grandmother</option>
         <option value='Grandfather'>Grandfather</option>
         <option value='Granddaughter'>Granddaughter</option>
         <option value='Grandson'>Grandson</option>
         <option value='Stepmother'>Stepmother</option>
         <option value='Stepfather'>Stepfather</option>
         <option value='Stepsister'>Stepsister</option>
         <option value='Stepbrother'>Stepbrother</option>
         <option value='Niece'>Niece</option>
         <option value='Nephew'>Nephew</option>
      </select>
<br>
<h2>3. ORGAN WISH TO BE DONATED</h2>
<hr>
      <div class="inbox" >
       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="All">
         <p>All</p>
       </div>

       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="Bones">
         <p>Bones</p>
       </div>

       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="Eyes">
         <p>Eyes</p>
       </div>

       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="Heart">
         <p>Heart</p>
       </div>

       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="Kidney">
         <p>Kidney</p>
       </div>

       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="Liver">
         <p>Liver</p>
       </div>

       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="Lungs">
         <p>Lungs</p>
       </div>

       <div class="item">
         <input type="checkbox" id="od_organ" name="od_organ[]" value="Skin">
         <p>Skin</p>
       </div>
     </div>
<h2>4. INDENTIFICATION VERIFICATION</h2>
<hr>
      <label>Please upload copy of your MyKad identity card. </label>
      <input type='file' name='od_document' id='od_document' required/>

<label> Please upload a selfie of you with your MyKad identity card. </label>
      <input type='file' name='od_selfie' id='od_selfie' required/>

<br>
<h2>5. DONOR DECLARATION AND CONSENT</h2>
<hr>
<div class="inbox">
 <div class="item">
   <input type="checkbox" required>
   <p>I declare that I have read the <a href="faq_organ.html" target="_blank"><u>terms and conditions</u></a>.</p>
 </div>
 <div class="item">
   <input type="checkbox" required>
   <p>I understand that all information given is correct and will be kept confidential.</p>
 </div>
</div>
<br>
      <button type='submit' name="register" value="register"  onclick="return Validate()" >REGISTER</button>
      <button type='reset' name="reset" value='reset'>RESET</button>

      <p class="message">Already registered?&nbsp; &#8594; &nbsp;<a href="od_login.php">Sign In</a></p>
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
  var password = document.getElementById("od_psswd").value;
  var confirmPassword = document.getElementById("od_repsswd").value;
  if (password != confirmPassword) {
      alert("Passwords do not match.");
      return false;
  }
  return true;
}
</script>
<script>
function checkFormData() {
    if (!$('input[name=od_organ]:checked').length > 0) {
        document.getElementById("errMessage").innerHTML = "Please tick at least 1 option";
        return false;
    }
    return true;
}
</script>
</body>
</html>
