<?php
require_once('goal.php');
$mysqli = new mysqli('localhost', 'root', '', 'web');

if (isset($_POST["save"])) {

    $goal = $_POST["goal"];
    $mail = $_SESSION['email'];

    $_SESSION['message'] = "RECORD HAS BEEN SAVED";
    $_SESSION['msg_type'] = "success";

    $mysqli->query("INSERT INTO goals (goal,email) VALUES('$goal','$mail')") or die(mysqli_error($mysqli));

    header("Location: goal.php");
}

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];

    $_SESSION['message'] = "RECORD HAS BEEN DELETED";
    $_SESSION['msg_type'] = "warning";

    $mysqli->query("DELETE FROM goals WHERE id = $id");

    header("Location: goal.php");
}