<?php
require("../model/database.php");
require("../model/customer_db.php");
require("../model/countries_db.php");
require_once('../model/fields.php');
require_once('../model/validate.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('email', ' Must be a valid email address.');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('state');
$fields->addField('password');
$fields->addField('postal_code');
$fields->addField('phone', ' Use (999) 999-9999 format.');
if (isSet($_POST['action'])) {
    $action = $_POST['action'];
}
else if (isSet($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = '';
}

if($action == '') {

    include("blank.php");
}
else if ($action == 'search_customers') {
    $last_name = $_POST['last_name'];
    $customers = search_by_last_name($last_name);
    include("show_customers.php");
}

else if ($action == 'select_customer') {
    $customerID = $_POST['customerID'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country_code = $_POST['country_code'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $countries = get_countries();
    include("edit_customer.php");
}

else if ($action == 'update_customer') {
    $customerID = $_POST['customerID'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country_code = $_POST['country_code']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validate->email('email', $email);
    $validate->text('first_name',$first_name, true,1, 51);
    $validate->text('last_name',$last_name, true,1, 51);
    $validate->text('address',$city, true,1, 51);
    $validate->text('state',$state, true,1, 51);
    $validate->text('city',$city, true,1, 51);
 
    $validate->text('postal_code',$postal_code, true,1, 21);
    $validate->text('password',$password, true,6, 21);
    $validate->phone('phone',$phone, true);

    if ($fields->hasErrors()) {
   
        $countries = get_countries();
        include("edit_customer.php");
    } else {
        update_customer($customerID, $first_name, $last_name, $address,
            $city, $state, $postal_code, $country_code, $phone,
            $email, $password);
    include("Blank.php");
    }

    
}