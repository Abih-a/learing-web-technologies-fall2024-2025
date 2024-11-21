<?php
    $name = $_POST['name'];
    $namepart = explode(' ', $name);
 
    if(strlen($name) == 0) {
        echo 'Cant be empty. <br>';
        return;
    }
    else if(count($namepart) < 2) {
        echo 'At least two words. <br>';
        return;
    }
    else if(!ctype_alpha($name[0])) {
        echo 'Must start with letter. <br>';
        return;
    }
    else if((!ctype_alnum(str_replace(array('-', '.', ' '), '', $name)))) {
        echo 'Only contain A-Z, a-z, . and -. <br>';
        return;
    }
   
    echo 'Name is '. $name;
 
?>