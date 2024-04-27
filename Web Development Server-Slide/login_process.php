<?php
session_start();


// Check if a service is selected
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['service'])) {
    $selectedService = $_GET['service'];
    // Here you can perform actions based on the selected service, such as retrieving additional details from a database
} else {
    // If no service is selected, redirect back to the services page
    header("Location: Service.php");
    exit; // Stop script execution after redirection
}
?>
