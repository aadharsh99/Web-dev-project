<?php
/**
 * List all users with a link to edit
 */
try {
 require "../common.php";
 require_once '../src/DBconnect.php';
 $sql = "SELECT * FROM register";
 $statement = $connection->prepare($sql);
 $statement->execute();
 $result = $statement->fetchAll();
} catch(PDOException $error) {
 echo $sql . "<br>" . $error->getMessage();
} 
?>

<?php require "templates/header.php"; ?>
<h2>Update users</h2>
<table>
 <thead>
 <tr>
 <th>#</th>
 <th>Username</th>
 <th>Password</th>
 <th>Email Address</th>
 <th></th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($result as $row) : ?>
 <tr>
 <td><?php echo escape($row["UserID"]); ?></td>
 <td><?php echo escape($row["Username"]); ?></td>
 <td><?php echo escape($row["Password"]); ?></td>
 <td><?php echo escape($row["Email"]); ?></td>
 <td><a href="update-single.php?id=<?php echo escape($row["UserID"]); 
        ?>">Edit</a></td>
 </tr>
 <?php endforeach; ?>
 </tbody>
</table>
<a href="index.php">Back to home</a