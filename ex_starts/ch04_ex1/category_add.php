<?php

$name = filter_input(INPUT_POST, 'name');
// Validate inputs
if (empty($name)) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 ('$name')";
$statement = $db->prepare($query);
$statement->bindValue(':name', $name);
$statement->execute();
$statement->closeCursor();

include('category_list.php');
}

   
?>