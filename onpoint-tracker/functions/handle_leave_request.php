<?php
require_once("../inc/conn.php");
if (isset($_POST["leave_id"])) {
    $leave_id = $_POST["leave_id"];
    $leave_status = 'P';
    if (isset($_POST["approve"])) {
        $leave_status = 'A';
    } else if (isset($_POST["reject"])) {
        $leave_status = 'R';
    }
    $update_status_query = "UPDATE leave_request
    SET leave_status = '$leave_status' 
    WHERE leave_id = $leave_id";
    if (mysqli_query($conn, $update_status_query)) {
        sleep(1);
        header("Location:../pages/teacher_leave_request.php");
    } else {
        echo "<script>alert('An error occured')</script>";
        sleep(1);
        header("Location:../pages/teacher_leave_request.php");
    }
}
