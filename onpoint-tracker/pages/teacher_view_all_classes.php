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
            padding: 0 10px;
        }

        .btn-outline-primary,
        .btn-outline-primary:active,
        .btn-outline-primary:visited {
            border-color: #003DB2 !important;
            color: #003DB2 !important;
        }

        .btn-outline-primary:hover {
            color: #FFFFFF !important;
            background-color: #004ED2 !important;
        }

        .btn-primary,
        .btn-primary:active,
        .btn-primary:visited {
            background-color: #003DB2 !important;
        }

        .btn-primary:hover {
            background-color: #004ED2 !important;
        }

        .container {
            padding-left: 20%;
        }

        .container-fluid {
            top: 0;
            position: fixed;
            z-index: 1000;
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

            <section class="container">
                <h1 class="mb-5">
                    Classes
                </h1>
                <h3 class="mt-5">All Classes for <?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"] ?></h3>

                <table class="table">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">
                                Module
                            </th>
                            <th scope="col">
                                Class Date
                            </th>
                            <th scope="col">
                                Class Time
                            </th>
                            <th scope="col">
                                Class Name
                            </th>
                            <th scope="col">
                                Class Location
                            </th>
                            <th scope="col">
                                Present
                            </th>
                            <th scope="col">
                                Late
                            </th>
                            <th scope="col">
                                Absent
                            </th>
                            <th scope="col">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tutor_id = $_SESSION["user_id"];
                        $select_query = "SELECT
                class.class_id,
                class.class_date,
                class.class_time,
                class.class_name,
                class.class_location,
                SUM(attendance_status='P') as present,
                SUM(attendance_status='L') as late,
                SUM(attendance_status='A') as absent,
                class.class_module_id,
                module.module_name
                FROM
                    class
                JOIN
                    attendance,module
                WHERE
                    attendance.attendance_class_id=class.class_id
                    and class.class_module_id=module.module_id
                    and module.module_tutor_id = $tutor_id
                GROUP BY
                    attendance_class_id
                ORDER BY
                    class.class_date DESC;";
                        $get_query = mysqli_query($conn, $select_query);
                        if ($get_query) {
                            $result = mysqli_fetch_all($get_query);
                            foreach ($result as $attendance) {
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $attendance[9]; ?>
                                    </td>
                                    <td>
                                        <?php echo date('d-m-Y', strtotime($attendance[1])); ?>
                                    </td>
                                    <td>
                                        <?php echo date('h:i A', strtotime($attendance[2])); ?>
                                    </td>
                                    <td>
                                        <?php echo $attendance[3]; ?>
                                    </td>
                                    <td>
                                        <?php echo $attendance[4]; ?>
                                    </td>
                                    <td>
                                        <?php echo $attendance[5]; ?>
                                    </td>
                                    <td>
                                        <?php echo $attendance[6]; ?>
                                    </td>
                                    <td>
                                        <?php echo $attendance[7]; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="teacher_edit_attendance.php?class_id=<?php echo $attendance[0] ?>">Edit</a>
                                        <a class="btn btn-outline-primary" href="teacher_view_attendance.php?class_id=<?php echo $attendance[0] ?>">View</a>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
        <?php
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    } ?>
            </section>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>

</body>

</html>