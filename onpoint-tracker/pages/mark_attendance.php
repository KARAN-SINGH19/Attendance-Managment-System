<?php
require("../inc/connection.php");
if (isset($_POST['Present'])) {
    $id = $_POST['stud_id'];
    $qry = "INSERT into attendance (attendance_student_id, attendance_class_id, attendance_status) values ('$id', '1', 'PRESENT');";
    $result = mysqli_query($conn, $qry);
    if ($result) {
        echo "<script>alert('Attendance Marked Successfuly')</script>";
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
} else if (isset($_POST['Late'])) {
    $id = $_POST['stud_id'];
    $qry = "INSERT into attendance (attendance_student_id, attendance_class_id, attendance_status) values ('$id', '1', 'LATE');";
    $result = mysqli_query($conn, $qry);
    if ($result) {
        echo "<script>alert('Attendance Marked Successfuly')</script>";
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
} else if (isset($_POST['Absent'])) {
    $id = $_POST['stud_id'];
    $qry = "INSERT into attendance (attendance_student_id, attendance_class_id, attendance_status) values ('$id', '1', 'ABSENT');";
    $result = mysqli_query($conn, $qry);
    if ($result) {
        echo "<script>alert('Attendance Marked Successfuly')</script>";
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
}

