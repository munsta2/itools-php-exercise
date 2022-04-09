<?php

function get_countries() {
    global $db;
    $query = "SELECT * FROM countries";

    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $countries = $statement->fetchall();
        return $countries;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
    
} 

?>

