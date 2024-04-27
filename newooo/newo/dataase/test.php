<?php
// Include necessary files
//require "common.php";
require_once 'src/DBconnect.php';
//require_once 'creatse.php'; // Include the file where UserHandler class is defined

$crt = new create.php;

$crt.addUser('sqed', 'dew', 'fsdfs@gmail.com', 12, 'jgei');

// Create a database connection
//$connection = new PDO($dsn, $username, $password, $options);

// Create an instance of UserHandler
//$userHandler = new UserHandler($connection);

//// Process form submission
//if (isset($_POST['submit'])) {
//    $firstname = $_POST['firstname'];
//    $lastname = $_POST['lastname'];
//    $email = $_POST['email'];
//    $age = $_POST['age'] ?? null;
//    $location = $_POST['location'] ?? null;
//    
//    // Call the addUser method
//    if ($userHandler->addUser($firstname, $lastname, $email, $age, $location)) {
//        echo $firstname . ' successfully added';
//    }
//}

// HTML form
?>

<!--
<h2>Add a user</h2>

<form method="post">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" required> 
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" required> 
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required> 
    <label for="age">Age</label>
    <input type="text" name="age" id="age">
    <label for="location">Location</label>
    <input type="text" name="location" id="location">
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
-->
