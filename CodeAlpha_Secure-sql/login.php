<?php
include 'db.php';
include 'security.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT password, capability_code FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($dbPassword, $capCode);
$stmt->fetch();

if (decryptAES($dbPassword) === $password) {
    $_SESSION['capability'] = $capCode;
    echo "LOGIN SUCCESS";
} else {
    echo "LOGIN FAILED";
}
?>
