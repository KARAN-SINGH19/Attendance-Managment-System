<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Course</title>
    <link rel="stylesheet" href="../inc/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
    require_once('../inc/head.php');
    require('../inc/conn.php');
    ?>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            padding: 10px
        }

        .navbar-nav .active a {
            font-weight: bold;
        }

        .name {
            background-color: #B3BFB8;
            display: flex;
            gap: 20px;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .box {
            border-radius: 10px;
            height: 40px;
            width: 450px;
            padding-left: 10px;
        }

        .btn-primary,
        .btn-primary:active,
        .btn-primary:visited {
            background-color: #003DB2 !important;
        }

        .btn-primary:hover {
            background-color: #004ED2 !important;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .container {
            padding-left: 300px;
        }

        h1 {
            text-align: center;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-body {
            flex: 1;
        }

        .btn-primary {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <?php require_once('../inc/nav.php'); ?>
    <?php require_once('../inc/new_sidebar_admin.php');
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        if ($_SESSION["role_name"] == "Administrator") { ?>
            <section class="container">
                <h1 class="mb-5">List of Modules</h1>
                <div class="grid mt-5">
                    <?php
                    $tutor_id = $_SESSION["user_id"];
                    $select_query = "SELECT module_id,module_name,user_fname,user_lname,course_name FROM module,user,course where user.user_id=module.module_tutor_id and module.module_course_id=course.course_id";
                    $get_query = mysqli_query($conn, $select_query);

                    if ($get_query) {
                        $result = mysqli_fetch_all($get_query);
                        foreach ($result as $module) { ?>
                            <div class="card" style="min-width: 20rem;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSidSLsWeNsdEBZS_EPIMR0YuzI5bE6nzXWBA&usqp=CAU" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo "$module[1] " ?></h5>
                                    <p class="card-subtitle"><b>Tutor: </b><?php echo "$module[2] $module[3]" ?></p>
                                    <p class="card-text"><b>Course: </b><?php echo "$module[4]" ?></p>
                                    <a href="admin_view_class.php?module_id=<?php echo $module[0]; ?>" class="btn btn-primary">View class</a>
                                </div>
                            </div>
            <?php
                        }
                    }
                } else {
                    header("Location:index.php");
                }
            } else {
                header("Location:index.php");
            }
            ?>
                </div>
            </section>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>

</body>

</html>