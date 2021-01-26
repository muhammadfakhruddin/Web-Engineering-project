<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:signin.php");

}
 else {
$mail = $_SESSION['email'];
$mysqli = new mysqli('localhost', 'root', '', 'web');

$gmail = $mysqli->query("SELECT email FROM user WHERE email LIKE '%gmail%'");
$yahoo = $mysqli->query("SELECT email FROM user WHERE email LIKE '%yahoo%'");

    while ($row = $gmail->fetch_assoc()){ 
        echo $row['email'];
        if ($mail == $row['email']) {
            header("location:https://mail.google.com/mail/u/0/#inbox");
        }
    }

    while ($row = $yahoo->fetch_assoc()) {
        echo $row['email'];
        if ($mail == $row['email']) {
            header("location:https://login.yahoo.com/?.src=ym&.lang=en-US&.intl=us&.done=https%3A%2F%2Fmail.yahoo.com%2Fd");
        } 
    }


}
?>