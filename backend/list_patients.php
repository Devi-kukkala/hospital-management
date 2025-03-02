<?php

session_start(); // Start the session to check for admin login

// If the admin is not logged in, redirect to the login page
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.html");
    echo "Session not found!";
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'hospital_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all patients
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

$patients = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $patients[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($patients);

$conn->close();
?>
