<?php
require("../model/db.php");
require("../model/function.php");
    if(!empty([$_POST]))
    {

        $mypass = !empty($_POST['password'])? testUserInput(($_POST['password'])):null;
        $firstname = !empty($_POST['firstname'])? testUserInput(($_POST['firstname'])):null;
        $lastname = !empty($_POST['lastname'])? testUserInput(($_POST['lastname'])):null;
        $email = !empty($_POST['email'])? testUserInput(($_POST['email'])):null;
        $role = !empty($_POST['role'])? testUserInput(($_POST['role'])):null;
        $username = !empty($_POST['username'])? testUserInput(($_POST['username'])):null;
        $password = password_hash($mypass, PASSWORD_DEFAULT);    

        try{
            $querySuccess = addUser($firstname, $lastname, $email, $role, $username, $password);
           header('location:../view/login.php'); if(empty($firstname)||empty($lastname)||empty($email)||empty($role)||empty($username)||empty($mypass)){
             header('location:../view/reg.php?reg=empty');
                exit();       
            }
            else{
                if(!filter_var($email,FILTER_VALIDATE_EMAIL )){
                        header('location:../view/reg.php?reg=email');
                        exit();
                    }
                
                else{
                     if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) || !preg_match("/^[a-zA-Z]*$/", $username)){
                    header('location:../view/reg.php?reg=char');
                    exit();

                }
                    else{
                        header('location:../view/login.php');
                        
                    }
                }

            }
        }
            
        catch(PDOException $e)
        {
        echo "Error".$e -> getMessage();
        die();
        }
    
    }
    
?>



