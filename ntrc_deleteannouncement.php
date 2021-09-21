<?php
require('config.php');
$query=mysqli_query($con,"delete from ntrc_announcement where ntrc_announceid='" . $_REQUEST["ntrc_announceid"] . "'");

if($query)
{
echo "<script>window.open('ntrc_announcement.php','_self')</script>";
}
else
{
echo "<script>alert('Something Went Wrong, Please try again later.');</script>";
}
mysqli_close($con);
?>
