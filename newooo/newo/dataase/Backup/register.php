<link rel="stylesheet"  href="css/Valid.css">
<link rel="stylesheet" href="css/Register.css">
<header class="header">

<center><ul>
   
    
    <li><a href="login.php">Login</a></li>
  

</ul></center>

</header>
<center>

<?php 

if (isset($_POST['submit'])) {
     require "common.php";
 try { 
     require_once 'src/DBconnect.php';
 $connection = new PDO($dsn, $username, $password, $options);
     $new_user = array(
 "firstname" => escape($_POST['firstname']),
 "lastname" => escape($_POST['lastname']),
 "email" => escape($_POST['email']),
 "age" => escape($_POST['age']),
 "location" => escape($_POST['location'])
);
    $sql = sprintf( "INSERT INTO %s (%s) values (%s)", "users", implode(", ",
array_keys($new_user)), ":" . implode(", :", array_keys($new_user)) );
     
     $statement = $connection->prepare($sql);
$statement->execute($new_user);
 // insert new user code will go here
 } catch(PDOException $error) { 
 echo $sql . "<br>" . $error->getMessage();
 }
}

include "admin/templates/header.php"; 


if (isset($_POST['submit']) && $statement)
 { 
 echo $new_user['firstname']. ' successfully added';
 } 
?>




<h2>Add a user</h2>


 <form method="post">
 <label for="firstname">First Name</label>
 <input type="text" name="firstname" id="firstname" required><br><br> 
 <label for="lastname">Last Name</label>
 <input type="text" name="lastname" id="lastname" required><br><br> 
 <label for="email">Email Address</label>
 <input type="email" name="email" id="email" required><br><br> 
 <label for="age">Age</label>
 <input type="text" name="age" id="age"><br><br> 
 <label for="location">Location</label>
 <input type="text" name="location" id="location"><br><br> 
 <input type="submit" name="submit" value="Submit">
 </form>
<u><a href="home.php">Back to home</a></u>
<?php include "admin/templates/footer.php"; ?>