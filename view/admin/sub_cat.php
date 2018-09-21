<div id="bodyright">
     <h3>Viewall Sub Categories</h3>
     <form method="post" enctype="multipart/form-data">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Sr No.</th>
              <th scope="col">Sub Category Name</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>    
              <?php 
                include("../../model/function.php");
                echo viewall_sub_category();
              ?>    
          </tbody>
        </table>    
    </form>
    <h3 id="add_cat">Add New Sub Category</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Select Category Name:</td>
                <td><select name = "main_cat">
                        <?php
                           echo viewall_cat();                    
                        ?>
                    
                    </select></td>       
            </tr>    
            <tr>
                <td>Enter Sub Category Name:</td>
                <td><input type="text" name="sub_cat_name"></td>       
            </tr>  
        </table>
        <center><button name="add_sub_cat">Add Category</button></center>
    </form>
</div>
<?php
    echo add_sub_cat();
?>