<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Details</title>
  <link rel="stylesheet" href="css/Register.css">
  <link rel="stylesheet" href="css/servicedetails.css">

</head>
<body>
<header>
    <div class="container">
      <div class="top-right">
      </div>
      <h1>Phone Repair Services</h1>
    </div>
  </header>

<div class="container">
    <h1>Laptops for Sale</h1>
    
    <div class = laptop>
    <img src ="Pics/s-l500.jpg">
    </div>
    
    <h5>The best of the best!</h5>
    
    Fill in the details below!
    
<form action="progress.php">
    
    <h1>Purchase Order Form</h1><br>
    <label for="choice">Choose a device:</label>
    <select id="choice" name="choice" required>
        <option value="">Select Device</option>
        <option value="1800">Smartphone</option>
        <option value="900">Laptop</option>
        <option value="1500">Tablet</option>
    </select>
    <br> <br>
<label for="device_model">Device(Model)</label>
<input type="text" name="device_model" id="device_model" required><br>
<hr>
<br>


<?php
if(isset($_GET['service'])) {
    $selectedService = $_GET['service'];
    // Initial values for the services array
    $services = array(
        "Cracked Screen" => array(
            "price" => 50
        ),
        "Battery Replace" => array(
            "price" => 30
        ),
        "Water Damage" => array(
            "price" => 80
        ),
        "USB Fixing" => array(
            "price" => 20
        ),
        "Boot loop" => array(
            "price" => 40
        ),
        "Missing Drivers/Api's" => array(
            "price" => 60
        )
    );

    // Display selected service details
    if (isset($services[$selectedService])) {
        $price = $services[$selectedService]['price'];
        echo "<p>Selected Service: $selectedService</p>";
        echo "<div id='subtotal'>Subtotal: $$price</div>";
        echo "<div id='tax'>Tax (10%)</div>";
        echo "<div id='total'>Total: $" . ($price + ($price * 0.1)) . "</div>";
    } else {
        echo "No service details available.";
    }
} else {
    echo "No service selected.";
}
?>
<br>

    <input type="submit" value="Pay">
<br>
<br>



        
 </form> 
</div>  
    
</body>
</html>
