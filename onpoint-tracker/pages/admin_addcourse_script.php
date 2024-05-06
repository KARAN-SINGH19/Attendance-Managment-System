<?php
require("../inc/connection.php");
if (isset($_POST['addcourse'])) {
    $course_name = $_POST['coursename'];
    $course_tutor = $_POST['course_tutor'];
    $sql = "INSERT INTO course (course_name, course_manager_id) values ('$course_name','$course_tutor')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('New user Registered Successfuly')</script>";
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
}

