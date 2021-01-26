<?php

//check connection
// Create connection
$conn = new mysqli('localhost', 'root', '', 'web');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "success";
}
?>