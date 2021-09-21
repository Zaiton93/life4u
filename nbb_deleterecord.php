<?php
require('config.php');
$query=mysqli_query($con,"delete from blood_donation_history where bdh_mykad='" . $_REQUEST["bdh_mykad"] . "'")
  or die(mysqli_error($con));

if($query)
{
echo "<script>alert('Record Deleted Successfully.'); window.open('nbb_viewdonor.php','_self')</script>";
}
else
{
echo "<script>alert('Something Went Wrong, Please try again later.');</script>";
}
mysqli_close($con);
?>
<?php





 ?>
