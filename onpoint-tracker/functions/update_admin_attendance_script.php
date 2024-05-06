<?php
session_start(); // it will start the session
require('../inc/connection.php');
if (isset($_POST['submit'])) { // the script will execute once the button is clicked
    $student_ids = $_POST['student_id'];
    $class_id = $_POST['class_id'];
    $module_id = $_POST['module_id'];
    foreach ($student_ids as $student_id) {
        if (isset($_POST["attendance_" . $student_id])) {
            // echo $student_id." ".$_POST["attendance_".$student_id]." ".$class_id."<br>";
            $attendance_status = $_POST["attendance_" . $student_id];
            $update_query = "UPDATE attendance
        SET attendance_status = '$attendance_status' WHERE attendance_student_id=$student_id and attendance_class_id=$class_id";
            if (mysqli_query($conn, $update_query)) {
                echo "Attendance saved successfully \n";
            } else {
                mysqli_error($con);
            }
        }
    }
    sleep(2);
    header("Location:../pages/admin_view_class.php?module_id=$module_id");;
} else {
    header("Location:../pages/index.php");
}
