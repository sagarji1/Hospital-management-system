

<?php
// Database connection
$servername = "localhost";
$username = "username"; // Your MySQL username
$password = "password"; // Your MySQL password
$dbname = "mydatabase"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$Pincode=$_POST['Pincode'];
$Phone=$_POST['Phone'];
$About=$_POST['About'];
$gender=$_POST['gender'];

// SQL to insert data into table
$sql = "INSERT INTO appointment (name,email,Pincode,Phone,About,gender) VALUES ('$name', '$email','$Pincode','$Phone','$About','$gender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>