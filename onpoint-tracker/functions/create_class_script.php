<?php
session_start(); // it will start the session
require('../inc/connection.php');
if (isset($_POST['submit'])) { // the script will execute once the button is clicked
    $module_id = $_POST["module_id"];
    $class_name = $_POST["class_name"];
    $class_location = $_POST["class_location"];
    $class_date = $_POST["class_date"];
    $class_time = $_POST["class_time"];
    $insert_query = "INSERT INTO class (class_id, class_name,class_date,class_time,class_location,class_module_id) values(NULL,\"$class_name\",date(\"$class_date\"),\"$class_time\",\"$class_location\",\"$module_id\")";
    if (mysqli_query($conn, $insert_query)) {
        $class_id = mysqli_insert_id($conn);
        sleep(2);
        header("Location:../pages/teacher_mark_attendance.php?class_id=$class_id");
    } else {
        mysqli_error($con);
    }
}
