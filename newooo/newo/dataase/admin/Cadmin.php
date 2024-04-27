<?php 

if (isset($_POST['submit'])) {
     require "../common.php";
 try { 
     require_once '../src/DBconnect.php';
 $connection = new PDO($dsn, $username, $password, $options);
    $new_user = array(
 "Username" => escape($_POST['Username']),
 "Password" => escape($_POST['Password']),
 "Email" => escape($_POST['Email'])
);
    $sql = sprintf( "INSERT INTO %s (%s) values (%s)", "admin", implode(", ",
array_keys($new_user)), ":" . implode(", :", array_keys($new_user)) );
     
     $statement = $connection->prepare($sql);
$statement->execute($new_user);
 // insert new user code will go here
 } catch(PDOException $error) { 
 echo $sql . "<br>" . $error->getMessage();
 }
}

include "templates/header.php"; 


if (isset($_POST['submit']) && $statement)
 { 
 echo $new_user['Username']. ' successfully added';
 } 
?>




<h2>Add a user</h2>


 <form method="post">
 <label for="Username">Username</label>
 <input type="text" name="Username" id="Username" required> <br><br>
 <label for="Password">Password</label>
 <input type="text" name="Password" id="Password" required> <br><br>
 <label for="Email">Email Address</label>
 <input type="email" name="Email" id="Email" required> <br><br>
 <input type="submit" name="submit" value="Submit"><br><br>
 </form>
 <u><a href="index.php">Back to home</a></u>
<?php include "templates/footer.php"; ?>