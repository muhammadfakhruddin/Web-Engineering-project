<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:signin.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="calendar.css">

    <head>
        <title>Calendar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset='utf-8' />


        <link href='lib/main.css' rel='stylesheet' />
        <script src='lib/main.js'></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    googleCalendarApiKey: 'AIzaSyDFta3T0raIsjt6DvbMq51iwaVCgIPCgt0',
                    events: {
                        googleCalendarId: 'alanberamboi@gmail.com'
                    }

                });
                calendar.render();
            });
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
            <a href="logout.php"> Log Out</a><br>
        </div>
        <div class "main">
            <div class="header">
                <h1>CALENDAR</h1>
            </div>


        </div>
        </div>
        <div class="container">
            <div id='calendar'></div>
        </div>





    </body>

    </html>
<?php } ?>