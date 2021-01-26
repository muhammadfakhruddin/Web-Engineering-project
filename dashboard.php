<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:signin.php");
} else {


    $con = mysqli_connect('localhost', 'root', '', 'web');

    $list = mysqli_query($con, "SELECT * FROM list");
    $goal = mysqli_query($con, "SELECT * FROM goals");
    $appoinment = mysqli_query($con, "SELECT * FROM appoinment");


?>
    <!DOCTYPE html>
    <html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dashboard.css">

    <head>
        <title>Personal Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                    ['TASK', 'list', 'goal', 'appoinment'],
                    <?php
                    $l = mysqli_num_rows($list);
                    $g = mysqli_num_rows($goal);
                    $a = mysqli_num_rows($appoinment);
                    $task = "Task";
                    $i = 10;
                    echo "['" . $task . "','" . $g . "','" . $l . "','" . $a . "'],";
                    ?>
                ]);

                var options = {
                    width: 500,
                    legend: {
                        position: 'none'
                    },
                    chart: {

                    },
                    axes: {
                        x: {
                            0: {

                            } // Top x-axis.
                        }
                    },
                    bar: {
                        groupWidth: "90%"
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                // Convert the Classic options to Material options.
                chart.draw(data, google.charts.Bar.convertOptions(options));
            };
        </script>
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
            <a href="logout.php"> Log Out</a>
        </div>

        <div class="main">

            <div class="header">
                <h1>PERSONAL DASHBOARD</h1>
                <br>
            </div>
            <div class="row">
                <div class="column">
                    <div id="top_x_div" style="width: 800px; height: 600px;"></div>
                </div>
                


                <br>

            </div>
            <br>
        </div>
    </body>

    </html>
<?php
}
?>