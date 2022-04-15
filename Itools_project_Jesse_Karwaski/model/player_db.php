<?php

//SELECT * FROM teams inner join team_stats on team_stats.teamID = teams.teamID where team_stats.teamID = $teamID"
function search_by_last_name($last_name) {
    global $db;
    $query = "SELECT * FROM players 
                join teams on teams.teamID = players.teamID where players.lname = '$last_name'";
   
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


function update_player(
    $playerID, $first_name, $last_name, 
    $position, $weight, $height, $teamID
 ) {

    global $db;

       $query = "UPDATE players
        SET
        teamID = '$teamID',
        fname = '$first_name',
        lname = '$last_name',
        position = '$position',
        height = '$height',
        weight = '$weight'
        where playerID = '$playerID'";

        try{
            $statement = $db->prepare($query);
            $statement->execute();
        } catch(PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
 }

 function add_player( $playerID ,$first_name, $last_name, 
 $position, $weight, $height, $teamID) {

    global $db;

    $query = "INSERT INTO players VALUES
    ('$playerID', '$teamID','$first_name', '$last_name', '$position', '$height', '$weight' )";

        try{
            $statement = $db->prepare($query);
            $statement->execute();
        } catch(PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
}
 }


function delete_player($playerID) {
    global $db;

    $query = "DELETE FROM players WHERE playerID = '$playerID'";

    try{
        $statement = $db->prepare($query);
        $statement->execute();
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}






?>