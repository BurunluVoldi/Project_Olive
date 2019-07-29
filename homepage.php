<?php 
include "databs.php";
session_start();
$messageshow=false;
//*****************************
if(isset($_SESSION["id"])){
    $authorid=$_SESSION["id"];
} else {
    $authorid = 0;
}
//*****************************
if (isset($_SESSION["loggedin"])){
    $showspecialpanel = true;

} else {
     $showspecialpanel = false;
}
//******************************
if (!isset($_SESSION["limit"])){
      if (isset($_SESSION["message"])){
        $message=$_SESSION["message"];
        $messageshow=true;
        $_SESSION["limit"]="okok";
    } 
}
?>    



<html>
<head>
    <?php include "header.php"; ?>
    
    <style>
        #logoutbtn {
            font-family: Courier New; 
        }
        li {
            font-family: Courier New;
            font-weight: bold;
            font-size: 18px;
        }
        table {
            font-family: Courier New;
        }
        
        #homepagebtn {
            font-family: Courier New; 
            }
    </style>
    <script src="modal.js"></script>
    </head>
    <body>
        
        <?php 
        $statement=$connect->prepare("SELECT name FROM instructors WHERE id=$authorid");
        $statement->execute();
        $result=$statement->fetch();
        $sessioname=$result["name"];
        //firstly we fetch session id from $_SESSION and assign.
        //then we use it in db request and reach the name column in the db.
        //lastly we assign it some value which is $sesioname here.
        ?>
        
        <?php 
        if ($messageshow==true){
        ?>
        <script>
            Swal.fire(
            'HEY! Welcome <?php echo $sessioname; ?>',
            '<?php echo $message; ?>',
            'success'
            )
        </script> 
        <?php
        } 
        ?>
    

        <div class="container-fluid">
            
            <div class="row">
                <div class="col-xl-6 mx-auto text-center">
                    <?php include "navbar.php"; ?>    
                </div>
            </div> 
            
            <div class="row">
                <div class="col-xl-6 mx-auto text-center">
                    
                    <table class="table text-center table-striped">
                        <thead>
                        <tr>
                            <th class="w-5">QUEUE</th>
                            <th class="w-10">AUTHOR</th>
                            <th class="w-15">TITLE</th>
                            <th class="w-70">TEXT</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM listings ORDER BY id DESC";
                            $statement=$connect->prepare($sql);
                            $statement->execute();
   
                            while ($result=$statement->fetch()){?>
                                <tr >
                                <td>*****</td>
                                    <?php 
                                    $authorid=$result["author"];     
                                    $authorname = "SELECT name FROM instructors WHERE id = $authorid";
                                    $statement2=$connect->prepare($authorname);
                                    $statement2->execute();
                                    $result2=$statement2->fetch();
                                    ?>
                                <td><strong><?php echo $result2["name"] ?></strong></td>
                                <td><?php echo $result["title"] ?></td>
                                <td><?php echo 
                                before_last(' ',substr($result["text"],0,50)) ?>...</td>
                                <td><button type="button" class="modalopen btn-secondary btn-sm btn" id="<?php echo $result["id"] ?>">more...</button></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div> 
            
            
        </div>
        
        <!--modal start-->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog" id="getter">
            </div>
        </div>
        
    </body>
</html>

<?php
function before_last($sub,$text){
    return substr($text,0,strreverseposition($text,$sub));
}
function strreverseposition($text, $sub)
{
    $reverseposition = strpos (strrev($text), strrev($sub));
    if ($reverseposition===false) return false;
    else return strlen($text) - $reverseposition - strlen($sub);
};

//we are declared this function inorder to find last space bar character inside of a string.
//to find it we use strrev function which reverts the string...
//once we revert the string then we need space's position (LUL)
//$reverseposition stands for the position of the last space character in the string.
//strreverseposition function returns the position from the beginning of the string which what we exactly want...




//we still not able to ask if user is sure to log out? dig this out!! tried modals: fail, tried sweetlaerts with jquery: failed. sooo its hard to understand.
?>