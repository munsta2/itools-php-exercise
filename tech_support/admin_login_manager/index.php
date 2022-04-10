<?php 
require('../model/database.php');
require('../model/login_db.php');
// Start session
session_start();

if (isSet($_POST['action'])) {
    $action = $_POST['action'];
}
else if (isSet($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'login page';
}


switch ($action) {
    case 'login page':
        include('admin_login.php');
        break;
    case 'login attempt':
     
     $flag = is_valid_admin_login($_POST['username'], $_POST['password']);
 
     if ($flag == 1) {
        $_SESSION['user'] = 'admin';
        include('admn_view.php');
        break;
     }
     else{
       
         include('admin_login.php');
         break;
     }

     case 'logout':
        unset($_SESSION['user']);
        include('../index.php');
        break;
}

?>