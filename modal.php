<?php 
include "databs.php";

if(isset($_GET["newest_id"]))
{
    $sql = "SELECT * FROM listings WHERE id='".$_GET["newest_id"]."'";
    $statement=$connect->prepare($sql);
    $statement->execute(); 
    
    $result2 = $statement->fetch();
    
    $authorid=$result2["author"];     
    $authorname = "SELECT name FROM instructors WHERE id = $authorid";
    $statement2=$connect->prepare($authorname);
    $statement2->execute();
    $result3=$statement2->fetch();
    
    $title=$result2["title"];
    $text=$result2["text"];
}
?>

                <div class="modal-content">
                    <div class="modal-header">
                        <?php 
                        
                        ?>
                        <h3 class="modal-title"><?php echo $result3['name']."'s entry" ?></h3>
                        <button type="button" class="close" data-dismiss="modal"><img style="width:25px;" src="close.png"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid text-center">
                            <?php
                            echo "<h4>".$title."</h4> <br>";
                            echo $text;
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-info btn" data-dismiss="modal">Close</button>   
                    </div>
                </div>

