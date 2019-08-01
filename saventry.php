<?php 
session_start();
include "databs.php";

if(isset($_SESSION["id"])){
    $authorid=$_SESSION["id"];
} else {
    $authorid = 0;
} 

if(isset($_POST["title"])){
    $title=$_POST["title"];
    $content=$_POST["content"];
    
    $statement=$connect->prepare("SELECT * FROM listings ORDER BY id DESC LIMIT 1");
    $statement->execute();
    $result=$statement->fetch();
    $listingid=$result["id"];
    $listingid++;
    
    $databs="INSERT INTO listings (id,author,title,text) VALUES ('$listingid','$authorid',\"$title\",\"$content\")";
    $connect->exec($databs);
}
//reserved words kullanımı yasak olduğundan \" kullanarak onları korumaya aldık...
header("location:homepage.php");


//INSERT INTO `listings` (`id`, `author`, `title`, `text`) VALUES ('6', '4', 'denemetitle', 'denemetext');
?>