<?php

session_start();

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
echo "<b>Start Date:</b> $today";
?>
    

    <p><strong>Current User:</strong>
        
        <?php

// Access the currentUser variable from the session
$currentUser = isset($_SESSION['Username']) ? $_SESSION['Username'] : "Guest";

// Use the currentUser variable
echo " $currentUser";
?>


    </p>
    
    <p><strong>Ticket Number:</strong> <?php echo $ticketNumber; ?></p>
	
	<a href="home.php">Home</a><br><br>

	<form action="login.php" method="post" name="Logout_Form" class="form-signin">
                <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
            </form>

           
<link rel="stylesheet" href="css/Register.css">

</body>
</html>
