<?php
session_start();
// Assuming you have already established a database connection

// Check if a service is selected
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['service'])) {
    $selectedService = $_GET['service'];
    
    
    if ($details) {
        // Output additional details
        echo "<h2>Service Details: $selectedService</h2>";
        echo "<p>$details</p>";
    } else {
        echo "<p>Details for this service are not available.</p>";
    }
} else {
    // If no service is selected, redirect back to the services page
    header("Location: ServiceDetails.php");
    exit; // Stop script execution after redirection
}
?>


