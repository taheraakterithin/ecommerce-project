<?php
include("includes/db.php");

$query = "SELECT * FROM chat ORDER BY timestamp ASC LIMIT 50";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $alignment = ($row['user'] === 'Admin') ? 'right' : 'left'; // Check if the user is Admin
    $usernameClass = ($row['user'] === 'Admin') ? 'user-name-right' : 'user-name-left'; // Add a specific class for styling
    
    echo "<div class='msgln' style='text-align: $alignment;'>
            <b class='$usernameClass'>{$row['user']}:</b> 
            {$row['message']} 
            <span class='chat-time'>[{$row['timestamp']}]</span>
          </div>";
}
?>