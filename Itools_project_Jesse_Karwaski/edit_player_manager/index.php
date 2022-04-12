<?php 

require("../model/database.php");
require_once('../model/player_db.php');
require_once('../model/fields.php');
require_once('../model/validate.php');
require_once('../model/teams_db_functions.php');

$validate = new Validate();
$fields = $validate->getFields();
$fields->addField('fname');
$fields->addField('lname');
$fields->addField('position',"Must be valid position");
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
        include("blank.php");
        break;
    case 'search_player':
        $lastName = $_POST['last_name'];
        $players =  search_by_last_name($lastName);
        include("show_player.php");
        break;
    case 'select_player':
        $playerID = $_POST['playerID'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $position = $_POST['position'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $teamID = $_POST['teamID'];
        $teams = get_teams();
        include('edit_player.php');
        break;
    case 'update_player':
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
   
         
            $teams = get_teams();
            
            include("edit_player.php");
        } else {
         
           update_player($playerID, $fname, $lname, $position, $weight, $height, $teamID);
            
    
            
        include("Blank.php");
        }
        break;
}







?>