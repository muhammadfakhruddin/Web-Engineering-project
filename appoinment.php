<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:signin.php");
} else {
    $mail = $_SESSION['email'];
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="appointment.css">
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
                <h1>APPOINTMENT</h1>
            </div>

            <?php require_once("appoinmentadd.php") ?>

            <?php $mysqli = new mysqli('localhost', 'root', '', 'web');
            $result = $mysqli->query("SELECT * FROM appoinment WHERE email = '$mail'") or die($mysqli->error); ?>

            <div class="container">
                <?php if (isset($_SESSION['message'])) { ?>

                    <div class="alert alert-<?php echo $_SESSION['msg_type'] ?>">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php } ?>
                <div class="row justify-content-center">
                    <form action="appoinmentadd.php" method="post">
                        <div class="form-group">
                            <label for="adetail">Appointment Detail:</label>
                            <input type="text" name="detail" class="form-control "><br>
                            <label for="alocation">Appointment Location:</label>
                            <input type="text" name="location" class="form-control "><br>
                            <label for="adate">Appointment Date:</label>
                            <input type="date" name="date" class="form-control "><br><br><br>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="save">Make Appointment</button>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Appointment Detail</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['detail']; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><a href="appoinment.php?delete=<?php echo $row['id']; ?>">DELETE</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>//container
        </div>//main

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>

<?php } ?>