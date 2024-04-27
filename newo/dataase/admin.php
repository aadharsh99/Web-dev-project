<?php
session_start(); // Start the session

require "common.php";
require_once 'src/DBconnect.php';

class UserAuthenticator {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function authenticateUser($username, $password) {
        try {
            $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $statement->execute();
            $user = $statement->fetch();
	

            return $user; // Return user data if found, false otherwise
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
            return false;
        }
    }
}

$userAuthenticator = new UserAuthenticator($connection);

if (isset($_POST['SUBMITS'])) {
	$_SESSION['Active'] = true;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userAuthenticator->authenticateUser($username, $password);

    if ($user) {
        // Authentication successful, store username in session
        $_SESSION['Username'] = $username; //$user['username'];
       
        // Redirect to ServiceDetails.php only if authentication is successful
        header("Location: admin\index.php");
        exit();
    } else {
        // If authentication fails, display error message
        echo "Login failed. Please check your credentials.";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/Register.css">
</head>
<body>
  <header>
    <div class="container">
      <div class="top-right">
        <a href="Login.php">Login</a>
        <a href="Register.php">Register</a>
      </div>
    </div>
  </header>
  
  <div class="container">
    <h2>Admin Login</h2>
    <form action="" method="POST">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>
      
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>
      
      <input type="submit" name="SUBMITS" value="Login">
<br><br>

<a href="Login.php">User Login</a>
    </form>




  </div>

</body>
</html>