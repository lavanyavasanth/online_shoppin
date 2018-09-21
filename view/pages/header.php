<?php
    session_start();
    include('../model/function.php');
?> 
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="font-weight: bolder;">
            <a class="navbar-brand" href="index.php" style="font-weight:bolder; color: #dc3545;">Lavanya's Boutique</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFour" aria-controls="navbarFour" aria-expanded="false" aria-label="Togglenavigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarFour">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item" id="search_btn"><a class="nav-link" href="#"><i class="fas fa-search"></i><strong>Search</strong></a></li>
        <li class="nav-item"><a class="nav-link" href="reg.php"><i class="fas fa-arrow-right"></i><strong>Register</strong></a>
        </li>
            <?php
                if(!userLoggedIn()){
                    echo '<li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-user"></i><strong>Login</strong></a></li>';
                }
            ?>
        
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-save"></i><strong>Order History</strong></a></li>
        <li class="nav-item" id="cart_btn"><a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i><strong>Cart</strong></a></li>
            <?php
            if(userLoggedIn()){
                echo'<li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-user"></i><strong>Logout</strong></a></li>';
            }
             ?>
        </ul>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0px; background: #dc3545;">
        <div class="container">
        <h1>Lavanya's Boutique</h1>
        <p>Your fashion Defines you</p>
        </div>
    </div> 