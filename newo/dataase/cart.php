<!DOCTYPE html>
<html>
<head>
    <!-- Header section -->
    <center><header>
        <!-- Any header content can go here -->
    </header></center>
    <title>Shopping Cart</title>
    <style>
        /* CSS styles for the document */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h2 {
            color: #666;
        }
        h3 {
            color: #009900;
            text-align: center;
        }
        .items-list {
            margin-bottom: 20px;
        }
        .items-list li {
            list-style: none;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .total-section {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<!-- Link to external CSS file -->
<link rel="stylesheet" href="css/new.css">
    <!-- Main heading -->
    <h1>Shopping Cart</h1>
    <!-- Sub-heading -->
    <h2>Selected Items:</h2>
    
    <?php
    // PHP code to process selected items
    $total = 0; // Initialize total cost variable
    
    // Check if items have been selected
    if(isset($_POST['repair'])){
        $selected_items = $_POST['repair']; // Get selected items
        
        // Output selected items in a list
        echo '<ul class="items-list">';
        foreach($selected_items as $item){
            echo '<li>' . htmlspecialchars($item) . '</li>'; // Output each selected item
            
            // Calculate total cost based on selected items
            if($item == "Screen Repair"){
                $total += 50;
            } elseif($item == "Battery Repair"){
                $total += 30;
            } elseif($item == "Water Repair"){
                $total += 80;
            }
        }
        echo '</ul>';
        
        // Output total cost
        echo "<div class='total-section'><h3>Total: $".$total."</h3></div>";
    } else {
        // If no items selected, display message
        echo "<p>No items selected.</p>";
    }
    ?>
    
    <!-- Link back to home page -->
    <center><p>Click <a href="home.php">here</a> Home Page</p></center>
</body>
</html>
