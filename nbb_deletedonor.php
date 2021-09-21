<?php
require('config.php');
$query=mysqli_query($con,"delete from blood_donors where bd_mykad='" . $_REQUEST["bd_mykad"] . "'")
  or die(mysqli_error($con));

if($query)
{
echo "<script>window.open('nbb_donorlist.php','_self')</script>";
}
else
{
echo "<script>alert('Something Went Wrong, Please try again later.');</script>";
}
mysqli_close($con);
?>
<?php





 ?>
