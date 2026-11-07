<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id < 1) { exit("ID data tidak valid."); }
// Sesuaikan dengan setting MySQL pada komputer Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stusikasus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
$sql = "DELETE FROM cctv WHERE id = $id";
if ($conn->query($sql) !== TRUE) {
    die("Error: " . $conn->error);
}
$conn->close();
header("Location: index.php");
exit;
