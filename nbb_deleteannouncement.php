<?php
require('config.php');
$query=mysqli_query($con,"delete from nbb_announcement where nbb_announceid='" . $_REQUEST["nbb_announceid"] . "'");

if($query)
{
echo "<script>window.open('nbb_announcement.php','_self')</script>";
}
else
{
echo "<script>alert('Something Went Wrong, Please try again later.');</script>";
}
mysqli_close($con);
?>
