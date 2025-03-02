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
    $id = intval($_GET['id']); // Sanitize the input

    // Prepare the query to get the patient details by ID
    $sql = "SELECT * FROM patients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $patient = $result->fetch_assoc();
        // Return patient data as JSON
        echo json_encode($patient);
    } else {
        echo json_encode(['error' => 'Patient not found']);
    }

    $stmt->close();
}
$conn->close();
?>
