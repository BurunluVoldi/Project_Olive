<?php 
include "databs.php";
session_start();

if (isset($_SESSION["loggedin"])){
    $showspecialpanel = true;

} else {
     $showspecialpanel = false;
}
?>

<html>
<head>
    <?php
    include "header.php";
    ?>
    
    <style>
        .image{
            height: 140px;
            width: 140px;
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
    </style>
    
    </head>
<body>
    
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xl-6 mx-auto text-center">
                <?php include "navbar.php"?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="row">
                    <?php
                    $fetchauthor="SELECT * FROM instructors ORDER BY id ASC";
                    $statement=$connect->prepare($fetchauthor);
                    $statement->execute();
                    while ($result=$statement->fetch()){
                        ?>
                        <div class="col-xl-4 mx-auto">
                            <div class="card">
                                <div class="card-body" style="height:200px;">
                                    <a href="profile.php?authorprofile=<?php echo $result['id'];?>">
                                    <div class="card-title text-center">
                                        <img class="image" src="profile.png">
                                    </div>
                                    </a>
                                    <div class="text-center">
                                    <span class="card-text"><?php echo $result["name"];?></span>
                                    </div>
                                </div>
                                <div class="card-footer text-center"> 
                                        <span>email: <?php echo $result["mail"]; ?></span>
                                        </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>    
            </div>
        </div>
    
    </div>
    
    </body>
</html>