<?php
$first_name = filter_input(INPUT_POST, 'first');
$last_name = filter_input(INPUT_POST, 'last');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$password = filter_input(INPUT_POST, 'password');


if ($first_name == null || $last_name == null || $email == null || $phone == null || $password == null) {
    $error_message = "Invalid technician data. Check all fields and try again.";
    include('../errors/database_error.php');
} else {
    require_once('../model/database.php');
    $query = 'INSERT INTO technicians
                 (firstName, lastName, email, phone, password)
              VALUES
                 (:first_name, :last_name, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(":email", $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);

    $statement->execute();
    $statement->closeCursor();
include('index.php');
}


?>

