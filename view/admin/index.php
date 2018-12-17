<html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php session_start(); 
        include("pages/header.php"); ?>
        <?php include("pages/bodyleft.php"); ?>
        <?php include("pages/bodyright.php"); ?> 
        <?php include("../pages/footer.php"); ?>
      <?php 
        session_start(); 
        if(isset($_SESSION['login'])== true)
        {
             include("pages/header.php"); 
             include("pages/bodyleft.php"); 
             include("pages/bodyright.php"); 
             include("../pages/footer.php"); 
        }else{
            header("location:../login.php");
        }
      ?>
    </body>
</html>