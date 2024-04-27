<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
   <header><h1>Services </h1></header>
  <link rel="stylesheet" href="css/Register.css">
    <link rel="stylesheet" href="css/servicedetails.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="top-right">
        <a href="Login.html">Login</a>
        <a href="Register.php">Register</a>
      </div>
    </div>
  </header>
  
  <div class="container">
    <h2>Our Services</h2>
    <p>Below are the services we offer:</p>
    <ul>
        <?php
            // Array of services offered
            $services = array(
                "Cracked Screen",
                "Battery Replace",
                "Water Damage",
                "USB Fixing",
                "Boot loop",
                "Missing Drivers/Api's"
            );

            // Display services
            foreach ($services as $service) {
                echo "<li>$service</li>";
            }
        ?>
    </ul>
    <p>Contact us at our instagram site for more information regarding the services we do provide.</p>
  </div>
 <footer>
 <link rel="stylesheet" href="css/Register.css">
    <div class="container">
      <div class="logo">
        <center>
          <!-- Link to Instagram page -->
          <a href="https://www.instagram.com/mrbionictt/?hl=en" target="_blank">
            <img src="images/instagram.jpg" width="80" height="80" alt="Instagram Logo">
          </a>
        </center>
      </div>
      <center><p>&copy; 2024 Your Company. All rights reserved.</p></center>
    </div>
  </footer>
  <center><p>Click <a href="home.php">here</a> Home Page</p></center>
</body>
</html>