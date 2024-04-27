 
<?php
/**
 * used to add protectio to data
 * Causes errors with null values
 */

function escape($data) {
 $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
 $data = trim($data);
 $data = stripslashes($data); 
return ($data); 
}