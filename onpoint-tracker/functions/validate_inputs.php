<?php
// Function to trim the inputs
function trimInput($input){
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
}
 // Function to validate name
function validateName($name){
    if(preg_match("/^[a-zA-Z-' ]*$/",$name)){
        return true;
    }
    else{
        return false;
    }
}
?>