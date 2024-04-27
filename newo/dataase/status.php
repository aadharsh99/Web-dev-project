<?php
if (isset($_POST['submit'])) {
    require "common.php";
    try {
        require_once 'src/DBconnect.php';
        $new_status = array(
            "status_id" => $_POST['status_id'],
            "status_name" => $_POST['status_name'],
            "status_description" => $_POST['status_description']
        );

        $sql = sprintf(
            "INSERT INTO status (%s) VALUES (%s)",
            implode(", ", array_keys($new_status)),
            ":" . implode(", :", array_keys($new_status))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_status);
        echo "Status successfully added";
    } catch(PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}
?>
<h2>Add a Status</h2>
<form method="post">
    <label for="status_id">Status ID</label>
    <input type="text" name="status_id" id="status_id">
    <label for="status_name">Status Name</label>
    <input type="text" name="status_name" id="status_name">
    <label for="status_description">Status Description</label>
    <input type="text" name="status_description" id="status_description">
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
