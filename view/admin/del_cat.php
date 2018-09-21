<?php
    include("../../model/function.php");
    if(isset($_GET['del_cat'])){
        echo del_cat();
    }
    if(isset($_GET['del_sub_cat'])){
        echo del_sub_cat();
    }
    if(isset($_GET['del_pro'])){
        echo del_pro();
    }
?>