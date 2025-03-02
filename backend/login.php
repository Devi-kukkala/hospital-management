<?php
session_start();
header('Content-Type: application/json'); // Set header for JSON response

$conn = new mysqli('localhost', 'root', '', 'hospital_db');

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $username;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid login credentials.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid login credentials.']);
    }
}

$conn->close();
?>
