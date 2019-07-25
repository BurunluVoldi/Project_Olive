<?php 
session_start();
include "databs.php";

if(isset($_POST["username"]))
{
    $username=$_POST["username"];
    $formpassword=$_POST["password"];
    
    
    if($stmnt=$connect->prepare("SELECT * FROM instructors WHERE username=:username")){
        $stmnt->bindParam(":username",$param_username, PDO::PARAM_STR);
        
        //we are declaring the username that comes from the form to the param_username...
        $param_username = trim($_POST["username"]);
        $stmnt->execute();
        
        if($result = $stmnt->fetch()){
            $id=$result["id"];
            $username = $result["username"];
            $password = $result["password"];
            
            if ($password == $formpassword){
                $message="Logged in successfully!?";
                $_SESSION["message"]=$message;
                $loggedin="ok";
                $_SESSION["loggedin"]=$loggedin;
                header("location:homepage.php");
            } else {
                header("location:index.php?sonuc=passerror");
            }
        } else {
                header("location:index.php?sonuc=usererror");
        }
    }
}
?>