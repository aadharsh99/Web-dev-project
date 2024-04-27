<link rel="stylesheet"  href="css/Valid.css">
<link rel="stylesheet" href="css/Register.css">
<header class="header">

<center><ul>
   
    
    <li><a href="index.php">Login</a></li>
  

</ul></center>

</header>
<center><h2>Add a user</h2>

<form method="post">
    <label for="firstname">First Name</label><br>
    <input type="text" name="firstname" id="firstname" required><br>
    <label for="lastname">Last Name</label><br>
    <input type="text" name="lastname" id="lastname" required><br> 
    <label for="email">Email Address</label><br>
    <input type="email" name="email" id="email" required> <br>
    <label for="age">Age</label><br>
    <input type="text" name="age" id="age"><br>
    <label for="location">Location</label><br>
    <input type="text" name="location" id="location"><br>
    <input type="submit" name="submit" value="Submit">
</form></center>





<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>





<?php

class UserHandler {
    private $connection;
    
    public function __construct($connection) {
        $this->connection = $connection;
    }
    
    public function addUser($firstname, $lastname, $email, $age, $location) {
        try {
            $new_user = array(
                "firstname" => $this->escape($firstname),
                "lastname" => $this->escape($lastname),
                "email" => $this->escape($email),
                "age" => $this->escape($age),
                "location" => $this->escape($location)
            );
            
            $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                "users",
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

// Add a user
//$userHandler->addUser('sqed', 'dew', 'fsdfs@gmail.com', 12, 'jgei');
?>



