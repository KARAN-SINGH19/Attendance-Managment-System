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

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .button {
            border: none;
            padding: 20px;
            border-radius: 10px;
            width: 33%;
        }

        .green {
            background-color: #00DF5D;
        }

        .red {
            background-color: #D90404;

        }

        .yellow {
            background-color: #E7DF13;

        }

        .container {
            padding-left: 20%;
        }

        .container-fluid {
            top: 0;
            position: fixed;
            z-index: 1000;
        }

        .radio {
            padding: 10px;
            display: flex;
            flex-direction: row;
            gap: 5px;
            border-radius: 15px;
            min-width: 30%;
            color: white;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        .radio>label {
            width: 100%;
        }
    </style>
</head>

<body>

    <?php require_once('..\inc\nav.php'); ?>

    <?php require_once('../inc/new_sidebar_admin.php'); ?>
    <section class="container">
        <?php
        $class_id = $_GET["class_id"];
        $module_course_id = 0;
        $module_id = 0;
        // SQL query for class details
        $class_query = "SELECT * FROM
            class
            JOIN module
            JOIN user
            where class_id=$class_id 
            and class.class_module_id=module.module_id
            and module.module_tutor_id=user.user_id";
        $get_class_query = mysqli_query($conn, $class_query);
        // Getting details of the current class
        if ($get_class_query) {
            // Iterating through results array to display details
            $class_result = mysqli_fetch_all($get_class_query);
            foreach ($class_result as $class) {
                // Setting module and class id
                $module_id = $class[6];
                $module_course_id = $class[8]
        ?>
                <h1 class=""><?php echo "$class[7] Attendance"; ?></h1>
                <h5><?php echo "$class[1]"; ?></h5>
                <ul class="d-flex gap-5 p-0" style="list-style-type: none;">
                    <li><b>Date:</b> <?php echo date('d-m-Y, l', strtotime($class[2])); ?></li>
                    <li><b>Time:</b> <?php echo date('h:i A', strtotime($class[3])); ?></li>
                    <li><b>Location:</b> <?php echo "$class[4]"; ?> </li>
                    <li><b>Tutor:</b> <?php echo "$class[11] $class[12]"; ?></li>
                </ul>
        <?php }
        } ?>
        <form action="../functions/update_admin_attendance_script.php" method="POST">
            <!-- Hidden inputs to send class id and module id to script -->
            <input type="hidden" name="class_id" value="<?php echo $class_id ?>">
            <input type="hidden" name="module_id" value="<?php echo $module_id ?>">
            <div class="mt-5">
                <div class="row">
                    <?php
                    $students_query = "SELECT user_id,user_fname,user_lname,attendance_status
                    from user
                    JOIN attendance
                    WHERE user.user_id = attendance.attendance_student_id
                    AND attendance.attendance_class_id = $class_id";
                    $get_students_query = mysqli_query($conn, $students_query);
                    if ($get_students_query) {
                        $student_result = mysqli_fetch_all($get_students_query);
                        foreach ($student_result as $student) {
                            $attendance_status = $student[3];
                    ?>
                            <div class="col-4 mb-5">
                                <input type="hidden" name="student_id[]" value="<?php echo $student[0] ?>">
                                <div class="name">
                                    <h5><?php echo "$student[0]"; ?></h5>
                                    <h5><?php echo "$student[1] $student[2]"; ?></h5>
                                </div>
                                <div class="buttons">
                                    <div class="radio green">
                                        <?php
                                        echo "<input type=\"radio\" id=\"present_$student[0]\" name=\"attendance_$student[0]\" value=\"P\" required ";
                                        if ($attendance_status == 'P') {
                                            echo "checked";
                                        }
                                        echo ">"
                                        ?>
                                        <label for="<?php echo "present_$student[0]" ?>">Present</label>
                                    </div>
                                    <div class="radio yellow">
                                        <?php
                                        echo "<input type=\"radio\" id=\"late_$student[0]\" name=\"attendance_$student[0]\" value=\"L\" required ";
                                        if ($attendance_status == 'L') {
                                            echo "checked";
                                        }
                                        echo ">"
                                        ?>
                                        <label for="<?php echo "late_$student[0]" ?>">Late</label>
                                    </div>
                                    <div class="radio red">
                                        <?php
                                        echo "<input type=\"radio\" id=\"absent_$student[0]\" name=\"attendance_$student[0]\" value=\"A\" required ";
                                        if ($attendance_status == 'A') {
                                            echo "checked";
                                        }
                                        echo ">"
                                        ?>
                                        <label for="<?php echo "absent_$student[0]" ?>">Absent</label>
                                    </div>
                                </div>
                            </div>
                    <?php   }
                    }
                    ?>

                </div>

            </div>
            <button class="mt-5 btn btn-primary" name="submit" type="submit" value="submit">Save Edit</button>
            <a class="mt-5 btn btn-danger" href="admin_dashboard.php">Cancel Edit</a>
        </form>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>