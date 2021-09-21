
<?php
session_start();
if(!isset($_SESSION["bd_mykad"]))
{
header("Location: bd_login.php");
exit();
}
?>
