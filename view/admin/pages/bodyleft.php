
<div class="row">
  <div class="col-md-4" id="bodyleft"> <h3>Content</h3>
    <ul>
        <li><a href = "index.php">Home</a></li>
        <li><a href = "index.php?viewall_cat">Category</a></li>
        <li><a href = "index.php?viewall_sub_cat">Subcategory</a></li>
        <li><a href = "index.php?add_products">Add New Products</a></li>
        <li><a href = "index.php?viewall_products">Products List</a></li>
        <li><a href = "../../view/logout.php">Logout</a></li>
    </ul> </div>
</div>


<?php
    if(isset($_GET['viewall_cat'])){
        include("cat.php");
    }
    if(isset($_GET['viewall_sub_cat'])){
        include("sub_cat.php");
    }
    if(isset($_GET['viewall_products'])){
        include("viewall_products.php");
    }
     if(isset($_GET['add_products'])){
        include("add_products.php");
    }
?>