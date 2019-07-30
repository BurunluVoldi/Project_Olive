<?php 
include "databs.php";

if(isset($_POST["submitte"])){
    $newid=$_GET["id"];
    $title=$_POST["title"];
    $text=$_POST["text"];
  }  
    $updatentry="UPDATE listings SET title=\"$title\", text=\"$text\" WHERE id=$newid";
    $connect->exec($updatentry);


sleep(1);
header("location:myentries.php")

?>

