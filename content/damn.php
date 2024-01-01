<?php
    if(isset($_POST['weapon'])){
        $n=$_POST["weapon"];
        $all=implode(",",$n);
        echo $all;
    }else{
        echo "no";
    }
    
?>