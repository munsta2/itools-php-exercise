<?php 

require("../model/database.php");
require_once('../model/player_db.php');
require_once('../model/fields.php');
require_once('../model/validate.php');
require_once('../model/teams_db_functions.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('gameDate');
$fields->addField('team_1_score');
$fields->addField('team_2_score');


if (isSet($_POST['action'])) {
    $action = $_POST['action'];
}
else if (isSet($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'blank';
}


switch ($action) {

    case 'blank':
        $teams = get_teams();
       
        include("blank.php");
        break;

    case 'add game form':
        $teamID1 = $_POST['team_id1'];
        $teamID2 = $_POST['team_id2'];
        $team_1_score = "";
        $team_2_score = "";
        $gameDate = "";
        if ($teamID1 == $teamID2) {
            $teams = get_teams();
            $error = '<span class="error">'.'needs to be two different teams'. '</span>';
            include("blank.php");
        }
        else {
            include("add_game_form.php");
        }
        
        break;

    case 'add game':
      
        $teamID1 = $_POST['team_id1'];
        $teamID2 = $_POST['team_id2'];

        $team_1_score = $_POST['team_1_score'];
        $team_2_score = $_POST['team_2_score'];

        $gameDate = $_POST['gameDate'];





        $validate->valid_number('team_1_score', $team_1_score,true);
        $validate->valid_number('team_2_score', $team_2_score,true);
        $validate->date('gameDate', $gameDate, true);
        if ($fields->hasErrors()) {
   
         
            $teams = get_teams();
            
            include("edit_player.php");
        } else {
         
        //    update_player($playerID, $fname, $lname, $position, $weight, $height, $teamID);
            
    
        echo "it worked";
        include("Blank.php");
        }
        break;
}







?>