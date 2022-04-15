<?php 
require_once('database.php');

function get_team(int $teamID) {
    global $db;
    $query = "SELECT *  FROM teams where teamID = $teamID";

    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $team = $statement->fetchAll();
        $statement->closeCursor();
        return $team;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_teams() {
    global $db;
    $query = "SELECT * FROM teams";
  
    try{
        $statement = $db->prepare($query);
        $statement->execute();
        $teams = $statement->fetchAll();
        $statement->closeCursor();
        return $teams;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
    
}
function get_team_with_stats(int $teamID) {
    global $db;
    $query = "SELECT * FROM teams inner join team_stats on team_stats.teamID = teams.teamID where team_stats.teamID = $teamID";
    $statement = $db->prepare($query);
    $statement->execute();
    $team = $statement->fetchAll();
    $statement->closeCursor();
    return $team;
}

function get_players(int $teamID) {
    global $db;
    $query = "SELECT *  FROM players WHERE teamID = $teamID";
    $statement = $db->prepare($query);
    $statement->execute();
    $players = $statement->fetchAll();
    $statement->closeCursor();
    return $players;
}

function update_team_stats() {
    global $db;
    $query = "SELECT teamID from teams";
    $statement = $db->prepare($query);
    $statement->execute();
    $ids = $statement->fetchall();
    $statement->closeCursor();
    

    foreach ($ids as $id) {
        $idNum = $id['teamID'];
        $query = "SELECT * from games where homeTeamID = $idNum OR awayTeamID = $idNum";
        $statement = $db->prepare($query);
        $statement->execute();
        $game_results = $statement->fetchall();
        $statement->closeCursor();
        
        $pointfor = 0;
        $pointAgint = 0;
        $wins = 0;
        $lose = 0;
        $points = 0;
        foreach ($game_results as $game) {
            

            if ($idNum == $game['homeTeamID']) {
                $pointfor = $pointfor + $game['homeTeamScore'];
                $pointAgint = $pointfor + $game['awayTeamScore'];

                if ($game['homeTeamScore'] > $game['awayTeamScore']) {
                    $wins = $wins + 1;
                    $points = $points + 2;
                } else {
                    $lose = $lose + 1;
                }


            } else{
                $pointfor = $pointfor + $game['awayTeamScore'];
                $pointAgint = $pointfor + $game['homeTeamScore'];

                if ($game['awayTeamScore'] > $game['homeTeamScore']) {
                    $wins = $wins + 1;
                    $points = $points + 2;
                } else {
                    $lose = $lose + 1;
                }
            }

     

        }
        helper($wins, $lose, $pointAgint, $pointfor, $points, $idNum);
       

    }

    
}

function helper(int $wins, int $lose, int $pointAgint, int $pointfor, int $points, int $idNum){
    global $db;
    $query = "UPDATE team_stats
        SET
        wins = $wins, 
        loses = $lose,
        pointsAgaints = $pointAgint,
        pointsFor = $pointfor,
        points = $points
        WHERE teamID = $idNum 
    ";

    try{
        $statement = $db->prepare($query);
        $statement->execute();
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }


}


?>

