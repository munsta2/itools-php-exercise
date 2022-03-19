<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        
        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        if (empty($name)) {
            $message = 'Please enter a name';
            break;
        }

        // 2. display the name with only the first letter capitalized
        $name = ucwords($name);

        $i = strpos($name, ' ');
        if ($i === false) {
            $first_name = $name;
        } else {
            $first_name = substr($name,0,$i);
        }

        $i2 = strpos($name, ' ', $i+1);
        if ($i2 === false) {
            $last_name = substr($name,$i);
            $middle_name = "";
        } else {
            $middle_name = substr($name,$i,$i2-$i);
            $last_name = substr($name,$i2);
        }
  

        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        if (empty($email)) {
            $message = 'Please enter a name';
            break;
        }
        // 2. make sure the email address has at least one @ sign and one dot character
        if(!strpos($email, '@' ) || !strpos($email, '.') ) {
            $message = 'invalid email';
            break;
        }

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
       
        $phone = str_replace('-',"",$phone);
        $phone = str_replace('(',"",$phone);
        $phone = str_replace(')',"",$phone);
        $phone = str_replace(' ',"",$phone);
       
        if(strlen($phone) < 7 ) {
            $message = 'invalid phone number';
            break;
        }
       
        // 2. format the phone number like this 123-4567 or this 123-456-7890
        $part1 = substr($phone,0,3);
        $part2 = substr($phone,3,3);
        $part3 = substr($phone,6);
        $area_code = $part1;
        $phone_number = $part2."-".$part3;
        $phonef = $part1."-".$part2."-".$part3;
        

        /*************************************************
         * Display the validation message
         ************************************************/
        $message = 
        "Hello $first_name,"."\n\n".
        "Thank you for entering this data: "."\n\n".
        "Name: $name"."\n".
        "Email: $email"."\n".
        "Phone: $phone"."\n".
        "First Name: $first_name"."\n".
        "Middle Name: $middle_name"."\n".
        "Last Name: $last_name"."\n".
        "Area Code: $area_code"."\n".
        "Phone number: $phone_number";


        break;
}
include 'string_tester.php';
?>