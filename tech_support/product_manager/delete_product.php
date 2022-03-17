<?php
require_once('../model/database.php');

// Get IDs
$product_id = filter_input(INPUT_POST, 'product_id');
echo $product_id;

// Delete the product from the database
if ($product_id != false) {
    $query = 'DELETE FROM products
              WHERE productCode = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}
else {
    echo "error";
}

// Display the Product List page
include('index.php');