<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12774627";
$password = "4gd5b5N3qj";  // paste actual password
$dbname = "sql12774627";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data is received from Unity
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Encrypt password
    $email = $_POST["email"];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration Successful!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No data received!";
}

$conn->close();
?>
