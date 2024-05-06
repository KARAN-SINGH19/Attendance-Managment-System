<?php
require("../inc/connection.php");
if (isset($_POST['addmodule'])) {
    $module_name = $_POST['modulename'];
    $module_course = $_POST['module_course'];
    $module_tutor = $_POST['module_tutor'];

    $qry = "INSERT into module (module_name, module_course_id, module_tutor_id) values ('$module_name', '$module_course', '$module_tutor')";
    $result = mysqli_query($conn, $qry);

    if ($result) {
        echo "<script>alert('New user Registered Successfuly')</script>";
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
}
