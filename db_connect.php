<?php
// Database connection settings
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'khatqzcj');
define('DB_PASSWORD', 'Crr4qmOFLfaN');
define('DB_DATABASE', 'khatqzcj_wp243');

// Create the database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
