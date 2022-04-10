<?php
require("../model/database.php");
require("../model/customer_db.php");
require("../model/product_db.php");



$lifetime = 60 * 60 * 24 * 365 *3; //seconds in 3 yrs

session_set_cookie_params($lifetime, '/');
session_start();

if (isSet($_POST['action'])) {
    $action = $_POST['action'];
}
else if (isSet($_GET['action'])) {
    $action = $_GET['action'];
}
else if(isSet($_SESSION['email'])) {
    $action = 'verify_email';
}
else {
    $action = 'login';
}

switch($action) {
    case 'login':
        include('login.php');
        break;
    case 'verify_email':


        $flag = is_valid_customer_login($_POST['email'], $_POST['password']);

        if ($flag == 1) {
            
            $customer = search_by_email($_POST['email']);
            $_SESSION['email'] = $customer['email'];
            $products = get_products();
            include('register_product.php');
            break;
        } else {
            include('login.php');
            break;
        }


     
        
    case 'register_product':
        if(!isSet($_SESSION['customerID'])) {
            $_SESSION['customerID'] = $_POST['customerID'];
        }
        $product_code = $_POST['productCode'];
        $date = date('Y-m-d');
        $customer_id =  $_SESSION['customerID'];
        $query = "INSERT into registrations 
        (customerID,  productCode, registrationDate)
    VALUES
        (:customer_id, :product_code,:date)";

        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':product_code', $product_code);
        $statement->execute();
        $statement->closeCursor();
        include('registration_confirmation.php');
        break;
    case 'log out':
        $_SESSION = array(); // Clear a ll session data from memory
        session_destroy(); // Clean up the session ID
        // $login_message = 'You have been logged o u t .'; 
        include('login.php');
        break;
        


    break;
}
