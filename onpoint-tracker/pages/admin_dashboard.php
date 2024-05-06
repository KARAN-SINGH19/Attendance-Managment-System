<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
    require_once('../inc/head.php');
    ?>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        /* .dashboard-section {
            padding: 10px;
            width: 75%;
            float: right;
        } */

        .box {
            outline: none;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            margin: 20px;
            padding: 20px;
            width: 30%;
            font-size: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .bi {
            font-size: 40px;
        }

        .text-center {
            margin: 40px 0;
        }
    </style>
</head>

<body>
    <?php
    require_once('../inc/nav.php');
    ?>
    <?php
    require_once('../inc/new_sidebar_admin.php');
    ?>

    <?php
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        if ($_SESSION["role_name"] == "Administrator") {
    ?>
            <section class="dashboard-section">
                <h1 class="text-center b4">Administrator Dashboard</h1>
            </section>



            <div class="container-fluid">
                <div class="row row-cols">
                    <div class="col box">
                        Admins <br>
                        <?php
                        require('../inc/connection.php');
                        $qry = "SELECT COUNT(user_role_id) AS NumberOfAdmin FROM user where user_role_id=1;";
                        $execute = mysqli_query($conn, $qry);
                        if ($execute > 0) {
                            while ($row = mysqli_fetch_array($execute)) {
                                $no_of_admin = $row['NumberOfAdmin'];
                                echo "$no_of_admin";
                            }
                        }
                        ?>
                        <i class="bi bi-person-video3" style="color: #007bff;"></i>
                    </div>
                    <div class="col box">
                        Students <br>
                        <?php
                        require('../inc/connection.php');
                        $qry = "SELECT COUNT(user_role_id) AS NumberOfStudent FROM user where user_role_id=2;";
                        $execute = mysqli_query($conn, $qry);
                        if ($execute > 0) {
                            while ($row = mysqli_fetch_array($execute)) {
                                $no_of_student = $row['NumberOfStudent'];
                                echo "$no_of_student";
                            }
                        }
                        ?>
                        <i class="bi bi-people-fill" style="color:darkmagenta"></i>
                    </div>

                    <div class="col box">
                        Teachers <br>
                        <?php
                        require('../inc/connection.php');
                        $qry = "SELECT COUNT(user_role_id) AS NumberOfTeacher FROM user where user_role_id=3;";
                        $execute = mysqli_query($conn, $qry);
                        if ($execute > 0) {
                            while ($row = mysqli_fetch_array($execute)) {
                                $no_of_teacher = $row['NumberOfTeacher'];
                                echo "$no_of_teacher";
                            }
                        }
                        ?>
                        <i class="bi bi-people-fill" style="color: red;"></i>
                    </div>

                    <div class="col box">Terms <br> 3 <i class="bi bi-calendar" style="color: grey;"></i></div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row row-cols">
                    <div class="col box">
                        Courses <br>
                        <?php
                        require('../inc/connection.php');
                        $qry = "SELECT COUNT(course_id) AS NumberOfCourses FROM course;";
                        $execute = mysqli_query($conn, $qry);
                        if ($execute > 0) {
                            while ($row = mysqli_fetch_array($execute)) {
                                $no_of_course = $row['NumberOfCourses'];
                                echo "$no_of_course";
                            }
                        }
                        ?>
                        <i class="bi bi-hdd-stack" style="color: deeppink;"></i>
                    </div>
                    <div class="col box">
                        Modules <br>
                        <?php
                        require('../inc/connection.php');
                        $qry = "SELECT COUNT(module_id) AS NumberOfModules FROM module;";
                        $execute = mysqli_query($conn, $qry);
                        if ($execute > 0) {
                            while ($row = mysqli_fetch_array($execute)) {
                                $no_of_modules = $row['NumberOfModules'];
                                echo "$no_of_modules";
                            }
                        }
                        ?>
                        <i class="bi bi-hdd-stack" style="color: darkorange;"></i>
                    </div>

                    <div class="col box">
                        Classes <br>
                        <?php
                        require('../inc/connection.php');
                        $qry = "SELECT COUNT(class_id) AS NumberOfClass FROM class;";
                        $execute = mysqli_query($conn, $qry);
                        if ($execute > 0) {
                            while ($row = mysqli_fetch_array($execute)) {
                                $no_of_class = $row['NumberOfClass'];
                                echo "$no_of_class";
                            }
                        }
                        ?>
                        <i class="bi bi-book" style="color: green;"></i>
                    </div>
                    <div class="col box">Student Attendance<br> 40 <i class="bi bi-card-checklist" style="color: yellow;"></i> </div>
                </div>
            </div>

    <?php
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>