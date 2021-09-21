<?php
require('config.php');
$query=mysqli_query($con,"delete from organ_donors where od_mykad='" . $_REQUEST["od_mykad"] . "'")
  or die(mysqli_error($con));

if($query)
{
echo "<script>window.open('ntrc_donorlist.php','_self')</script>";
}
else
{
echo "<script>alert('Something Went Wrong, Please try again later.');</script>";
}
mysqli_close($con);
?>
<?php





 ?>
