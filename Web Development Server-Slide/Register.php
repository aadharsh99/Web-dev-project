<?php

class UserHandler {
    private $connection;
    
    public function __construct($connection) {
        $this->connection = $connection;
    }
    
    public function addUser($username, $password, $email) {
        try {
            $new_user = array(
                "username" => $this->escape($username),
                "password" => $this->escape($password),
                "email" => $this->escape($email)
            );
            
            $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                "register",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
            );

            $statement = $this->connection->prepare($sql);
            $statement->execute($new_user);
            
            return true; // Success
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
            return false; // Error
        }
    }
    
    private function escape($value) {
        // Implement your escaping mechanism here
        return $value;
    }
}

// Usage:
require "common.php";
require_once 'src/DBconnect.php';

$connection = new PDO($dsn, $username, $password, $options);
$userHandler = new UserHandler($connection);

// Handle form submission
if (isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Add user to the database
    if ($userHandler->addUser($username, $password, $email)) {
        // Registration successful, redirect to login page
        header("Location: Login.html");
        exit();
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/Register.css">
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
    <h2>Register</h2>
    <form action="" method="POST">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>
      
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br><br>
      
      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>
