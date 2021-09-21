
<?php
session_start();
if(!isset($_SESSION["od_mykad"]))
{
header("Location: od_login.php");
exit();
}
?>
