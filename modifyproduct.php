<?php
$location = $_GET['location'];
$itemid = $_GET['itemid'];
$count = $_GET['count'];
$servername = "sql5.freemysqlhosting.net";
$username = "sql5116253";
$password = "iPGvebzVcJ";
$dbname = $username;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE {$location}
        SET count = {$count}
        WHERE item = '{$itemid}';";
$result = $conn->query($sql);
$conn->close();
