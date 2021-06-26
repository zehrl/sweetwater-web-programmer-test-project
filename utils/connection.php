<?php

// Include Environmental Variables
include "environment.php";

// Connect to Local MySQL Database
$servername = getenv('HOST_NAME');
$username = getenv('SERVER_USERNAME');
$password = getenv('SERVER_PASSWORD');
$database = getenv('DB_NAME');

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully<br>";