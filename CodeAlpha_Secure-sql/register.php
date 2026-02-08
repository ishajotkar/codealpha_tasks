<?php
include 'db.php';
include 'security.php';

$username = $_POST['username'];
$password = $_POST['password'];

$encryptedPassword = encryptAES($password);
$capabilityCode = bin2hex(random_bytes(16));

$stmt = $conn->prepare("INSERT INTO users (username, password, capability_code) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $encryptedPassword, $capabilityCode);
$stmt->execute();

echo "User Registered Successfully";
?>
