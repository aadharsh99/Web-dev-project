<?php

class TicketHandler {
    private $currentUser;

    public function __construct() {
        session_start();
        $this->currentUser = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";
    }

    public function processForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["problem"]) && isset($_POST["device_model"]) && isset($_POST["device_os"])) {
                $problem = $_POST["problem"];
                $deviceModel = $_POST["device_model"];
                $deviceOS = $_POST["device_os"];

                echo "Current User: $this->currentUser<br>";
                echo "Problem: $problem<br>";
                echo "Device Model: $deviceModel<br>";
                echo "Device OS: $deviceOS<br>";

                // Now you can insert this data into your database
                // Make sure to handle database connections and SQL queries securely
            } else {
                echo "Error: Problem or device details are missing.";
            }
        } else {
            echo "Error: Form not submitted.";
        }
    }
}

$ticketHandler = new TicketHandler();
$ticketHandler->processForm();

?>
<link rel="stylesheet" href="css/Register.css">
<center><form method="post" action="ticket.php">
    <input type="submit" name="submit" value="Confirm">
</form></center>
