<?php

require('../model/database.php');
require('../model/teams_db_functions.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'blank';
}


switch ($action) {
    case 'blank';
        $teams = get_teams();
        include('blank.php');
        break;
    case 'show team':
        $teams = get_teams();
        $team_id = filter_input(INPUT_POST, 'team_id');
        $team_array = get_team_with_stats($team_id);
        include('show_team.php');
        break;
    case 'show players':
        $team_id = filter_input(INPUT_POST, 'team_id');
        $player_array = get_players($team_id);
        include('show_players.php');
        break;



}









?>