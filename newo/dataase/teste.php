<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Fixing Store Booking</title>
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="css/new.css">

</head>
<body>
    <div class="container">
        <h2>Online Booking Form</h2>
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and sanitize form data
            $service = htmlspecialchars($_POST['service']);
            $phone_model = htmlspecialchars($_POST['phone_model']);
            $appointment_date = htmlspecialchars($_POST['appointment_date']);
            $name = htmlspecialchars($_POST['name']);
            $phone_number = htmlspecialchars($_POST['phone_number']);
            $email = htmlspecialchars($_POST['email']);

            // Perform booking confirmation logic (e.g., store in database)
            // For demonstration purposes, assume booking is successful

            // Redirect to confirmation page
            header("Location: confirm.php?service=$service&phone_model=$phone_model&appointment_date=$appointment_date&name=$name&phone_number=$phone_number&email=$email");
            exit();
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="service">Select Service:</label>
            <select id="service" name="service" required>
                <option value="screen_repair">Screen Repair</option>
                <option value="battery_replacement">Battery Replacement</option>
                <option value="Water_damage">Water damage</option>
                <option value="Software+bug">Software Bug</option>

                <!-- Add more options for other services -->
            </select>

            <label for="phone_model">Select Phone Model:</label>
            <select id="phone_model" name="phone_model" required>
                <option value="iphone">iPhone</option>
                <option value="samsung">Samsung Galaxy</option>
                <option value="android">Android </option>
                <!-- Add more options for other phone models -->
            </select>

            <label for="appointment_date">Preferred Date:</label>
            <input type="date" id="appointment_date" name="appointment_date" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</body>
</html>
