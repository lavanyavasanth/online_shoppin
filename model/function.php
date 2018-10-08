<?php
    function add_cat(){
        include("db.php");
        if(isset($_POST['add_cat'])){
            $cat_name = $_POST['cat_name'];
            $add_cat = $conn->prepare ("INSERT INTO main_cat (cat_name) values (:cat_name)");
            $add_cat->bindValue(":cat_name",$cat_name);
            if($add_cat->execute()){
                echo "<script>alert('Category added succesfully');</script>";
                echo "<script>window.open('index.php?viewall_cat','_self');</script>";
            } else {
                echo "<script>alert('Category not added succesfully');</script>";
            }
        }
    }

    function add_sub_cat(){
        include("db.php");
        if(isset($_POST['add_sub_cat'])){
            $cat_id = $_POST['main_cat'];
            $sub_cat_name = $_POST['sub_cat_name'];
            $add_sub_cat = $conn->prepare ("INSERT INTO sub_cat (sub_cat_name,cat_id) values (:sub_cat_name,:cat_id)");
            $add_sub_cat->bindValue(":cat_id", $cat_id);
            $add_sub_cat->bindValue(":sub_cat_name", $sub_cat_name);
            if($add_sub_cat->execute()){
                echo "<script>alert('Sub Category added succesfully');</script>";
                echo "<script>window.open('index.php?viewall_sub_cat','_self');</script>";
            } else {
                echo "<script>alert('Sub Category not added succesfully');</script>";
            }
        }
    }
    function add_pro(){
         include("db.php");
         if(isset($_POST['add_product'])){
            $pro_name = $_POST['pro_name'];
            $cat_id = $_POST['cat_name'];
            $sub_cat_id = $_POST['sub_cat_name'];
            
            $image = $_FILES['image']['name'];             
            $image_temp = $_FILES['image']['tmp_name']; 
            move_uploaded_file($image_temp,"../img/pro_img/$image");
             
            $description = $_POST['description'];
            $price = $_POST['price'];
            $keyword = $_POST['keyword'];
            
            $add_product = $conn->prepare ("INSERT INTO products (pro_name,cat_id,sub_cat_id,image,description,price,keyword,pro_added_date)VALUES (:pro_name,:cat_id,:sub_cat_id,:image,:description,:price,:keyword,NOW())");
            $add_product->bindValue(":pro_name",$pro_name);
            $add_product->bindValue(":cat_id",$cat_id);
            $add_product->bindValue(":sub_cat_id",$sub_cat_id);
            $add_product->bindValue(":image",$image);
            $add_product->bindValue(":description",$description);
            $add_product->bindValue(":price",$price);
            $add_product->bindValue(":keyword",$keyword);
            if($add_product->execute()){
                echo "<script>alert('Product added succesfully');</script>";
                echo "<script>window.open('index.php?viewall_products','_self');</script>";
            } else {
                echo "<script>alert('Product not added succesfully');</script>";
            }
        }
    }
    function viewall_cat(){
         include("db.php");
         $fetch_cat = $conn->prepare("select * from main_cat");
         $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
         $fetch_cat->execute();
         while($row = $fetch_cat->fetch()):                    
            echo"<option value = '".$row['cat_id']."'>".$row['cat_name']."</option>";     
         endwhile;
     }
    function viewall_category(){
        include("db.php");
        $fetch_cat = $conn->prepare("select * from main_cat order by cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        $i = 1;
        while($row = $fetch_cat->fetch()):
            echo "<tr>
                      <td>".$i++."</td>
                      <td>".$row['cat_name']."</td>
                      <td><a href ='index.php?edit_cat=".$row['cat_id']."'>Edit</a></td>
                      <td><a href ='del_cat.php?del_cat=".$row['cat_id']."'>Delete</a></td>
                  </tr>
                  ";
        endwhile;
    }
      function viewall_product(){
        include("db.php");
        $fetch_pro = $conn->prepare("select * from products order by pro_name");
        $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_pro->execute();
        $i = 1;
        while($row = $fetch_pro->fetch()):
            echo "<tr>
                      <td>".$i++."</td>
                      <td>".$row['pro_name']."</td>
                      <td><img src = '../img/pro_img/".$row['image']."' style= 'width:80px; height: 80px;'></td>
                      <td>".$row['description']."</td>
                      <td>".$row['price']."</td>
                      <td>".$row['keyword']."</td>
                      <td>".$row['pro_added_date']."</td>
                      <td><a href ='index.php?edit_product=".$row['pro_id']."'>Edit</a></td>
                      <td><a href = 'del_cat.php?del_pro=".$row['pro_id']."'>Delete</a></td>
                  </tr>
                  ";
        endwhile;
    }
     function viewall_sub_category(){
        include("db.php");
        $fetch_cat = $conn->prepare("select * from sub_cat order by sub_cat_name");
        $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $fetch_cat->execute();
        $i = 1;
        while($row = $fetch_cat->fetch()):
            echo "<tr>
                      <td>".$i++."</td>
                      <td>".$row['sub_cat_name']."</td>
                      <td><a href ='index.php?edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>
                      <td><a href = 'del_cat.php?del_sub_cat=".$row['sub_cat_id']."'>Delete</a></td>
                  </tr>
                  ";
        endwhile;
    }
    function viewall_sub_cat(){
         include("db.php");
         $fetch_sub_cat = $conn->prepare("select * from sub_cat");
         $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
         $fetch_sub_cat->execute();
         while($row = $fetch_sub_cat->fetch()):
                    
            echo"<option value = '".$row['sub_cat_id']."'>".$row['sub_cat_name']."</option>";
                    
         endwhile;
      }
    function edit_cat(){
        include("db.php");
        if(isset($_GET['edit_cat'])){
            $cat_id=$_GET['edit_cat'];
            $fetch_cat_name = $conn->prepare("select * from main_cat where cat_id = :cat_id");
            $fetch_cat_name->bindValue(":cat_id",$cat_id);
            $fetch_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat_name->execute();
            $row = $fetch_cat_name->fetch();
            echo " <form method='POST'>
                        <table>
                            <tr>
                                <td>Update Category Name:</td>
                                <td><input type='text' name='up_cat_name' value='".$row['cat_name']."'></td>            
                            </tr>        
                        </table>
                        <center><button name='update_cat'>Update Category</button></center>
                    </form>";
            if(isset($_POST['update_cat'])){
                $up_cat_name = $_POST['up_cat_name'];
                $update_cat = $conn->prepare("update main_cat set cat_name = :up_cat_name where cat_id=:cat_id");
                $update_cat->bindValue(":up_cat_name",$up_cat_name);
                $update_cat->bindValue(":cat_id",$cat_id);
                 if($update_cat->execute()){
                    echo "<script>alert('category updated successfully');</script>";
                    echo "<script>window.open('index.php?viewall_cat','_self');</script>";
                };

            }
        }
    }
    function edit_sub_cat(){
        include("db.php");
        if(isset($_GET['edit_sub_cat'])){
            $sub_cat_id=$_GET['edit_sub_cat'];
            $fetch_sub_cat = $conn->prepare("select * from sub_cat where sub_cat_id = :sub_cat_id");
            $fetch_sub_cat->bindValue("sub_cat_id",$sub_cat_id);
            $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat->execute();
            $row = $fetch_sub_cat->fetch();
            $cat_id = $row['cat_id'];
            $fetch_cat=$conn->prepare("select * from main_cat where cat_id = :cat_id");
            $fetch_cat->bindValue(":cat_id",$cat_id);
             $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
            $row_cat = $fetch_cat->fetch();
            echo " <form method='POST'>
                        <table>
                            <tr>
                                <td>Select Main Category Name:</td>
                                <td>
                                    <select>
                                        <option>
                                        ".$row_cat['cat_name']."
                                        </option>
                                    </select>
                                </td>
                             </tr>
                             <tr>
                                <td>Update Sub Category Name:</td>
                                <td><input type='text' name='up_subcat_name' value='".$row['sub_cat_name']."'></td>            
                            </tr>        
                        </table>
                        <center><button name='update_subcat'>Update Sub Category</button></center>
                    </form>";
            if(isset($_POST['update_subcat'])){
                $up_subcat_name = $_POST['up_subcat_name'];
                $update_subcat = $conn->prepare("update sub_cat set sub_cat_name = :up_subcat_name where sub_cat_id=:sub_cat_id");
                $update_subcat->bindValue(":up_subcat_name",$up_subcat_name);
                $update_subcat->bindValue(":sub_cat_id",$sub_cat_id);
                 if($update_subcat->execute()){
                    echo "<script>alert('subcategory updated successfully');</script>";
                    echo "<script>window.open('index.php?viewall_sub_cat','_self');</script>";
                };

            }
        }
    }
    function edit_product(){
        include("db.php");
        if(isset($_GET['edit_product'])){
            $pro_id=$_GET['edit_product'];
            
            $fetch_pro = $conn->prepare("select * from products where pro_id = :pro_id");
            $fetch_pro->bindValue(":pro_id",$pro_id);
            $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_pro->execute();
            
            $row = $fetch_pro->fetch();
            $cat_id = $row['cat_id'];
            $sub_cat_id = $row['sub_cat_id'];
            
            $fetch_cat = $conn->prepare("select * from main_cat where cat_id = :cat_id");
            $fetch_cat->bindValue(":cat_id",$cat_id);
            $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_cat->execute();
            $row_cat = $fetch_cat->fetch();
            $cat_name = $row_cat['cat_name'];
            
            $fetch_sub_cat = $conn->prepare("select * from sub_cat where sub_cat_id = :sub_cat_id");
            $fetch_sub_cat->bindValue(":sub_cat_id",$sub_cat_id);
            $fetch_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
            $fetch_sub_cat->execute();
            $row_sub_cat = $fetch_sub_cat->fetch();
            $sub_cat_name = $row_sub_cat['sub_cat_name'];
            
            echo "<form method='POST' enctype='multipart/form-data'>
                        <table>
                                <tr>
                                    <td>Update Product:</td>
                                    <td><input type='text' name='pro_name' value='".$row['pro_name']."'></td>     
                                </tr>   
                                <tr>
                                    <td>Update Category Name:</td>
                                    <td><select name='cat_name'>
                                        <option value='".$row['cat_id']."'>".$cat_name."</option>
                                               ";echo viewall_cat(); echo"                                       
                                        </select>
                                    </td>            
                                </tr> 
                                 <tr>
                                    <td>Update SubCategory Name:</td>
                                    <td><select name='sub_cat_name'>
                                        <option value='".$row['cat_id']."'>".$sub_cat_name."</option>
                                            "; echo viewall_sub_cat(); echo"                   
                                        </select>
                                    </td>            
                                </tr>                                
                                 <tr>
                                    <td>Update Image:</td>
                                    <td><input type= 'file' name= 'image'> 
                                    <img src='../img/pro_img/".$row['image']."' style='width:60px; height:60px;'>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>Update Description:</td>
                                    <td><input type='text' name='description' value='".$row['description']."'></td>            
                                </tr> 
                                <tr>
                                    <td>Update Price:</td>
                                    <td><input type='text' name='price' value='".$row['price']."'></td>            
                                </tr> 
                                <tr>
                                    <td>Update Keyword:</td>
                                    <td><input type='text' name='keyword' value='".$row['keyword']."'></td>            
                                </tr> 
                        </table>
                        <center><button name='update_pro'>Update Product</button></center>
                    </form>";
            if(isset($_POST['update_pro'])){
                $pro_name = $_POST['pro_name'];
                $cat_id = $_POST['cat_name'];
                $sub_cat_id = $_POST['sub_cat_name'];

                $image = $_FILES['image']['name'];             
            $image_temp = $_FILES['image']['tmp_name']; 
            move_uploaded_file($image_temp,"../img/pro_img/$image");

                $description = $_POST['description'];
                $price = $_POST['price'];
                $keyword = $_POST['keyword'];
                
                $update_pro = $conn->prepare("update products set pro_name = :pro_name,cat_id=:cat_id,sub_cat_id=:sub_cat_id,image=:image,description=:description,price=:price,keyword=:keyword where pro_id=:pro_id");
                $update_pro->bindValue(":pro_name",$pro_name);
                $update_pro->bindValue(":cat_id",$cat_id);
                $update_pro->bindValue(":sub_cat_id",$sub_cat_id);
                $update_pro->bindValue(":image",$image);
                $update_pro->bindValue(":description",$description);
                $update_pro->bindValue(":price",$price);
                $update_pro->bindValue(":keyword",$keyword);
                $update_pro->bindValue(":pro_id",$pro_id);
                
                 if($update_pro->execute()){
                    echo "<script>alert('product updated successfully');</script>";
                    echo "<script>window.open('index.php?viewall_products','_self');</script>";
                }

            }
        }
    }
    function del_cat(){
            include("db.php");
            
            $del_cat_id=$_GET['del_cat'];
            $del_cat=$conn->prepare("delete from main_cat where cat_id='$del_cat_id'");
            if($del_cat->execute()){
                 echo "<script>alert('category deleted successfully');</script>";
                echo "<script>window.open('index.php?viewall_cat','_self');</script>";
                
            }
        }
    function del_sub_cat(){
            include("db.php");
            
            $del_sub_cat_id=$_GET['del_sub_cat'];
            $del_sub_cat=$conn->prepare("delete from sub_cat where sub_cat_id='$del_sub_cat_id'");
            if($del_sub_cat->execute()){
                 echo "<script>alert('subcategory deleted successfully');</script>";
                echo "<script>window.open('index.php?viewall_sub_cat','_self');</script>";
                
            }
        }
    function del_pro(){
        include("db.php");
        $del_pro_id = $_GET['del_pro'];
        $del_pro = $conn->prepare("delete from products where pro_id='$del_pro_id'"); 
         if($del_pro->execute()){
                 echo "<script>alert('product deleted successfully');</script>";
                echo "<script>window.open('index.php?viewall_products','_self');</script>";
                
            }
    }
function testUserInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        
}

function addUser($firstname, $lastname, $email, $role, $dob, $username, $password){
 	global $conn;
    try
    {
    $conn->beginTransaction();
    $sql = "INSERT INTO user(FirstName, LastName, Email, Role, dob) VALUES (:firstname, :lastname, :email, :role, :dob)";
 	$stmt = $conn->prepare($sql);
 	$stmt->bindValue(':firstname', $firstname);
 	$stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':email', $email);
 	$stmt->bindValue(':role', $role);
    $stmt->bindValue(':dob', $dob);
 	$result = $stmt->execute();
       
        
        
    $lastUserid = $conn->lastInsertId();
    
    
    $sql = "INSERT INTO login(Username, Password, UserID) VALUES (:username, :password, :UserID)";   
    $stmt = $conn->prepare($sql);
 	$stmt->bindValue(':username', $username);
 	$stmt->bindValue(':password', $password);
    $stmt->bindValue('UserID', $lastUserid);
 	$stmt->execute();
        
    $conn->commit();
    }
 	
    catch (PDOException $ex){
        $conn->rollBack();
        echo $ex->getMessage();
    }
}

function userLoggedIn() {
    if (isset($_SESSION["username"]) && isset($_SESSION["password"]) && isset($_SESSION["role"])) {
        return true;
    } else {
        return false;    
    }
} 
?>