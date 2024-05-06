<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onpoint Tracker</title>
    <link rel="stylesheet" href="../inc/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
    require_once('..\inc\head.php'); ?>
    <style>
        .navbar {
            padding: 10px
        }

        .navbar-nav .active a {
            font-weight: bold;
        }

        .container {
            padding-left: 25%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <?php require_once('..\inc\nav.php'); ?>
    </div>
    <?php require_once('..\inc\teacher_sidebar.php');
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        if ($_SESSION["role_name"] == "Teacher") {

    ?>
            <main class="container">
                <h1>Announcements</h1>
                <section>
                    <?php
                    $select_query = "SELECT * FROM notification ORDER BY notification_id DESC";
                    $result = mysqli_query($conn, $select_query);
                    $notifications = mysqli_fetch_all($result);
                    foreach ($notifications as $notification) { ?>
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading"><?php echo "$notification[1]"; ?></h4>
                            <p><?php echo "$notification[2]"; ?></p>
                            <p><?php echo date("d/m/Y", strtotime($notification[3])); ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </section>
        <?php
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    } ?>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>

</body>

</html>