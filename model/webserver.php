<?php
header('Content-Type: application/json');
include("db.php");
session_start();
if(isset($_GET['getAddress'])) {
    if($_GET['getAddress'] == 'oneAddress') {
            $sql = "SELECT * FROM shipping WHERE shippingid = :shipid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':shipid', $_GET['shippingid'], PDO::PARAM_INT, 5);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if(is_array($result) && sizeof($result) > 0) {
                echo json_encode($result);
            } else {
                echo json_encode(array(['error'=>'true']));
            } 
        }
         if($_GET['getAddress'] == 'selAdd') {
            if(isset($_SESSION['UserID'])){
                $UserID = $_SESSION['UserID'];
                $sql = "SELECT * FROM shipping WHERE UserID = '$UserID'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(is_array($result) && sizeof($result) > 0) {
                    echo json_encode($result);
                } else {
                    echo array(['error'=>'true']);
                }
           }
        }
   if($_GET['getAddress'] == 'addAddress') {
            if(isset($_POST)) {
                if(isset($_SESSION['UserID'])){
                $UserID = $_SESSION['UserID'];
                $sql = "
        INSERT INTO shipping(address, mobileno, country, city, postcode, created, last_updated, UserID) VALUES (:address, :mobile, :country, :city, :pcode,curtime(),curtime(), :UserID)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR, 256);
                $stmt->bindParam(':mobile', $_POST['mobile'], PDO::PARAM_STR, 256);
                $stmt->bindParam(':country', $_POST['country'], PDO::PARAM_STR, 128);
                $stmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR, 128);
                $stmt->bindParam(':pcode', $_POST['pcode'], PDO::PARAM_INT, 5);
                $stmt->bindParam(':UserID', $UserID, PDO::PARAM_INT, 5);
                $res = $stmt->execute();
                if($res == true) {
                    echo json_encode(array(['insert'=>'true']));
                } else {
                    echo json_encode(array(['error'=>'true']));
                }    
            }
            }
        }
    if($_GET['getAddress'] == 'updateAddress') {
            if(isset($_POST)) {
                if(isset($_SESSION['UserID'])){
                $UserID = $_SESSION['UserID'];
                $sql = "
                UPDATE shipping SET address = :address, mobileno = :mobile, country = :country, city = :city, postcode = :pcode, last_updated = curtime(), UserID = :UserID      
                WHERE shippingid = :shipid";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR, 256);
                $stmt->bindParam(':mobile', $_POST['mobile'], PDO::PARAM_STR, 256);
                $stmt->bindParam(':country', $_POST['country'], PDO::PARAM_STR, 128);
                $stmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR, 128);
                $stmt->bindParam(':pcode', $_POST['pcode'], PDO::PARAM_INT, 5);
                $stmt->bindParam(':shipid', $_POST['shipid'], PDO::PARAM_STR, 10);
                $stmt->bindParam(':UserID', $UserID, PDO::PARAM_STR, 10);
                $res = $stmt->execute();
                if($res == true) {
                    echo json_encode(array(['update'=>'true']));
                } else {
                    echo json_encode(array(['error'=>'true']));
                }             
            }
            }
        }
    if($_GET['getAddress'] == 'deleteAddress') {
            $shipid = (int)$_GET['shippingid'];
            $sql = "DELETE FROM shipping WHERE shippingid = :shipid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':shipid', $shipid, PDO::PARAM_INT, 5);
            $res = $stmt->execute();
            if($res == true) {
                echo json_encode(array(['delete'=>'true']));
            } else {
                echo json_encode(array(['error'=>'true']));
            }
        }
}
?>