<?php
    if(!isset($_POST['group'])){
        echo 'Must be selected one';
        return;
    }
    $group = $_POST['group'];
    echo "Your Blood group is {$group}";
?>