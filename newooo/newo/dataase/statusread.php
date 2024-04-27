<?php
/**
 * Function to query information based on
 * a parameter: in this case, status name.
 *
 */
if (isset($_POST['submit'])) {
    try {
        require "common.php";
        require_once 'src/DBconnect.php';
        $sql = "SELECT status_id, status_description
                FROM status
                WHERE status_name = :status_name"; // Changed to status_name
        $status_name = $_POST['status_name']; // Changed variable name
        $statement = $connection->prepare($sql);
        $statement->bindParam(':status_name', $status_name, PDO::PARAM_STR); // Changed to status_name
        $statement->execute();
        $result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

    require "templates/header.php";
    if ($result && $statement->rowCount() > 0) { 
?>
        <h2>Results</h2>
        <table>
            <thead>
                <tr>
                    <th>Status ID</th>
                    <th>Status Name</th>
                    <th>Status Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo escape($row["status_id"]); ?></td>
                        <td><?php echo escape($status_name); ?></td>
                        <td><?php echo escape($row["status_description"]); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        No results found for Status Name: <?php echo escape($_POST['status_name']); ?>.
<?php } 
} 
?>

<h2>Find status based on Status Name</h2> <!-- Changed label -->
<form method="post">
    <label for="status_name">Status Name</label> <!-- Changed id and name -->
    <input type="text" id="status_name" name="status_name"> <!-- Changed id and name -->
    <input type="submit" name="submit" value="View Results">
</form>
<a href="index.php">Back to home</a>
<?php require "templates/footer.php"; ?>
