<?php

class User {
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $age;
    protected $location;
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Modify the addUser method to accept firstname parameter
    public function addUser($firstname, $lastname, $email, $age, $location) {
        try {
            // Assign the parameter value to the firstname property
            $this->firstname = $firstname;

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
        
        return $value;
    }

    public function getUsername() {
        return $this->firstname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function greet() {
        return "Hello, " . $this->firstname . "!";
    }
}

class Admin extends User {
    public function __construct($connection, $firstname, $email) {
        parent::__construct($connection);
        // Assign the parameter value to the firstname property
        $this->firstname = $firstname;
    }

    public function greet() {
        return "Hello, " . $this->firstname . "! You are an admin.";
    }
}

class Customer extends User {
    public function __construct($connection, $firstname, $lastname, $email, $age, $location) {
        parent::__construct($connection);
        // Assign the parameter value to the firstname property
        $this->firstname = $firstname;
    }
}


require "common.php";
require_once 'src/DBconnect.php';

// Create database connection
$connection = new PDO($dsn, $username, $password, $options);

// Create an instance of the User class with the database connection
$user = new User($connection);

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $age = $_POST['age'] ?? null;
    $location = $_POST['location'] ?? null;

    // Validate form data
    if (empty($firstname)) {
        echo "First Name is required.";
    } else {
        // Call the addUser method to add the user to the database
        if ($user->addUser($firstname, $lastname, $email, $age, $location)) {
            echo "User added successfully.";
        } else {
            echo "Error adding user.";
        }
    }
}


?>
<header>
    <div class="container">
      <div class="top-right">
        <a href="Login.html">Login</a>
       <a href="Register.html">Register </a>
      <a href="Service.html">Service</a>
      </div>
    </div>
  </header>
  
<h2>Add a user</h2>

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
    
</form>
