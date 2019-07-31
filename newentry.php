<?php 
include "databs.php";
session_start();

if (isset($_SESSION["loggedin"])){
    $showspecialpanel = true;

} else {
     $showspecialpanel = false;
}

if(isset($_SESSION["id"])){
    $authorid=$_SESSION["id"];
} else {
    $authorid = 0;
} 
?>

<html>
<head>
    <?php include "header.php"; ?>
    <style>
        body{
            font-family: Courier New;
        }
        li {
            font-weight: bold;
            font-size: 18px;
        }
        span {
            font-size: 25px;
            font-weight: bold;
        }
        .aaaaa{
            background-color: #17a2b8 ;
        }
        .btn-outline-info{
            background-color: white;
        }

    </style>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 mx-auto text-center">
                <?php include "navbar.php"; ?>    
            </div>
        </div> 
        
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="container-fluid aaaaa">
                    <form method="POST" action="saventry.php" id="forum">
                        
                        <div class="text-center">
                            <span>New Entry</span>
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control" type="text" id="title" name="title" placeholder="Title">
                        </div>
                        
                        <div class="form-group">
                            <textarea rows="19" class="form-control" id="content" name="content" placeholder="Content" form="forum"></textarea>
                        </div>
                        
                        <div class="buttton text-right">
                            <button type="submit" name="submit" class="btn-outline-info btn">Submit</button>
                        </div>
                        <br>  
                    </form>   
                </div>
            </div>
        </div> 
    </div>
    
    </body>
</html>