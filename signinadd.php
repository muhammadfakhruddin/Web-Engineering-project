<?php

$mysqli = new mysqli('localhost', 'root', '', 'web');

if (isset($_POST["submit"])){
    if(!empty($_POST['email'] ) && !empty($_POST['password'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $mysqli->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

        while ($row = $query->fetch_assoc()) {
            $dbemail = $row['email'];
            $dbpassword = $row['password'];


        }
        if ($email == $dbemail) {
            echo $row['email'];
            session_start();
            $_SESSION['email'] = $email;
            header('Location:dashboard.php');
        }
        if ($email != $dbemail) {
            header('Location:signin.php');
        }
    }
}else{
    echo "All Fields Are Required";
}
