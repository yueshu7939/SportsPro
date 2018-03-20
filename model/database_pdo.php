<?php
$dsn = 'mysql:host=64.119.131.183;dbname=F17Team1';
$username = 'F17Team1';
$password = 'F17Team1';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}

function display_db_error($error_message) {
    include '../errors/database_error.php';
    exit;
}

?>