<?php 
    include("pages/links.php");
    include("pages/header.php");   
    include("pages/navbar.php");       
?>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Thank you for Sign Up!</div>
                <div class="panel-body">
                    <form role="Form" method="POST" action="../control/regprocess.php" accept-charset="UTF-8">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" id="uname" class="form-control" name="username" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="pname" class="form-control" name="password" placeholder="" autocomplete="off">
                        </div>
						<div class="form-group">
							<label for="firstname">FirstName</label>
							<input type="text" id="fname" class="form-control" name="firstname" placeholder="" autocomplete="off">
                        </div>
						<div class="form-group">
							<label for="lastname">LastName</label>
							<input type="text" id="lname" class="form-control" name="lastname" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
							<label for="email">Email</label>
							<input type="text" id="email" class="form-control" name="email" placeholder="" autocomplete="off">
                        </div>
						<div class="form-group">
							<label for="verifypass">Role</label>
							<input type="text" id="role" class="form-control" name="role" placeholder="" autocomplete="off">
                        </div>
						<div class="form-group text-center">
							<input type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit" value="signup">
                        </div>
                    </form>
<?php
        if(!isset($_GET['reg'])){
            exit();
        }
        else
        {
            $regCheck = $_GET['reg'];

            if($regCheck == "empty"){
                echo"<div style='color: red; text-align: center; font-family: bolder; font-size: 35px;'>Fill in all fields!!!</div>";
                exit();
            }
            elseif($regCheck == "char"){
                echo"<div style='color: red; text-align: center; font-family: bolder; font-size: 35px;'>Used invalid characters!!!
                </div>";
                exit();
            }
            elseif($regCheck == "email"){
                echo"<div style='color: red; text-align: center; font-family: bolder; font-size: 35px;'>Invalid Email!!!</div>";
                exit();
            }
             elseif($regCheck == "success"){
                echo"<div style='color: Green; text-align: center; font-family: bolder; font-size: 35px;'>Login Successfull!!!</div>";
                exit();
            }
        }
?>
                </div>
            </div>
        </div>          
    </div>


      <?php include("pages/footer.php");?>  
      
  
<!--
    <footer class="text-right">
        
            <a class="nav-link" href="#" ><i class="fab fa-facebook"></i><span class="sr-only">Facebook</span></a>
              <a class="nav-link" href="#" ><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
              <a class="nav-link" href="#" ><i class="fab fa-instagram"></i><span class="sr-only">Instgram</span></a>
        
        </footer>
-->
