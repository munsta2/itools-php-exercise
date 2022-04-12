<?php
    $dsn = 'mysql:host=localhost;dbname=project_database_jesse_karwaski';
    $username = 'ts_user';
    $password = 'pa55word';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }

    function display_db_error($error_message) {
        include('database_error.php');
        exit();
    }
?>