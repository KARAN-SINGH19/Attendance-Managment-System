<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            padding: 0px;
            margin: 0px;
        }

        .sidebaractive {
            transform: translate(0%) !important;
        }

        .sidebar {
            width: 400px;
            background-color: #003DB2;
            height: 100vh;
            position: fixed;
            padding: 20px;
            box-sizing: border-box;
            left: 0;
            transform: translate(-100%);
            transition: all 0.3s linear 0s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        ul.nav-links {
            list-style: none;
            margin: 20px 0;
            padding: 0;
        }

        ul li {
            width: 100%;
        }

        ul.nav-links li a {
            display: block;
            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            background-color: #ffffff;
            color: #003DB2;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .nav-header {
            position: absolute;
            left: 10px;
            top: 18px;
            font-size: 20px;
            cursor: pointer;
            z-index: 1001;
        }

        ul.nav-links li a:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <div class="nav-header" onclick="display_nav()">
        <i class="fa fa-bars"></i>
    </div>

    <div class="sidebar">
        <ul class="nav-links">
            <li><a href="../pages/admin_dashboard.php">Home</a></li>
            <li><a href="../pages/admin_registeration.php">Add New User</a></li>
            <li><a href="../pages/admin_manage_users.php">Manage Users</a></li>
            <li><a href="../pages/admin_add_course.php">Add New Courses</a></li>
            <li><a href="../pages/admin_add_module.php">Add New Modules</a></li>
            <li><a href="../pages/admin_manage_courses.php">Manage Courses</a></li>
            <li><a href="../pages/admin_view_module.php">Edit Attendance</a></li>
            <li><a href="../pages/admin_make_announcement.php">Make Announcement</a></li>
            <li>
                <a href="../pages/admin_fetch_announcement.php">
                    <div id="notificationIcon" style="display: inline-block; margin-right: 5px;">
                        <?php
                        if (isset($_SESSION['newNotification']) && $_SESSION['newNotification']) {
                            echo '<i class="fa fa-bell" style="color: black;"></i>';
                            $_SESSION['newNotification'] = false;
                        }
                        ?>
                    </div>
                    View Announcements
                </a>
            </li>
        </ul>
    </div>

    <script src="../inc/sidebar.js"></script>
    <script>
        // Function to show the notification icon
        function showNotificationIcon() {
            document.getElementById("notificationIcon").style.display = "block";
        }
        var newNotification = <?php echo isset($_POST['Upload_Notification']) ? 'true' : 'false'; ?>;

        if (newNotification) {
            showNotificationIcon();
        }
    </script>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>