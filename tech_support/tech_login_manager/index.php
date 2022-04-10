<?php 




require('../model/database.php');
require('../model/login_db.php');
require('../model/incidents_db.php');
require('../model/technician_db.php');
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
        include('tech_login.php');
        break;
    case 'login attempt':
     
     $flag = is_valid_technician_login($_POST['email'], $_POST['password']);
     $_SESSION['tech_user'] = get_technician_by_email($_POST['email']);
    $incidents = get_incidents_assigned($_SESSION['tech_user']['techID']);
     if ($flag == 1) {
        
        $_SESSION['user'] = $_POST['email'];
        
        include('../incident_update/select_incident.php');
        break;
     }
     else{
       
         include('tech_login.php');
         break;
     }

     case 'logout':
        unset($_SESSION['user']);
        include('../index.php');
        break;
}

?>