<?php
session_start();

require("../inc/conn.php");

if (isset($_POST['Upload_Announcement'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $qry = "INSERT INTO notification (notification_title, notification_messsage) VALUES ('$title', '$message');";
    $result = mysqli_query($conn, $qry);

    if ($result) {
        $_SESSION['newNotification'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Sorry, an error occurred: " . mysqli_error($conn) . "');</script>";
    }
}
