<?php

 //Retrieve the submitted form data from submit_service.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
} else {
    
    header("Location: service.php");
    exit();
}

// Function to generate a random alphanumeric string for the ticket number
function generateTicketNumber($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Generate a random ticket number
$ticketNumber = generateTicketNumber();

?>
<link rel="stylesheet" href="css/Register.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
</head>
<body>
    <h2>Ticket Details</h2>
    
    
    <?php
// Set the default timezone to Ireland
date_default_timezone_set('Europe/Dublin');

// Get today's date in the desired format
$today = date('l, F j, Y'); // Format: Day, Month Day, Year

// Print today's date
echo "Start Date: $today";
?>
    

    <p><strong>Current User:</strong>
        
        <?php
// Start or resume the session
session_start();

// Access the currentUser variable from the session
$currentUser = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";

// Use the currentUser variable
echo "Current User: $currentUser";
?>
    </p>
    
    <p><strong>Ticket Number:</strong> <?php echo $ticketNumber; ?></p>
   <li><a href="index.php">Home</a></li>

</body>
</html>
