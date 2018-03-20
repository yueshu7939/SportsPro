<?php

	# Open the database
@ $db = new mysqli('64.119.131.183', 'F17Team1', 'F17Team1', 'F17Team1');
if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	exit();
}
?>