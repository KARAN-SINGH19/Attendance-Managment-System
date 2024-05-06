<?php
require_once("../inc/conn.php");
if (isset($_POST["message"]) && isset($_POST["submit"])) {
    $notification_message = $_POST["message"];
    $notification_title = $_POST["title"];
    echo var_export($notification_message);
    $insert_query = "INSERT INTO notification VALUES (NULL,'$notification_message','$notification_title',DEFAULT)";
    if (mysqli_query($conn, $insert_query)) {
        sleep(1);
        header("Location:../pages/teacher_view_announcements.php");
    } else {
        echo mysqli_error($conn);
        sleep(3);
        header("Location:../pages/teacher_dashboard.php");
    }
} else {
    header("Location:../pages/index.php");
}
