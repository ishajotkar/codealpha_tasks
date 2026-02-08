<?php
session_start();

/* session ke saare variables hatao */
$_SESSION = [];

/* session destroy */
session_destroy();

/* index page pe redirect */
header("Location: index.php");
exit;
?>
