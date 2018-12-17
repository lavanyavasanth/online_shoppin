<?php
require("../model/db.php");
require("../model/function.php");
if (!empty([$_POST]))
{
     $username = !empty($_POST['username'])? testUserInput(($_POST['username'])): null;
     $password = !empty($_POST['password'])? testUserInput(($_POST['password'])): null;
     try
    {
        $stmt = $conn->prepare("SELECT Username, Password, Role,FirstName,Lastname,Email, user.UserID FROM login INNER JOIN user ON user.UserID = login.UserID WHERE username = :user");
        $stmt->bindParam(':user', $username);
       
        //$stmt->bindParam(':pass', $password);
        $stmt->execute();
        $rows = $stmt -> fetch();
        $user = $rows['Username'];
        $pass = $rows['Password'];
        $email = $rows['Email'];
        $role = $rows['Role'];
        $UserID = $rows['UserID'];
//        $firstname = $rows['FirstName'];
//         $lastname = $rows['Lastname'];
//         $email = $rows['Email'];
        if($username == $user && password_verify($password, $pass))
        {
            session_start();
            
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = $role;
            $_SESSION['UserID'] = $UserID;
            $_SESSION['login'] = true;
//            $_SESSION['firstname'] = $firstname;
//            $_SESSION['lastname'] = $lastname;
//            $_SESSION['email'] = $email;
            
                if ($role == "Admin") {
                        $_SESSION['message'] = "login successful";
                        header('location:../view/admin/index.php');
                        
                } 
                else {    
                          $_SESSION['message'] = "login successful";
                          header('location:../view/index.php');
                                 
                }

        } else {
            // Handle if they don't have an account.
            $_SESSION['error'] = "login failed";
            header('location:../view/login.php');

        }
    }

    catch(PDOException $e){
        echo "Account creation problems".$e -> getMessage();
        die();
    }
}
?>