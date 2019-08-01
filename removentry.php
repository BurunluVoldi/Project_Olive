<?php 
include "databs.php";

if (isset($_GET["entryid"])){
   $entryid=$_GET["entryid"];
    $sql="DELETE FROM listings WHERE id=$entryid";
    $statement=$connect->prepare($sql);
    $statement->execute();
}
?>