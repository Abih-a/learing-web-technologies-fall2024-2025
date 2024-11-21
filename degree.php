<?php
    $ssc = $hsc = $bsc = $msc = '';
    $count = 0;
    if(isset($_POST['ssc'])) {$ssc = $_POST['ssc']; $count++;}
    if(isset($_POST['hsc'])) {$hsc = $_POST['hsc']; $count++;}
    if(isset($_POST['bsc'])) {$bsc = $_POST['bsc']; $count++;}
    if(isset($_POST['msc'])) {$msc = $_POST['msc']; $count++;}
 
    if($count < 2) {
        echo '2 box must be selected';
        return;
    }
 
    echo "Your degree(s) are {{$ssc} {$hsc} {$bsc} {$msc}}";
?>