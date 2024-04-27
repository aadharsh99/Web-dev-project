<link rel="stylesheet"  href="css/Valid.css">
<link rel="stylesheet" href="css/Register.css">
<header class="header">

<ul>
   <li><a href="login.php">Home</a></li>
    
    
  

</ul>

</header>

<?php

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

// Example usage:
$device = "Smartphone";
$problems = [
    "Battery draining too fast",
    "Screen cracked",
    "Device not turning on",
    "Slow performance",
    "Overheating",
    "No sound/audio"
];

$service = new Service($device, $problems);

echo "Device: " . $service->getDevice() . "<br>";
echo "Services:<br>";

?>

<form method="post" action="submit_service.php">
    <label for="device_model">Device(Model)</label><br>
    <input type="text" name="device_model" id="device_model" required><br><br>

    <label for="device_os">Device(OS)</label><br>
    <input type="text" name="device_os" id="device_os" required><br><br>

    <?php foreach ($service->getProblems() as $problem) { ?>
        <button type="submit" name="problem" value="<?php echo $problem; ?>"><?php echo $problem; ?></button>
    <?php } ?>
</form>
