<?php
function add_incident($customer_id, $product_code, $title, $description) {
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query =
        'INSERT INTO incidents
            (customerID, productCode, dateOpened, title, description)
        VALUES (
               :customer_id, :product_code, :date_opened,
               :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':date_opened', $date_opened);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}

function get_incidents_unassigned() {
    global $db;
    $query = 'SELECT * FROM incidents
			  JOIN customers ON incidents.customerID = customers.customerID
			  WHERE incidents.techID IS NULL
              ORDER BY dateOpened';
	$statement = $db->prepare($query);
	$statement->execute();
	
	if($statement->errorCode() == 0) {
		$incidents = $statement->fetchAll();
		$statement->closeCursor();
		return $incidents;
	}
	else {
    $errors = $statement->errorInfo();
	$error_message = $errors[2];
	include('../errors/database_error.php'); 
	exit();
	}	
	}
	
	function get_tech_incidents() {
    global $db;
    $query = 'SELECT distinct technicians.techID, technicians.firstName, technicians.lastName, 
			 (SELECT count(incidents.incidentID) FROM incidents where technicians.techID = incidents.techID) as open_incidents
			  FROM technicians
			  LEFT OUTER JOIN incidents ON incidents.techID = technicians.techID
			  ORDER BY (SELECT count(incidents.incidentID) FROM incidents where technicians.techID = incidents.techID)';
	$statement = $db->prepare($query);
	$statement->execute();
	
	if($statement->errorCode() == 0) {
		$techIncidents = $statement->fetchAll();
		$statement->closeCursor();
		return $techIncidents;
	}
	else {
    $errors = $statement->errorInfo();
	$error_message = $errors[2];
	include('../errors/database_error.php'); 
	exit();
	}	
	}
	
	function get_incident($id) {
    global $db;
    $query = 'SELECT c.firstName, c.lastName, i.productCode
              FROM incidents i
			  INNER JOIN customers c ON c.customerID = i.customerID			  
              WHERE i.incidentID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
	 
	if($statement->errorCode() == 0) {
		$incidentToAssign = $statement->fetch();
		$statement->closeCursor();
		return $incidentToAssign;
	}
	else {
    $errors = $statement->errorInfo();
	$error_message = $errors[2];
	include('../errors/database_error.php'); 
	exit();
	}	
	}
	
	function assign_incident($incident_id, $technician_id) {
    global $db;
    $query = 'UPDATE incidents
			  SET techID = :technician_id
			  WHERE incidentID = :incident_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':incident_id', $incident_id);
    $statement->bindValue(':technician_id', $technician_id);
    $row_count = $statement->execute();
	
	if($statement->errorCode() == 0) {
		$statement->closeCursor();
		return $row_count;
	}
	else {
    $errors = $statement->errorInfo();
	$error_message = $errors[2];
	include('../errors/database_error.php'); 
	exit();
	}	
    }

        
		
		
		
?>