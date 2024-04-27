<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
        <h2>Booking Confirmation</h2>
        <?php
        // Retrieve booking details from query parameters
        $service = htmlspecialchars($_GET['service']);
        $phone_model = htmlspecialchars($_GET['phone_model']);
        $appointment_date = htmlspecialchars($_GET['appointment_date']);
        $name = htmlspecialchars($_GET['name']);
        $phone_number = htmlspecialchars($_GET['phone_number']);
        $email = htmlspecialchars($_GET['email']);

        // Display booking confirmation message
        echo "<p>Thank you, $name! Your booking for $service (Phone: $phone_model) on $appointment_date has been confirmed.</p>";
        echo "<p>We will contact you at $phone_number or $email for any further updates.</p>";
        ?>
    </div>
</body>
</html>
