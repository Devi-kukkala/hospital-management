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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM patients WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin_dashboard.html");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
