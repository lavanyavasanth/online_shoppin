
       <?php 
//            session_start();
        $message = "";
           include("pages/links.php");
          include("pages/header.php");   
          include("pages/navbar.php"); 
      ?>
      <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="../control/loginprocess.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" id="uname" class="form-control" name="username" placeholder="" required autofocus>
                </div>
                <div>
				    <label for="password">Password</label>
				    <input type="password" id="pname" class="form-control" name="password" placeholder="" required>
                </div>
                
            
<!--
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
-->
                <input type="submit" class="btn btn-lg btn-primary btn-block btn-signin" value="Sign In">
               
                  
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->

      <?php include("pages/footer.php");?>  

<!--
    <footer class="text-right">
        
            <a class="nav-link" href="#" ><i class="fab fa-facebook"></i><span class="sr-only">Facebook</span></a>
              <a class="nav-link" href="#" ><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
              <a class="nav-link" href="#" ><i class="fab fa-instagram"></i><span class="sr-only">Instgram</span></a>
        
        </footer>
-->

