<?php
    session_start();
    include('../model/function.php');
    include('../control/display_db.php');

?> 
<script>
function save(){
    var fieldValue = document.getElementById('search_box').value;
    localStorage.setItem('text',fieldValue);
}
function load(){
    var storedValue = localStorage.getItem('text');
    if(storedValue){
        document.getElementById('search_box').value = storedValue;
    }
}

</script>
<div class="container-fluid">
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="font-weight: bolder;">
            <a class="navbar-brand" href="index.php" style="font-weight:bolder; color: #dc3545;">Lavanya's Boutique</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFour" aria-controls="navbarFour" aria-expanded="false" aria-label="Togglenavigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarFour">
        <ul class="nav navbar-nav ml-auto">
<!--        <li class="nav-item" id="search_btn"><a class="nav-link" href="#"><i class="fas fa-search"></i><strong>Search</strong></a></li>-->
        <?php
        if(!userLoggedIn()){
        echo'<li class="nav-item"><a class="nav-link" href="reg.php"><span class="glyphicon glyphicon-arrow-right"></span><strong>Register</strong></a>
        </li>';
        }
        ?>
            <?php
                if(!userLoggedIn()){
                    echo '<li class="nav-item"><a class="nav-link" href="login.php"><span class="glyphicon glyphicon-user"></span><strong>Login</strong></a></li>';
                }
            ?>
        
<!--        <li class="nav-item"><a class="nav-link" href="#"><span class="glyphicon glyphicon-save"></span><strong>Order History</strong></a></li>-->
            
            
        <li class="nav-item" id="cart_btn"><a id = "cart-popover" class="nav-link" data-placement = "bottom" title="shopping cart" href="../view/cart.php">
            <span class="glyphicon glyphicon-shopping-cart"></span><strong>Cart </strong>
            <span class="badge"> <?php echo cart_count(); ?></span>
            </a></li>
            
            <?php
            if(userLoggedIn()){
                echo'<li class="nav-item"><a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-user"></span><strong>Logout</strong></a></li>';
            }
             ?>
        </ul>
        </div>
        
        <div id="search"  onload="load()">
            <form method="get" enctype="multipart/form-data" action="../view/search.php">
                <input type="text" id="search_box" name="user_query" placeholder="search here...">
                <button name="search" id="search_btn" onclick="save()">Search</button>
            </form>
        </div>
    </nav>
   

   
    <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0px; background: #dc3545;">
        <div class="container">
        <h1>Lavanya's Boutique</h1>
        <p>Your fashion Defines you</p>
        </div>
    </div> 
</div>

