<!DOCTYPE html>
<html>
<head>
    <title>Phone Fixing Store</title>

   
    <div class="container">
        <h1>Welcome to Shopping</h1>
        
           <link rel="stylesheet" href="css/car.css">

        
        <form action="cart.php" method="post">
            <label class="checkbox-label">
                <input type="checkbox" name="repair[]" value="Screen Repair"> 
                <img src="images/screenrepair.jpg" alt="Screen Repair"> Screen Repair ($50)
            </label>
            <label class="checkbox-label">
                <input type="checkbox" name="repair[]" value="Battery Repair">
                <img src="images/batteryrepair.jpg" alt="Battery Repair"> Battery Repair ($30)
            </label>
            <label class="checkbox-label">
                <input type="checkbox" name="repair[]" value="Water Repair">
                <img src="images/water.jpg" alt="Water Repair"> Water Repair ($80)
            </label>
            <input type="submit" class="submit-button" value="Add to Cart">
        </form>
    </div>
</body>
</html>
