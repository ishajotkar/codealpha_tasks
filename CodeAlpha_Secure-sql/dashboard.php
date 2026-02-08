<?php
session_start();

if (!isset($_SESSION['capability']) || empty($_SESSION['capability'])) {
    session_destroy();
    die("UNAUTHORIZED ACCESS");
}

echo "WELCOME – SECURE AREA";
?>
