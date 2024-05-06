<?php
session_start(); // it will start the session
require('../inc/connection.php');
if (isset($_POST['submit'])) { // the script will execute once the button is clicked
    $student_ids= $_POST['student_id'];
    $class_id = $_POST['class_id'];
    $module_id = $_POST['module_id'];
    foreach($student_ids as $student_id){
        if(isset($_POST["attendance_".$student_id]))
        {
        // echo $student_id." ".$_POST["attendance_".$student_id]." ".$class_id."<br>";
        $attendance_status = $_POST["attendance_".$student_id];
        $insert_query = "INSERT INTO attendance (attendance_id,attendance_student_id,attendance_class_id,attendance_status) VALUES (NULL,$student_id,$class_id,'$attendance_status')";
        if(mysqli_query($conn,$insert_query)){
            echo "Attendance saved successfully \n";
        }
        else{
            mysqli_error($con);
        }
        }
    }
    sleep(2);
    header("Location:../pages/teacher_add_class.php?module_id=$module_id");
    ;
}
?>