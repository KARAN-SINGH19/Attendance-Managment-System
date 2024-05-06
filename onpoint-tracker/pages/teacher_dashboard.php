<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teacher Dashboard</title>
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
    require_once('../inc/nav.php');
    ?>
    <main class="">
        <?php
        require_once('..\inc\teacher_sidebar.php');
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
            if ($_SESSION["role_name"] == "Teacher") {
        ?>
                <section class="dashboard-section">
                    <h1 class="text-center">Teacher Dashboard</h1>
                </section>
        <?php
            } else {
                header("Location:index.php");
            }
        } else {
            header("Location:index.php");
        } ?>
    </main>
</body>

</html>