<?php
include "db.php";

$user_msg = strtolower(trim($_POST['message']));

$query = "SELECT bot_reply FROM chatbot WHERE user_input LIKE '%$user_msg%'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['bot_reply'];
} else {
    echo "Sorry, I didn't understand that. Please try again.";
}
?>
