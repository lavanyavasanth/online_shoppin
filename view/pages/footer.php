<!--
<div class="footer">
    <p>Copyright 2018 @copy; Lavanya Boutique</p>
</div>
-->
<div class="container">
<!--<h3>Multi-Coloured</h3>-->
    <hr>
        <div class="text-center center-block">
            <p class="txt-railway">- Copyright 2018 @copy; Lavanya Boutique -</p>
            <br />
                <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
        </div>
        <div class="policy" style="float: right;">
                <a href="../view/policy.php" style="padding:10px;">Refund Policy</a>
                <a href="../view/termCon.php" style="padding:10px;">Terms and Conditions</a>
                <a href="../view/priPolicy.php" style="padding:10px;">Privacy Policy</a>
            
        </div>
    
    
<?php
//    session_start();
    echo "<div>";
    if(isset($_SESSION['error'])){
        echo"<div>{$_SESSION['error']}</div>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['message'])){
        echo"<div>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
    }
    echo "</div>";
    echo "<div>";
    print_r($_SESSION);
    echo "</div><div>";
    print_r($_GET);
    echo "</div><div>";
    print_r($_POST);
    echo"</div>";
?>


    <hr>
</div>

<br />