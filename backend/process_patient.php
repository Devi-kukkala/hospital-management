<?php
session_start(); // Start the session to check for admin login

// If the admin is not logged in, redirect to the login page
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.html");
    echo "Session not found!";
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospital_db');

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted for adding or updating a patient
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $patient_name = $conn->real_escape_string($_POST['patient_name']);
    $age = (int) $_POST['age']; // Ensure age is treated as an integer
    $phone = $conn->real_escape_string($_POST['phone']);
    $disease = $conn->real_escape_string($_POST['disease']);
    $joined_date = $conn->real_escape_string($_POST['joined_date']);
    $fee_paid = $conn->real_escape_string($_POST['fee_paid']);
    $doctor = $conn->real_escape_string($_POST['doctor']);
    $address = $conn->real_escape_string($_POST['address']);

    // Logic for adding a new patient
    if (isset($_POST['add_patient'])) {
        $sql = "INSERT INTO patients (patient_name, age, phone, disease, joined_date, fee_paid, doctor, address) 
                VALUES ('$patient_name', '$age', '$phone', '$disease', '$joined_date', '$fee_paid', '$doctor', '$address')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../admin_dashboard.html"); // Redirect back to admin dashboard
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Logic for updating an existing patient
    if (isset($_POST['update_patient']) && isset($_POST['patient_id'])) {
        $patient_id = (int) $_POST['patient_id']; // Get the patient ID from the form
        $sql = "UPDATE patients SET 
                    patient_name = '$patient_name', 
                    age = '$age', 
                    phone = '$phone', 
                    disease = '$disease', 
                    joined_date = '$joined_date', 
                    fee_paid = '$fee_paid', 
                    doctor = '$doctor', 
                    address = '$address' 
                WHERE id = '$patient_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../admin_dashboard.html"); // Redirect back to admin dashboard after updating
            exit();
        } else {
            echo "Error updating patient: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
