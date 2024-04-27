<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Form</title>
    <link rel="stylesheet" href="css/Valid.css">
    <link rel="stylesheet" href="css/Register.css">
</head>
<body>

<?php
$choice = $_POST['choice'] ?? ''; // Assuming this is coming from a form submission
if ($choice === "1800") {
    $device = "Smartphone";
} elseif ($choice === "900") {
    $device = "Laptop";
} elseif ($choice === "1500") {
    $device = "Tablet";
} else {
    $device = ""; 
}

class Service {
    private $device;
    private $problems;

    public function __construct($device, $problems) {
        $this->device = $device;
        $this->problems = $problems;
    }

    public function getDevice() {
        return $this->device;
    }

    public function getProblems() {
        return $this->problems;
    }

    public function setDevice($device) {
        $this->device = $device;
    }

    public function setProblems($problems) {
        $this->problems = $problems;
    }
}

$problems = [
    "Cracked Screen",
    "Battery Replace",
    "Water Damage",
    "USB Fixing",
    "Boot loop",
    "Missing Drivers/Api's"
];

$service = new Service($device, $problems);

echo "<h2><br><br>Please provide details: <br><br></h2>"; 
?>

<form method="post" action="submit_service.php">

    <label for="service">Service</label>
    <select name="problem" id="problem" required>
        <option value="" selected disabled hidden>Select a problem</option>
        <?php foreach ($service->getProblems() as $problem) { ?>
            <option value="<?php echo $problem; ?>"><?php echo $problem; ?></option>
        <?php } ?>
    </select>
    <br><br>

    <label for="choice">Choose a device:</label>
    <select id="choice" name="choice" required>
        <option value="">Select Device</option>
        <option value="1800">Smartphone</option>
        <option value="900">Laptop</option>
        <option value="1500">Tablet</option>
    </select>
    <br><br>

    <label for="device_model">Device(Model)</label><br>
    <input type="text" name="device_model" id="device_model" required><br>

    <label for="device_os">Device(OS)</label><br>
    <input type="text" name="device_os" id="device_os" required><br><br>

    <input type="submit" value="Submit">
</form>
<br><br><br><br><br><br>
<h1>Welcome, <?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : "Guest"; ?> </h1>

</body>
</html>
