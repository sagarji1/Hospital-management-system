<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "Appointment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO app1 (name, age, gender, phone, email, about) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissss", $name, $age, $gender, $phone, $email, $about);

// Set parameters and execute
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$about = $_POST['about'];
$stmt->execute();

echo "New record inserted successfully";

$stmt->close();
$conn->close();
?>
