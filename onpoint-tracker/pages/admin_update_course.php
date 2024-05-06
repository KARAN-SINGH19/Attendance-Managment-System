<?php
require("../inc/connection.php");
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['fname'];
    $manager_id = $_POST['manager_id'];
    $manager_name = $_POST['manager_name'];
    $qry = "UPDATE course SET course_name='$name', course_manager_id='$manager_id' where course_id='$id'";
    $result = mysqli_query($conn, $qry); 
    if ($result) {
        echo "<script>alert('Course Updated Successfully')</script>";
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
}


if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $qry = "DELETE from course where course_id='$id'";
    $result = mysqli_query($conn, $qry);
    if ($result) {
        echo "<script>alert('Course Deleted Successfully')</script>";
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
}
