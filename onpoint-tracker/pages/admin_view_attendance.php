<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onpoint Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
    if (isset($_GET["class_id"])) {
        require_once('..\inc\head.php');
        $class_id = $_GET["class_id"] ?>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Poppins", sans-serif;
            }

            .container {
                margin: 70px;
                padding-left: 25%;
            }

            .container-fluid {
                top: 0;
                position: fixed;
                z-index: 1000;
            }
        </style>
</head>

<body>


    <?php require_once('..\inc\nav.php'); ?>

    <?php require_once('../inc/new_sidebar_admin.php');
    ?>

    <section class="container">
        <?php
        // SQL query for class details
        $class_query = "SELECT * FROM
            class
            JOIN module
            where class_id=$class_id 
            and class.class_module_id=module.module_id";
        $get_class_query = mysqli_query($conn, $class_query);
        if ($get_class_query) {
            // Iterating through results array to display details
            $class_result = mysqli_fetch_all($get_class_query);
            foreach ($class_result as $class) { ?>
                <h1>Attendance for <?php echo $class[1] ?> Class</h1>
                <div class="d-flex gap-5">
                    <h6>Date: <?php echo date('d-m-Y', strtotime($class[2])) ?></h6>
                    <h6>Time: <?php echo date('h:i a', strtotime($class[3])) ?></h6>
                    <h6>Location: <?php echo $class[4] ?></h6>
                </div>
        <?php
            }
        }
        ?>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col">
                        ID
                    </th>
                    <th scope="col">
                        First Name
                    </th>
                    <th scope="col">
                        Last Name
                    </th>
                    <th scope="col">
                        Course
                    </th>
                    <th scope="col">
                        Attendance
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_attendance_query = "SELECT
                 user_id,user_fname,user_lname,course_name,attendance_status,attendance_class_id FROM
                 `attendance`
                 JOIN
                 user,course
                 WHERE
                 attendance.attendance_student_id=user.user_id 
                 and user.user_course_id=course.course_id
                 and attendance.attendance_class_id=$class_id;
                ";
                if ($result = mysqli_query($conn, $get_attendance_query)) {
                    $attendance_rows = mysqli_fetch_all($result);
                    foreach ($attendance_rows as $attendance) { ?>

                        <tr>
                            <td>
                                <?php echo $attendance[0]; ?>
                            </td>
                            <td>
                                <?php echo $attendance[1]; ?>
                            </td>
                            <td>
                                <?php echo $attendance[2]; ?>
                            </td>
                            <td>
                                <?php echo $attendance[3]; ?>
                            </td>
                            <td>
                                <?php
                                $attendance_status = "";
                                $attendance_class = "";
                                switch ($attendance[4]) {
                                    case 'P':
                                        $attendance_status = "Present";
                                        $attendance_class = "w-100 p-2 block text-white bg-success";
                                        break;
                                    case 'L':
                                        $attendance_status = "Late";
                                        $attendance_class = "w-100 p-2 block text-white bg-warning";
                                        break;
                                    case 'A':
                                        $attendance_status = "Absent";
                                        $attendance_class = "w-100 p-2 block text-white bg-danger";
                                        break;
                                    default:
                                        $attendance_status = "Absent";
                                        break;
                                }; ?>
                                <div class="<?php echo $attendance_class ?>"><?php echo $attendance_status ?></div>
                            </td>
                        </tr>
                <?php  }
                } ?>
            </tbody>
        </table>
        <a class="btn btn-primary rounded p-2" href="../functions/generate_class_report.php?class_id=<?php echo $class_id ?>">Generate Report</a>
    </section>
<?php
    } else {
        header("Location:admin_dashboard.php");
    } ?>
</body>

</html>