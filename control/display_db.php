<?php
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
function add_cart(){
    include("../model/db.php");
    if(isset($_POST['cart_btn'])){
        $pro_id = $_POST['pro_id'];
        $ip = getIp();
        $check_cart = $conn->prepare("select * from carts where pro_id='$pro_id' AND ip_add='$ip'");
        $check_cart->execute();
        $row_check = $check_cart->rowCount();
        if($row_check==1){
            echo"<script>alert('Product already added to your cart!!!');</script>";
        }else
        {
            $add_cart = $conn->prepare("insert into carts(pro_id, quantity,ip_add) values('$pro_id','1','$ip')");
            $add_cart->bindValue(":pro_id", $pro_id);
            $add_cart->bindValue(":ip", $ip);

            if($add_cart->execute()){
                echo"<script>window.open('../view/index.php','_self');</script>";
            }else{
                echo"<script>alert('Try Again!!!');</script>";
            }
        }
    }
}
function cart_count(){
    include("../model/db.php");
    $ip = getIp();
    $get_cart_item = $conn->prepare("select * from carts where ip_add='$ip'");
    $get_cart_item->execute();
    $count_cart = $get_cart_item->rowCount();
    echo $count_cart;
}
function cart_display(){
    include("../model/db.php");
    $ip = getIp();
    $get_cart_item = $conn->prepare("select * from carts where ip_add = '$ip'");
    $get_cart_item->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cart_item->execute();
    $cart_empty = $get_cart_item->rowCount();
    $net_total = 0;
    if($cart_empty == 0){
        echo "<center><h2>Cart is Empty!!!!!</h2></center>";
    }else{
        if(isset($_POST['up_qty'])){
            $qty = $_POST['quantity'];
            foreach($qty as $key=>$value){
                $update_qty = $conn->prepare("update carts set quantity = '$value' where cart_id = '$key'");
                $res = $update_qty->execute();
                echo $res;
//                if($update_qty->execute()){
//                   echo "<script>window.open('cart.php','_self');</script>"; 
//                }
            }
        }
        echo"
        <table id='cart' class='table table-hover table-condensed'>
        <thead>
            <tr>
                <th style='width:10%'>Image</th>
				<th style='width:40%'>Product</th>
				<th style='width:10%'>Price</th>
				<th style='width:8%'>Quantity</th>
				<th style='width:22%' class='text-center'>Subtotal</th>
				<th style='width:10%'></th>
            </tr>
        </thead>
        ";
        while($row=$get_cart_item->fetch()):
            $pro_id = $row['pro_id'];
            $get_pro = $conn->prepare("select * from products where pro_id = '$pro_id'");
            $get_pro->setFetchMode(PDO:: FETCH_ASSOC);
            $get_pro->execute();
            $row_pro = $get_pro->fetch();
            echo "
                <tbody>
                    <tr>
                        <td data-th='Image'>
                            <div class ='row'>
                                <div class='col-sm-12 hidden-xs'><img src='../view/img/pro_img/".$row_pro['image']."' alt='prod' class='img-responsive'/></div>
                             </div>
                        </td>
                        <td data-th='Product'><strong>
                            ".$row_pro['pro_name']."</strong><br><br>
                                    <p>".$row_pro['description']."</p>

                          </td>
                          <td data-th='Price'>".$row_pro['price']."</td>
                          <td data-th='Quantity' class='text-center'>
                          <input type='text' name ='quantity[".$row['cart_id']."]' class='form-control text-center' value='".$row['quantity']."'><br><input type='submit' name ='up_qty' class='form-control text-center' value='save'>
                          </td>
                          <td data-th='Subtotal' class='text-center'>";
                                $price = $row_pro['price'];
                                $quantity = $row['quantity'];
                                $sub_total = $price * $quantity;
                                echo $sub_total;
                                $net_total = $net_total + $sub_total;
                          echo"</td>
                          <td class='actions' data-th=''>
                              <a href ='delete.php?delete_id=".$row_pro['pro_id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash-o'></i></a>		
                           </td>
                       </tr>
                    </tbody>




            ";
        endwhile;

        echo "
            <tfoot>
                <tr>
                    <td><a href='../view/index.php' class='btn btn-warning'><i class='fa fa-angle-left'></i> Continue Shopping</a></td>
                    <td colspan='3' class='hidden-xs'></td>
                    <td class='hidden-xs text-center'><strong>Net Amount: $net_total </strong></td>
                    <td colspan='2' class='hidden-xs'></td>
                    <td><a href='../view/shipping.php' class='btn btn-success btn-block'>Checkout <i class='fa fa-angle-right'></i></a></td>
                </tr>
            </tfoot>
        ";
    }
}
function delete_cart_item(){
    include("../model/db.php");
    if(isset($_GET['delete_id'])){
        $pro_id = $_GET['delete_id'];
        
        $delete_pro = $conn->prepare("delete from carts where pro_id = '$pro_id'");
        if($delete_pro->execute()){
            echo "<script>alert('product deleted succesfully');</script>";
                echo "<script>window.open('cart.php','_self');</script>";
            } 
    }
}
function salwar(){
    include("../model/db.php");
    $fetch_cat = $conn->prepare("select * from main_cat where cat_id= '39'");
    $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_cat->execute();
    $row_cat = $fetch_cat->fetch();
    $cat_id = $row_cat['cat_id'];
    echo"<h3>".$row_cat['cat_name']."</h3>";
    
    $fetch_pro = $conn->prepare("select * from products where cat_id='$cat_id' limit 0,3");
    $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_pro->execute();
    while($row_pro = $fetch_pro->fetch()):
    echo" <li>
            <form method = 'post' enctype = 'multipart/form-data'>
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                    <input type = 'hidden' name='pro_id' value='".$row_pro['pro_id']."'>
                    <button id='pro_btn' name = 'cart_btn'>Cart</button>
                </center>
            </a>
            </form>
          </li>";        
    endwhile;
}
function lehenga(){
    include("../model/db.php");
    $fetch_cat = $conn->prepare("select * from main_cat where cat_id= '40' limit 0,3");
    $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_cat->execute();
    $row_cat = $fetch_cat->fetch();
    $cat_id = $row_cat['cat_id'];
    echo"<h3>".$row_cat['cat_name']."</h3>";
    
    $fetch_pro = $conn->prepare("select * from products where cat_id='$cat_id' limit 0,3");
    $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_pro->execute();
    while($row_pro = $fetch_pro->fetch()):
    echo" <li>
            <form method = 'post' enctype = 'multipart/form-data'>
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>

                      <input type = 'hidden' name='pro_id' value='".$row_pro['pro_id']."'>
                    <button id='pro_btn' name = 'cart_btn'>Cart</button>
                </center>
            </a>
            </form>
          </li>";        
    endwhile;
}
function saree(){
    include("../model/db.php");
    $fetch_cat = $conn->prepare("select * from main_cat where cat_id= '41' limit 0,3");
    $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_cat->execute();
    $row_cat = $fetch_cat->fetch();
    $cat_id = $row_cat['cat_id'];
    echo"<h3>".$row_cat['cat_name']."</h3>";
    
    $fetch_pro = $conn->prepare("select * from products where cat_id='$cat_id' limit 0,3");
    $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_pro->execute();
    while($row_pro = $fetch_pro->fetch()):
    echo" <li>
            <form method = 'post' enctype = 'multipart/form-data'>
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                    
                     <input type = 'hidden' name='pro_id' value='".$row_pro['pro_id']."'>
                    <button id='pro_btn' name = 'cart_btn'>Cart</button>
                </center>
            </a>
            </form>
          </li>";        
    endwhile;
}
function accessories(){
    include("../model/db.php");
    $fetch_cat = $conn->prepare("select * from main_cat where cat_id= '42' limit 0,3");
    $fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_cat->execute();
    $row_cat = $fetch_cat->fetch();
    $cat_id = $row_cat['cat_id'];
    echo"<h3>".$row_cat['cat_name']."</h3>";
    
    $fetch_pro = $conn->prepare("select * from products where cat_id='$cat_id' limit 0,3");
    $fetch_pro->setFetchMode(PDO:: FETCH_ASSOC);
    $fetch_pro->execute();
    while($row_pro = $fetch_pro->fetch()):
    echo" <li>
            <form method = 'post' enctype = 'multipart/form-data'>
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                    
                      <input type = 'hidden' name='pro_id' value='".$row_pro['pro_id']."'>
                    <button id='pro_btn' name = 'cart_btn'>Cart</button>
                </center>
            </a>
            </form>
          </li>";        
    endwhile;
}
function pro_detail(){
    include("../model/db.php");
    if(isset($_GET['pro_id'])){
        $pro_id = $_GET['pro_id'];
        $pro_fetch = $conn->prepare("select * from products where pro_id='$pro_id'");
        $pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
        $pro_fetch->execute();
        
        $row_pro = $pro_fetch->fetch();
        $cat_id = $row_pro['cat_id'];
        echo"<div id = 'pro_img'>
            <img src = '../view/img/pro_img/".$row_pro['image']."'>
        </div>
        <div id = 'pro_fea'>
            <h3>".$row_pro['pro_name']."</h3>
            <ul>
                <li>".$row_pro['description']."</li>
            </ul>
            <center>
               <form method = 'post'>
                    <input type = 'hidden' name='pro_id' value='".$row_pro['pro_id']."'>
                    
                    <button id='buy_now' name = 'cart_btn'>Add to Cart</button>
                </form>
            </center>
        </div>
        <div id='sim_pro'>
            <h3>Similar Products</h3>
            <ul>";
                echo add_cart();
                $sim_pro = $conn->prepare("select * from products where pro_id != $pro_id AND cat_id='$cat_id' limit 0,5");
                $sim_pro->setFetchMode(PDO:: FETCH_ASSOC);
                $sim_pro->execute();
                while($row=$sim_pro->fetch()):
                    echo"<li>
                        <a href = 'pro_detail.php?pro_id=".$row['pro_id']."'>
                            <img src='../view/img/pro_img/".$row['image']."'>
                            <p>".$row['pro_name']."</p>
                            <p>Price:".$row['price']."</p>
                        </a>
                    </li>";
                endwhile;
            echo "</ul>
        </div>";
    }
}
function all_cat(){
   include("../model/db.php");
    $all_cat = $conn->prepare("select * from main_cat");
    $all_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $all_cat->execute();
    while($row=$all_cat->fetch()):
        echo"<a href = 'cat_detail.php?cat_id=".$row['cat_id']."' >".$row['cat_name']."</a>";
    endwhile;
}
function cat_detail(){
    include("../model/db.php");
    
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $cat_pro = $conn->prepare("select * from products where cat_id='$cat_id'");
        $cat_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $cat_pro->execute();
        
        $cat_name =$conn->prepare("select * from main_cat where cat_id='$cat_id'");
        $cat_name->setFetchMode(PDO:: FETCH_ASSOC);
        $cat_name->execute();
        
        $row = $cat_name->fetch();
        $row_main_cat = $row['cat_name'];
        echo"<h3>$row_main_cat</h3>";
        while($row_cat = $cat_pro->fetch()):
            echo" <li>
                    <a href='../view/pro_detail.php?pro_id=".$row_cat ['pro_id']."'>
                        <h4>".$row_cat ['pro_name']."</h4>
                        <img src='../view/img/pro_img/".$row_cat ['image']."'>
                        <center>
                            <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_cat ['pro_id']."'>View</a></button>
                            <button id='pro_btn' name = 'cart_btn'>Cart</button>
                        </center>
                    </a>
                  </li>";        
        endwhile;
    }
}
function viewall_subcat(){
    include("../model/db.php");
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $sub_cat = $conn->prepare("select * from sub_cat where cat_id='$cat_id'");
        $sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $sub_cat->execute();
        echo"<h3>Sub Categories</h3>";
        while($row = $sub_cat->fetch()):
            
            echo "<li><a href='cat_detail.php?sub_cat_id=".$row['sub_cat_id']."'>".$row['sub_cat_name']."</a></li>";
                
        endwhile;
        
    }
}
function sub_cat_detail(){
    include("../model/db.php");
    
    if(isset($_GET['sub_cat_id'])){
        $sub_cat_id = $_GET['sub_cat_id'];
        $sub_cat_pro = $conn->prepare("select * from products where sub_cat_id='$sub_cat_id'");
        $sub_cat_pro->setFetchMode(PDO:: FETCH_ASSOC);
        $sub_cat_pro->execute();
        
        $sub_cat_name =$conn->prepare("select * from sub_cat where sub_cat_id='$sub_cat_id'");
        $sub_cat_name->setFetchMode(PDO:: FETCH_ASSOC);
        $sub_cat_name->execute();
        
        $row = $sub_cat_name->fetch();
        $row_sub_cat = $row['sub_cat_name'];
        echo"<h3>$row_sub_cat</h3>";
        while($row_sub_cat = $sub_cat_pro->fetch()):
            echo" <li>
                    <a href='../view/pro_detail.php?pro_id=".$row_sub_cat ['pro_id']."'>
                        <h4>".$row_sub_cat ['pro_name']."</h4>
                        <img src='../view/img/pro_img/".$row_sub_cat ['image']."'>
                        <center>
                            <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_sub_cat ['pro_id']."'>View</a></button>
                            <button id='pro_btn' name = 'cart_btn'>Cart</button>
                        </center>
                    </a>
                  </li>";        
        endwhile;
    }
}
function viewall_cater(){
    include("../model/db.php");
    if(isset($_GET['sub_cat_id'])){
        
        $main_cat = $conn->prepare("select * from main_cat");
        $main_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $main_cat->execute();
        echo "<h3>Categories</h3>";
        while($row = $main_cat->fetch()):
            
            echo "<li><a href='cat_detail.php?cat_id=".$row['cat_id']."'>".$row['cat_name']."</a></li>";
                
        endwhile;
        
    }
}
function search(){
    include("../model/db.php");
    
    if(isset($_GET['search'])){
        $user_query = $_GET['user_query'];
        $search = $conn->prepare("select * from products where pro_name like '%$user_query%' or keyword like '%$user_query%'");
        $search->setFetchMode(PDO:: FETCH_ASSOC);
        $search->execute();
        echo"<div id='bodyleft'><ul>";
        if($search->rowCount() == 0){
            echo "<h2><center> Product not found!!!!!</center></h2>";
        }else{
            while($row=$search->fetch()):
                echo" <li>
            <a href='../view/pro_detail.php?pro_id=".$row['pro_id']."'>
                <h4>".$row['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row['pro_id']."'>View</a></button>
                    <button id='pro_btn' name = 'cart_btn'>Cart</button>
                </center>
            </a>
          </li>";  
            endwhile;
        }
        echo"</ul></div><br clear='all'/>";
    }
}
?>