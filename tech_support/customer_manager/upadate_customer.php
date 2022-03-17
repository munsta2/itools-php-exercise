<?php 

// Get the customer data
$customer_id = filter_input(INPUT_POST,'customer_id');
$first_name = filter_input(INPUT_POST,'first');
$last_name = filter_input(INPUT_POST,'last');
$address = filter_input(INPUT_POST,'address');
$city = filter_input(INPUT_POST,'city');
$state = filter_input(INPUT_POST,'state');
$postalCode = filter_input(INPUT_POST,'postal');
$countryCode = filter_input(INPUT_POST,'country');
$phone = filter_input(INPUT_POST,'phone');
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST,'password');


//validate the customer data
if ($customer_id == null || $first_name == null || $last_name == null 
|| $address == null || $city == null || $state == null || $postalCode == null
|| $countryCode == null || $phone == null || $email == null || $password == null) {
    $error_message = "Invalid customer data. Check all fields and try again.";
    include('../errors/database_error.php');
} else {
    require_once('../model/database.php');

    $query = "UPDATE customers
    SET firstName = '$first_name',
        lastName = '$last_name',
        address = '$address',
        city = '$city',
        state = '$state',
        postalCode = '$postalCode',
        countryCode = '$countryCode',
        phone = '$phone',
        email = '$email',
        password = '$password'
        Where customerID = '$customer_id'";

        $statement = $db->prepare($query);
        
        $statement->execute();
        $statement->closeCursor();
        include("index.php");
}




?>