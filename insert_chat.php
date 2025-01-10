<?php
session_start();
include("includes/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = 'Admin'; // Replace with your login system's username
    $message = mysqli_real_escape_string($con, $_POST['message']);
    $timestamp = date("Y-m-d H:i:s");

    $query = "INSERT INTO chat (user, message, timestamp) VALUES ('$user', '$message', '$timestamp')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<div class='msgln'><b class='user-name'>$user:</b> $message <span class='chat-time'>[$timestamp]</span></div>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>