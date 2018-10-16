<nav class="navbar navbar-expand-md navbar-light bg-light" style="font-weight: bolder;">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse abc" id="collapse_target">
        <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php" >Home</a></li>
<!--        <li class="nav-item"><a class="nav-link" href="cat_detail.php?new_arr">New Arrivals</a></li>-->
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#" >Catagory</a>
        <div class="dropdown-menu" aria-labelledby="dropdown_target">
            <a class="dropdown-item" ><?php 
//                include("../control/display_db.php");
                echo all_cat(); 
                ?></a>
<!--
            <a class="dropdown-item">Salwar</a>
            <a class="dropdown-item">Lehenga</a>
            <a class="dropdown-item">Accessories</a>
-->
        </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
        </ul>
        </div>
    </nav>
    