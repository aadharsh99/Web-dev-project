<?php

require "common.php";
require_once 'src/DBconnect.php';

class UserUpdater {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function getUsers() {
        try {
            $sql = "SELECT * FROM users";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll();
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
            return [];
        }
    }

    public function generateUserTable() {
        $users = $this->getUsers();
        ob_start();
        ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $row) : ?>
                    <tr>
                        <td><?php echo escape($row["id"]); ?></td>
                        <td><?php echo escape($row["firstname"]); ?></td>
                        <td><?php echo escape($row["lastname"]); ?></td>
                        <td><?php echo escape($row["email"]); ?></td>
                        <td><?php echo escape($row["age"]); ?></td>
                        <td><?php echo escape($row["location"]); ?></td>
                        <td><?php echo $row["date"]; ?> </td>
                        <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php">Back to home</a>
        <?php
        return ob_get_clean();
    }
}

$userUpdater = new UserUpdater($connection);

// Usage:

echo "<h2>Update users</h2>";
echo $userUpdater->generateUserTable();
require "templates/footer.php";
?>
