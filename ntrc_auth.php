
<?php
session_start();
if(!isset($_SESSION["ntrc_id"]))
{
header("Location: ntrc.php");
exit();
}
?>
