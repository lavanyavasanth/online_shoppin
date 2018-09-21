<div class ="scroll" id="bodyright">    
<h3 id="add_cat">Add New Products</h3>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Product Name:</td>
                <td><input type="text" name="pro_name"></td>            
            </tr> 
             <tr>
                <td>Select Category Name:</td>
                <td><select name="cat_name">
                    <?php 
                           include("../../model/function.php");
                           echo viewall_cat();                    
                    ?>
                    </select></td>            
            </tr> 
             <tr>
                <td>Select SubCategory Name:</td>
                <td><select name="sub_cat_name">
                    <?php echo viewall_sub_cat();                    
                    ?>
                    </select></td>            
            </tr> 
             <tr>
                <td>Image:</td>
                <td><input type="file" name="image"></td>            
            </tr> 
            <tr>
                <td>Description:</td>
                <td><input type="text" name="description"></td>            
            </tr> 
            <tr>
                <td>Price:</td>
                <td><input type="text" name="price"></td>            
            </tr> 
            <tr>
                <td>Enter Keyword:</td>
                <td><input type="text" name="keyword"></td>            
            </tr> 
        </table>
        <center><button name="add_product">Add Product</button></center>
    </form>
</div>
<?php
   echo add_pro();
?>