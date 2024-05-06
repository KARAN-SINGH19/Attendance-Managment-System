<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once('..\inc\head.php');
    ?>
    <style>
        .dashboard-section {
            padding: 10px;
            width: 75%;
            float: right;
        }
    </style>
</head>

<body class="">
    <?php
    require_once('..\inc/nav.php');
    ?>
    <main class="">
        <?php
        require_once('..\pages\student_sidebar.php');
        ?>
        <section class="dashboard-section">
            <h1 class="text-center">Student Dashboard</h1>

            <!-- Add the image tag here -->
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4HWtV4WzpgpB_fyR0ifsHJuvoX3LsLwm0RElj0MeQyrbSPOX7JA&s" alt="Image from URL" style="width: 100%; max-width: 100%;">
        </section>

    </main>
</body>

</html>