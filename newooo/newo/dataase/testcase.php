<?php
// Simulate a test scenario by sending a POST request to process_booking.php

// Define the form data for testing
$formData = [
    'service' => 'screen_repair',
    'phone_model' => 'iphone',
    'appointment_date' => '2024-04-15',
    'name' => 'John Doe',
    'phone_number' => '1234567890',
    'email' => 'johndoe@example.com'
];

// Create a CURL request to simulate form submission
$ch = curl_init();

// Set CURL options
curl_setopt($ch, CURLOPT_URL, 'http://localhost/index.php'); // Change URL if necessary
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute CURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Get HTTP status code
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if ($statusCode == 200) {
        echo "Test case passed: Booking form submitted successfully.";
    } else {
        echo "Test case failed: HTTP status code $statusCode";
    }
}

// Close CURL session
curl_close($ch);
?>
