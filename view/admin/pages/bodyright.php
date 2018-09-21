<?php 
    if(!isset($_GET['viewall_cat'])){
        if(!isset($_GET['viewall_sub_cat'])){
            if(!isset($_GET['add_products'])){
                if(!isset($_GET['viewall_products'])){
?>
<div class="row">
  <div class="col-md-8" id="bodyright">
      <?php if(isset($_GET['edit_cat'])){
                include("edit_cat.php");   
            }
            if(isset($_GET['edit_sub_cat'])){
                include("edit_sub_cat.php");   
            }
            if(isset($_GET['edit_product'])){
                include("edit_product.php");   
            }
      ?>
  </div>
</div>
<!--
<div id="bodyright">
          
</div>
-->
<?php
    }
        }
            }
                }
?>