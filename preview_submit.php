<?php
// preview_submit.php

// Database connection
include('db_connect.php');


// Prepare and bind
$stmt = $conn->prepare("INSERT INTO challanEntries (mode, course, program, batchNumber, name, father_name, gender, cnic, email, phone, qualification, address, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $mode, $course, $program, $batchNumber, $name, $father_name, $gender, $cnic, $email, $phone, $qualification, $address, $city);

// Assign POST values to variables
$mode = $_POST['mode'];
$course = $_POST['course'];
$program = $_POST['program'];
$batchNumber = $_POST['batchNumber'];
$name = $_POST['name'];
$father_name = $_POST['father_name'];
$gender = $_POST['gender'];
$cnic = $_POST['cnic'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$qualification = $_POST['qualification'];
$address = $_POST['address'];
$city = $_POST['city'];

// Execute the statement
if ($stmt->execute()) {
    // Redirect to preview.php to display the latest entry
    header("Location: challan.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
