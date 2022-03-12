<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
echo $product_id;
echo $category_id;

// Validate inputs
if ($category_id == null || $category_id == false ||
        $code == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
   require_once('database.php');
    $query = "UPDATE products 
    SET productCode = '$code', 
        categoryID = '$category_id' ,  
        productName = '$name',
         listPrice = '$price'
    WHERE productID = '$product_id'";
   // $query = "UPDATE products SET productName = taaaaaast WHERE productID = 13";
    $statement = $db->prepare($query);
   
    $statement->execute();
    $statement->closeCursor();
    // Display the Product List page
 
    include('index.php');
}
?>