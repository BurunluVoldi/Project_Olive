<?php 
include "databs.php";
session_start();

if (isset($_SESSION["loggedin"])){
    $showspecialpanel = true;

} else {
     $showspecialpanel = false;
}

if (isset($_GET["authorprofile"])){
    $authorprofile=$_GET["authorprofile"];
} else {
    $authorprofile="0";
}
?>
<html>
<head>
    <?php include "header.php"; ?>

    <style>
        info{
            
        }
        body{
            font-family: courier new;
        }
        .image{
            margin-bottom: 10px;
            height: 190px;
            width: 190px;
            margin-top: 10px;
        }
     #logoutbtn {
            font-family: Courier New; 
        }
        li {
            font-family: Courier New;
            font-weight: bold;
            font-size: 18px;
        }
        
        #homepagebtn {
            font-family: Courier New; 
            }
        .card-footer{
            font-size:10px;
        }
    </style>
        </head>
    <body>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 mx-auto text-center">
                    <?php include "navbar.php"?>
                </div>
            </div>
            <?php
            $fetchprofileinfo="SELECT * FROM instructors WHERE id=$authorprofile";
            $statement=$connect->prepare($fetchprofileinfo);
            $statement->execute();
                    $result=$statement->fetch();
            ?>
            <div class="row">
                <div class="col-xl-6 mx-auto text-center">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 mx-auto">
                                        <img class="image" src="profile.png">
                                    </div>
                                    <div class="info col-xl-8 mx-auto">
                                        <span><?php echo $result["name"]; ?></span><br>
                                        <span><?php echo $result["mail"]; ?></span><br>
                                        <span>Telephone: <?php echo $result["fax"]; ?></span><br>
                                        <span>Room: <?php echo $result["room"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right"> 
                                <span>Copyright claim by Enes_Kilicarslan ©All rights reserved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>