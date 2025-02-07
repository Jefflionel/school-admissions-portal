<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php'; // Ensure database connection is included


error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $program = $_POST['program'];

    $stmt = $conn->prepare("INSERT INTO applications (name, email, program) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $program);
    
    if ($stmt->execute()) {
        echo "Application submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
