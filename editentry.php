<?php 
include "databs.php";
session_start();
if (isset($_GET["newest_id"])){
    $statement=$connect->prepare("SELECT * FROM listings WHERE id='".$_GET["newest_id"]."'");
    $statement->execute();
    $result = $statement->fetch();
    
    $title=$result["title"];
    $text=$result["text"];
    
}
?>


        <form id="forum" action="editsave.php?id=<?php echo $_GET['newest_id'];?>" method="POST">
    <div class="modal-header">
                <h3 class="modal-title"><?php echo $result["id"].". entry here to execute"?></h3>
                    <button type="button" class="close" data-dismiss="modal">x!</button>
                </div>
                <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group">
                            
                            <label>title</label>
                            <input name="title" class="form-control" type="text" value="<?php echo $title?>" >
                                
                            
                            <label>text</label>
                            <textarea name="text" rows="14" class="form-control" form="forum"><?php echo $text?></textarea>
                                
                            </div>
                            
                        </div>
                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-warning btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn-primary btn" name="submitte" >Save</button>
                    
                </div>
            </form>
