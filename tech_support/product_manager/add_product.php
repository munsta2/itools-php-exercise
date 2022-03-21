<?php
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$version = filter_input(INPUT_POST, 'version');
$date = filter_input(INPUT_POST, 'time');


if ($code == null || $name == null || $version == null || $date == null) {
    $error_message = "Invalid product data. Check all fields and try again.";
    include('../errors/database_error.php');
} else {


  //  $test = new DateTime($date);

    try {
        $date_obj = new DateTime($date);
    } catch (Exception $e) {
        $error_message = "Invalid date";
        include('../errors/database_error.php');
        exit();
    }

     $format = 'Y-m-d';
    $date = $date_obj->format($format);

    require_once('../model/database.php');
    $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:code, :name, :version, :date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
include('index.php');
}


?>

