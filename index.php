<?php

// ***************** CONNECTIONS *****************

// Include Environmental Variables
include "environment.php";

// Connect to Local MySQL Database
$servername = $_ENV["LOCAL_SERVER_NAME"];
$username = $_ENV["LOCAL_SERVER_USERNAME"];
$password = $_ENV["LOCAL_SERVER_PASSWORD"];
$db_name = $_ENV["DB_NAME"];

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed." . $conn->connect_error);
}
echo "Connected successfully";

// ***************** QUERIES *****************

// Candy Query
$candy_query = "SELECT * FROM sweetwater.sweetwater_test
WHERE comments like '%candy%';";
$result = $conn->query($candy_query);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "orderid: " . $row["orderid"] . " - comment: " .$row["comments"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();