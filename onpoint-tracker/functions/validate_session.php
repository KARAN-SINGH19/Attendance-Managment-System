<?php
if(isset($_SESSION['logged_in']) && isset($_SESSION['user_details'])){
    if($_SESSION['user_details']['role']=="Administrator"){
        header("Location:admin_dasboard.php"); 
    }
    elseif($_SESSION['user_details']['role']=="Teacher"){
        header("Location:teacher_dasboard.php"); 
    }
    elseif($_SESSION['user_details']['role']=="Student"){
        header("Location:student_dasboard.php"); 
    }
}
?>