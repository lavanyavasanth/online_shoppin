<div id="bodyright">
    <h3>Viewall Categories</h3>
    <form method="post" enctype="multipart/form-data">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Category Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>    
      <?php 
        include("../../model/function.php");
        echo viewall_category();
      ?>    

  </tbody>
</table>
    
    </form>
    <h3 id="add_cat">Add New Category</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Enter Category Name:</td>
                <td><input type="text" name="cat_name"></td>            
            </tr>        
        </table>
        <center><button name="add_cat">Add Category</button></center>
    </form>
</div>


<?php
    echo add_cat();
?>