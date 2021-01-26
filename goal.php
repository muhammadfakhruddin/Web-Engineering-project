<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:signin.htm");
} else {
    $mail = $_SESSION['email'];
?>
    <!DOCTYPE html>
    <html>

    <head>


        <title>GOAL</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="" href="goal.css">
    </head>

    <body>

        <div class="sidebar">
            <br><br><br>
            <a href="dashboard.php"> Dashboard</a><br><br><br>
            <a href="email.php"> Email</a><br>
            <a href="calendar.php"> Calendars</a><br>
            <a href="appoinment.php"> Appoinment</a><br>
            <a href="todo.php"> To Do List</a><br>
            <a href="goal.php"> Goals</a><br>
            <br><br><br><br><br><br><br><br><br><br>
            <a href="logout.php"> Log Out</a><br>
        </div>


        <div class "main">
            <div class="header">
                <h1>GOALS</h1>
            </div>
            <div class="container">
                <?php require_once('goaladd.php'); ?>
                <?php
                if (isset($_SESSION['message'])) {
                ?>

                    <div class="alert alert-<?php echo $_SESSION['msg_type'] ?>">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>

                <?php } ?>
                <?php $mysqli = new mysqli('localhost', 'root', '', 'web');
                $result = $mysqli->query("SELECT * FROM goals WHERE email = '$mail'") or die($mysqli->error);
                //pre_r($result);
                // pre_r($result->fetch_assoc());
                ?>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>GOAL LIST</th>
                                <th colspan="5">ACTION</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row['goal']; ?>
                                </td>
                                <td>
                                    <a href="goaladd.php?delete=<?php echo $row['id']; ?>">DELETE</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>


                <br>
                <br>
                <div class="row justify-content-center">
                    <form action=" goaladd.php" method="POST">
                        <div class="form-group ">
                            <label>Goal List</label><br>
                            <input type="text " placeholder="Enter Goal " class="form-control " name="goal">
                        </div><br><br>
                        <div class="form-group ">
                            <button type="submit " name="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>