<?php
include("../model/db.php");
if(isset($_POST["user_name"])){
    $stmt = $conn->prepare("SELECT * FROM user WHERE Username = :username");
    $stmt->execute();
    $rows = $stmt ->fetch();
    if($rows->rowCount() > 0){
        echo '<span class = "text-danger">Username already exist!!! Choose someother name!!!!</span>';
    }else{
        echo '<span class = "text-danger">Username not exist</span>';
    }
}
?>
