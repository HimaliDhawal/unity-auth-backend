<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12774627";
$password = "4gd5b5N3qj";  // paste actual password
$dbname = "sql12774627";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo "Login Successful!";
        } else {
            echo "Incorrect Password!";
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No data received!";
}

$conn->close();
?>
