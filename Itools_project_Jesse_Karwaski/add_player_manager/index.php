<?php 

require("../model/database.php");
require_once('../model/player_db.php');
require_once('../model/fields.php');
require_once('../model/validate.php');
require_once('../model/games_db.php');
require_once('../model/teams_db_functions.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('fname');
$fields->addField('lname');
$fields->addField('position'," Must be valid position");
$fields->addField('height');
$fields->addField('weight');


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
    case 'show players':
        $teams = get_teams();
        $team_logo = get_image_path($_POST["team_id"]);
        $teamID = $_POST["team_id"];
        $players = get_players($_POST["team_id"]);
        include("show_players.php");
        break;
    case 'delete player':
        
        delete_player($_POST['playerID']);
        $teams = get_teams();
        $team_logo = get_image_path($_POST["team_id"]);
        $teamID = $_POST["team_id"];
        $players = get_players($_POST["team_id"]);
        include("show_players.php");
        break;

    case 'add player form':
        $playerID = "";
        $fname = "";
        $lname =  "";
        $position =  "";
        $height =  "";
        $weight =  "";
        $teamID =  $_POST['team_id'];
        include("add_players.php");
        break;
    case 'add player':
        $playerID = $_POST['playerID'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $position = $_POST['position'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $teamID = $_POST['team_id'];

        $validate->text('fname',$fname, true,1, 51);
        $validate->text('lname',$lname, true,1, 51);
        $validate->position('position', $position, true);
        $validate->valid_number('height', $height,true);
        $validate->valid_number('weight', $weight,true);
        if ($fields->hasErrors()) {
   
         
          
            
            include("add_players.php");
        } else {
         
           add_player($playerID, $fname, $lname, $position, $weight, $height, $teamID);
            
    
            $teams = get_teams();
            $team_logo = get_image_path($_POST["team_id"]);
            $teamID = $_POST["team_id"];
            $players = get_players($_POST["team_id"]);    
            include("show_players.php");
        }
        break;
}







?>