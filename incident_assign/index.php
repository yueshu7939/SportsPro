<?php
require('../model/database_pdo.php');
require('../model/incident_db_mh.php');
require('../model/technician_db_mh.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_incidents';
    }
}

switch($action) {
    case 'list_incidents':
    // Get unassigned incidents
    $incidents = get_incidents_unassigned();

    // Display the incident list
    include('incident_list.php');
	break;
	
	case 'select_incident':
	// List the technicians available with a count of their assigned incidents
	$_SESSION['incident_id'] = $_POST['incident_id'];
	$techIncidents = get_tech_incidents();
	include('technician_list.php');
	break;
	
	case 'assign_incident';
	// Show assign incident form with tech and incident data
	$_SESSION['tech_id'] = $_POST['tech_id'];
	$incidentToAssign = get_incident($_SESSION['incident_id']);
	$technician = get_technician($_SESSION['tech_id']);
	include('incident_assign.php');
	break;
	
	case 'register_product';
	// Assign the selected tech to the selected incident
	$row_count = assign_incident($_SESSION['incident_id'], $_SESSION['tech_id']);
		if ($row_count == 1) {
			$success = 'This incident was assigned to a technician.';
		} else {
			$error = 'An error has occured, and the incident was not assigned.';
		}
    $_SESSION = array();   // Clear all session data from memory
	session_destroy();     // Clean up the session ID
	include ('result.php');
	break;
}
?>