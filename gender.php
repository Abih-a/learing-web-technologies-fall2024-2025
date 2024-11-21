<?php
    if(!isset($_POST['gender'])){
        echo 'Must be selected one';
        return;
    }
   
    $gender = $_POST['gender'];
    echo "your gender is " . $gender;
?>