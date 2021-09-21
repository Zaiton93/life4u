
<?php
session_start();
if(!isset($_SESSION["nbb_id"]))
{
header("Location: nbb.php");
exit();
}
?>
