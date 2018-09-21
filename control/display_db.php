<?php
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
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                    <button id='pro_btn'><a href = 'cart.php'>Cart</a></button>
                </center>
            </a>
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
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                    <button id='pro_btn'><a href = '#'>Cart</a></button>
                </center>
            </a>
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
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                    <button id='pro_btn'><a href = '#'>Cart</a></button>
                </center>
            </a>
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
            <a href='../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>
                <h4>".$row_pro['pro_name']."</h4>
                <img src='../view/img/pro_img/".$row_pro['image']."'>
                <center>
                    <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_pro['pro_id']."'>View</a></button>
                    <button id='pro_btn'><a href = '#'>Cart</a></button>
                </center>
            </a>
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
                <h4>Price:".$row_pro['price']."</h4>
                <form method = 'post'>
                    <button id='buy_now' name = 'buy_now'>Buy Now</button>
                    <button id='buy_now' name = 'cart'>Add to Cart</button>
                </form>
            </center>
        </div>
        <div id='sim_pro'>
            <h3>Similar Products</h3>
            <ul>";
                $sim_pro = $conn->prepare("select * from products where cat_id='$cat_id' limit 0,5");
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
        while($row_cat = $cat_pro->fetch()):
            echo" <li>
                    <a href='../view/pro_detail.php?pro_id=".$row_cat ['pro_id']."'>
                        <h4>".$row_cat ['pro_name']."</h4>
                        <img src='../view/img/pro_img/".$row_cat ['image']."'>
                        <center>
                            <button id='pro_btn'><a href = '../view/pro_detail.php?pro_id=".$row_cat ['pro_id']."'>View</a></button>
                            <button id='pro_btn'><a href = '#'>Cart</a></button>
                        </center>
                    </a>
                  </li>";        
        endwhile;
    }
}
?>