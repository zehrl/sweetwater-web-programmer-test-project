<?php

// Include Environmental Variables
include "environment.php";

// Connect to Local MySQL Database
$servername = $_ENV["LOCAL_SERVER_NAME"];
$username = $_ENV["LOCAL_SERVER_USERNAME"];
$password = $_ENV["LOCAL_SERVER_PASSWORD"];

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed." . $conn->connect_error);
}
echo "Connected successfully";