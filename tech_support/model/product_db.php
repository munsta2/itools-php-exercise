<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY productCode';

    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products; 

    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
   
}

function delete_product(String $product_code) {
    global $db;
    $query = "DELETE FROM products
              WHERE productCode = '$product_code'";
    
    try{
        $statement = $db->prepare($query);
        $statement->execute();
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_product(String $product_code, String $name, float $version,  String $date) {
    global $db;
    $query = "INSERT INTO test
              VALUES
              ('$product_code', '$name', '$version', '$date')";
    try{
        $statement = $db->prepare($query);
        $statement->execute();
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>