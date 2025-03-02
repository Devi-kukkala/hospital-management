<?php
// Connect to database
$conn = new mysqli('localhost', 'root', '', 'hospital_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password
    $hospitalCode = $_POST['hospitalCode'];
    $actualHospitalCode = '123456'; // Example code, this should be secured

    // Check if hospital code is correct
    if ($hospitalCode === $actualHospitalCode) {
        $sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            header("Location: ../login.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid hospital code!";
    }
}
$conn->close();
?>
