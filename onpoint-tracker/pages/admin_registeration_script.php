<?php
session_start(); // it will start the session
require('../inc/connection.php'); // it will include the con.php file
if (isset($_POST['Register'])) { // the script will execute once the button is clicked

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $role = $_POST['role'];
    $course = $_POST['course'];

    $sql = "INSERT into user (user_fname, user_lname, user_email, user_password, user_role_id, user_course_id) VALUES ('$fname', '$lname', '$email', '$pass', '$role', '$course')";

    $result = mysqli_query($conn, $sql); // will execute the query

    if ($result) {
        echo "<script>alert('New user Registered Successfuly')</script>";
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('Sorry an error occured')</script>";
    }
}
