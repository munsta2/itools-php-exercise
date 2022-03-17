<?php

$title = filter_input(INPUT_POST, 'title');
$desc = filter_input(INPUT_POST, 'description');
$code = filter_input(INPUT_POST, 'products');
$id = filter_input(INPUT_POST, 'id');
// echo $title." ".$desc." ".$code." ".$id." ";
$date = date("Y-m-d");

if($title == null || $desc == null || $code == null) {
    $error = "form not filled";
    include("../errors/error.php");
} else {
    require_once('../model/database.php');
    $query = "INSERT into incidents 
                (customerID, title, description, productCode, dateOpened)
              VALUES
                (:id, :title, :desc, :code, :date)";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':desc', $desc);
    $statement->bindValue(':title', $title);
    $statement->execute();
    $statement->closeCursor();
    include("create_succses.php");
}




?>