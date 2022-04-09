<?php

function get_customers() {
    global $db;
    $query = "SELECT * FROM customers
              ORDER BY lastName";
   
    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $customers = $statement->fetchAll();
        return $customers;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function search_by_last_name($last_name) {
    global $db;
    $query = "SELECT * FROM customers
              WHERE lastName='$last_name'
              ORDER BY firstName";
   
    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $customers = $statement->fetchAll();
        return $customers;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function search_by_email($email) {
    global $db;
    $query = "SELECT * FROM customers
              WHERE email='$email'
              ORDER BY firstName";
    
    try{
        $statement = $db->prepare($query);
        $statement->execute();
        
        $customer = $statement->fetch();
        return $customer;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_customer($customerID, $first_name, $last_name, 
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password) {
    global $db;
    $query = "UPDATE customers
              SET 
              firstName = '$first_name',
              lastName = '$last_name',
              address = '$address',
              city = '$city',
              state = '$state',
              postalCode = '$postal_code',
              countryCode = '$country_code',
              phone = '$phone',
              email = '$email',
              password = '$password'
              WHERE customerID = '$customerID'";
   

    try{
        $statement = $db->prepare($query);
        $statement->execute();
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }


}

function add_customer($customerID, $first_name, $last_name, 
    $address, $city, $state, $postal_code, $country_code,
    $phone, $email, $password) {

        global $db;

        $query = "INSERT INTO customers VALUES
            ('$customerID','$first_name','$last_name', '$address', '$city', '$state','$postal_code','$country_code','$phone','$email','$password')";

        try{
            $statement = $db->prepare($query);
            $statement->execute();
        } catch(PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
}

?>