<style>


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 40%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #fff;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #fff;
    color: white;
}
</style>
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
    
     
<!-- Trigger/Open The Modal -->
<button id="myBtn" class="btn btn-danger">Contact US</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Contact US</h2>
    </div>
    <div class="modal-body">
      <p><i class="fas fa-envelope"></i>&nbsp;lavanboutique@gmail.com</p>
      <p><i class="fas fa-phone"></i>&nbsp;0412563789</p>
    </div>
    <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>

</div>
    
 
  </nav>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    
