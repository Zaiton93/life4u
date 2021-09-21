<?php
require('config.php');
$query=mysqli_query($con,"delete from ntrc_admin where ntrc_id='" . $_REQUEST["ntrc_id"] . "'")
  or die(mysqli_error($con));

if($query)
{
echo "<script>window.open('ntrc_manageadmin.php','_self')</script>";
}
else
{
echo "<script>alert('Something Went Wrong, Please try again later.');</script>";
}
mysqli_close($con);
?>
<?php





 ?>
