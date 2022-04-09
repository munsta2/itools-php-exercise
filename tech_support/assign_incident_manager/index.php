<?php
require("../model/database.php");
require("../model/incidents_db.php");
session_start();

if (isSet($_POST['action'])) {
    $action = $_POST['action'];
}
else if (isSet($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = 'blank';
}

switch($action) {

    case 'blank':
        $free_incidents = get_free_incidents();
        include("show_incidents.php");
    break;

    case 'select_tech';
    $_SESSION['incidentID'] = $_POST['incident_code'];
    $techs = count_assigned_incidents_by_technicians();
    include("show_tech.php");
    break;

    case 'assign':
    $_SESSION['techID'] = $_POST['tech_id'];
    $tech = get_technician($_SESSION['techID']);
    $incident = get_incident($_SESSION['incidentID']);
    $customer = get_customer($incident['customerID']);
    include("assign_tech.php");
    break;
    case 'insert':
        assign_incident( $_SESSION['incidentID'],$_SESSION['techID']);
        include("success.php");

}





?>