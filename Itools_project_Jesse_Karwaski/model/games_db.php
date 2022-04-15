<?php


function get_games() {
    global $db;

    $query = "SELECT * FROM games";

    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_image_path(int $id) {
    global $db;

    $query = "Select imagePath From teams where teamID = '$id'";

    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        
        return $result[0]['imagePath'];
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_standings() {

    global $db;

    $query = "SELECT * FROM team_stats  join teams where teams.teamID = team_stats.teamID ORDER BY points DESC, (pointsFor - pointsAgaints) DESC";
    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        
        return $result;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }

}

?>