<?php
error_reporting(0);
include_once("dbconnect.php");
$email =$_POST['email'];
$password =$_POST['pass'];

    $sql = "INSERT INTO user (email, password) VALUES('$email','$password')";

if ($conn->query($sql) === true) {
    echo "success";
} else {
    echo "failed";
}
header("Location: signin.php")

?>