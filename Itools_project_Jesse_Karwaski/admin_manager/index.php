<?php 
require_once('../model/database.php');
require('../model/login_db.php');
session_start();

if (isSet($_POST['action'])) {
    $action = $_POST['action'];
}
else if (isSet($_GET['action'])) {
    $action = $_GET['action'];
}
else if (isSet($_SESSION['user'])) {
    $action = 'returning user';
}
else {
    $action = 'login page';
}



switch ($action) {
    case 'login page':
        include('login_screen.php');
        break;
    case 'login attempt':
     
     $flag = is_valid_admin_login($_POST['username'], $_POST['password']);
 
     if ($flag == 1) {
        $_SESSION['user'] = 'admin';
        include('admin_view.php');
        break;
     }
     else{
       
         include('login_screen.php');
         break;
     }

     case 'returning user':
        include('admin_view.php');
        break;
     case 'logout':
        $_SESSION = array();
        session_destroy();
        
        // Delete cookie from browser
        $name = session_name();
        $expire = strtotime('-1 year');
        $params = session_get_cookie_params();
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
        
        // Reset email and password and return to main menu
       
        header("Location: ". '/itools_project_Jesse_Karwaski/');
        break;
}

?>