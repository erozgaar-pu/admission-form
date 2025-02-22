<?php
// Database connection settings
include('/home/khatqzcj/public_html/admission-form/db_connect.php');

// Get the visitor's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

// Insert a record into the 'visitors' table
$sql = "INSERT INTO visitors (ip_address) VALUES ('$ip_address')";
if ($conn->query($sql) === TRUE) {
    // Increment the visitor count in the 'visitor_count' table
    $sql_count = "UPDATE visitor_count SET count = count + 1 WHERE id = 1";
    $conn->query($sql_count);
}

// Get the total visitor count from the 'visitor_count' table
$sql_count = "SELECT count FROM visitor_count WHERE id = 1";
$result = $conn->query($sql_count);
$row = $result->fetch_assoc();

// Output the current visitor count
echo $row['count'];

// Close the database connection
$conn->close();
?>
