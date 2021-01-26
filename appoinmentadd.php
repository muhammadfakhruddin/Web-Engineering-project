<?php

require_once('appoinment.php');
    $mysqli = new mysqli('localhost', 'root', '', 'web');

    if (isset($_POST["save"])) {
        $detail = $_POST["detail"];
        $location = $_POST["location"];
        $date = $_POST["date"];
        $mail = $_SESSION['email'];
  
        $_SESSION['message'] = "RECORD HAS BEEN SAVED";
        $_SESSION['msg_type'] = "success";

        $mysqli->query("INSERT INTO appoinment (`detail`, `location`, `date`,`email`) VALUES('$detail', '$location', '$date','$mail')") or die(mysqli_error($mysqli));

        header("Location:appoinment.php");
    }

    if (isset($_GET["delete"])) {

        $id = $_GET["delete"];

        $_SESSION['message'] = "RECORD HAS BEEN DELETED";
        $_SESSION['msg_type'] = "warning";

        $mysqli->query("DELETE FROM appoinment WHERE id=$id") or die(mysqli_error($mysqli));

        header("Location:appoinment.php");
    }


?>