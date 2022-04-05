<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY productCode';
    $products = $db->query($query);
    return $products;
}

function delete_product(String $product_code) {
    global $db;
    $query = "DELETE FROM products
              WHERE productCode = '$product_code'";
    $db->exec($query);
}

function add_product(String $product_code, String $name, float $version,  String $date) {
    global $db;
    $query = "INSERT INTO products
              VALUES
              ('$product_code', '$name', '$version', '$date')";
    $db->query($query);
}
?>