<?php
$host = "localhost";
$user = "root"; // Change if needed
$pass = "";
$dbname = "admissions";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
