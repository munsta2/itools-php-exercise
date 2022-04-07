<?php 


function get_team(int $teamID) {
    global $db;
    $query = "SELECT *  FROM teams where teamID = $teamID";
    $statement = $db->prepare($query);
    $statement->execute();
    $team = $statement->fetchAll();
    $statement->closeCursor();
    return $team;
}

function get_teams() {
    global $db;
    $query = "SELECT * FROM teams";
    $statement = $db->prepare($query);
    $statement->execute();
    $teams = $statement->fetchAll();
    $statement->closeCursor();
    return $teams;
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
        // TODO TASK
        //         
        // implement the udpating of the teams stats function for next next session.
        // 

        echo "wins ".$wins."[".$idNum."]";
        echo '<br>';
        echo "lose ".$lose."[".$idNum."]";
        echo '<br>';
        echo '<br>';

    }

    
}


?>

