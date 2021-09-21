<?php
require('config.php');
$query=mysqli_query($con,"delete from nbb_admin where nbb_id='" . $_REQUEST["nbb_id"] . "'")
  or die(mysqli_error($con));

if($query)
{
echo "<script>window.open('nbb_manageadmin.php','_self')</script>";
}
else
{
echo "<script>alert('Something Went Wrong, Please try again later.');</script>";
}
mysqli_close($con);
?>
<?php





 ?>
