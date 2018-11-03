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
<!--        <li class="nav-item"></li>-->
<!--        <li style="padding-left:900px;padding-top:16px;"><strong>Username:</strong> <?php  echo $_SESSION['username'];?></li>-->
        </ul>
       
        </div>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Contact US</button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Contact US</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div><i class="fas fa-envelope"></i>&nbsp;lavanboutique@gmail.com</div>
              <div><i class="fas fa-phone"></i>&nbsp;0412563789</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    </nav>


    