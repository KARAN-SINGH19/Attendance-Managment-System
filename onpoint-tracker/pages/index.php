<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onpoint Tracker</title>
    <link rel="stylesheet" href="../inc/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require_once('..\inc\head.php'); ?>
    <style>
        .navbar {
            padding: 10px
        }

        .navbar-nav .active a {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php require_once('..\inc\nav.php'); ?>
    <div class="container">
        <div class="headings">
            <h1>Welcome to Onpoint Tracker</h1>
            <h4>the only attendance management solution you need </h4>
            <h2>Built For</h2>
        </div>

        <div class="container-2">
            <div class="textboxes">
                <div class="textbox-1">
                    <h2>Students</h2>
                    <hr>
                    <ul class="ul-tag">
                        <li class="li-tag">View Attendance History</li>
                        <li class="li-tag">View Classes</li>
                        <li class="li-tag">View Absent Notifications</li>
                    </ul>
                </div>
                <div class="textbox-2">
                    <h2>Teachers</h2>
                    <hr>
                    <ul class="ul-tag">
                        <li class="li-tag">Mark and correct attendance</li>
                        <li class="li-tag">View their class and student list</li>
                        <li class="li-tag">Generate attendance report</li>
                    </ul>
                </div>
                <div class="textbox-3">
                    <h2>Admins</h2>
                    <hr>
                    <ul class="ul-tag">
                        <li class="li-tag">Mark and correct attendance</li>
                        <li class="li-tag">Enroll new teachers and students</li>
                        <li class="li-tag">User Management</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-4" style="background-color: white; color:black; font-size: 20px; font-weight:600; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); ">
            © 2023 Copyright:
            <a href="home.html" style="font-size: 20px; font: weight 600px; color:#003DB2; text-decoration:none">Onpoint
                Tracker.com</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>