<?php
require_once('todo.php');
$mysqli = new mysqli('localhost', 'root', '', 'web');

if (isset($_POST["save"])) {

    $list = $_POST["list"];
    $mail = $_SESSION['email'];
    $_SESSION['message']= "RECORD HAS BEEN SAVED";
    $_SESSION['msg_type']="success";
    
    $mysqli->query("INSERT INTO list (`todo`, `email`) VALUES('$list','$mail')") or die(mysqli_error($mysqli));

    header("Location: todo.php");
}

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $_SESSION['message'] = "RECORD HAS BEEN DELETED";
    $_SESSION['msg_type'] = "warning";

    $mysqli ->query ("DELETE FROM list WHERE id = $id");

    header("Location: todo.php");
}