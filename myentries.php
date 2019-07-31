<?php 
include "databs.php";
session_start();

if(isset($_SESSION["id"])){
    $authorid=$_SESSION["id"];
} else {
    $authorid = 0;
}

if (isset($_SESSION["loggedin"])){
    $showspecialpanel = true;

} else {
     $showspecialpanel = false;
}

?>

<html>
<head>
    <?php include "header.php";?>
    <style>
            body {
                font-family: Courier New;
            }
            card{
                height:100px;
            }
            .cardbuton{
                position: absolute; 
                right: 0;
            }
        
            #logoutbtn {
            font-family: Courier New; 
            }
        
            #homepagebtn {
            font-family: Courier New; 
            }
        
            li {
                font-family: Courier New;
                font-weight: bold;
                font-size: 18px;
            }
    </style>
    </head>
    
    <script>
        $(document).ready(function (){
        $(".edit").click(function (){
            var newest_id = $(this).attr("id");
            
            $.ajax({
                url:"editentry.php",
                method:"GET",
                data:{newest_id:newest_id},
                success:function(data){
                    
                    $("#getter").html(data);   
                    $("#m1").modal("show");   
                }
            });
        });
        
        
 
    });
 
        $(document).ready(function(){
        $(document).on("click",".delet",function gg(){
            var entryid = $(this).attr("id");
            

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                                  $.get("removentry.php?entryid="+entryid);

                Swal.fire(
                  'Deleted!',
                  'Your entry has been deleted.',
                  'success'
                );
                  $(this).parents(".card").fadeOut();

              }
            })
            
        
        })
    })
    </script>
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
                $fetching="SELECT * FROM listings WHERE author = $authorid ORDER BY id DESC";
                $statement=$connect->prepare($fetching);
                $statement->execute();
                while ($result=$statement->fetch()){
                    ?>
                    <div class="col-xl-6 mx-auto">
                        <div class="card">
                            <div class="card-body" style="height:300px;">
                                <div class="card-title">
                                    <div class="row">
                                        <h3><?php echo $result["title"];?></h3>   
                                    </div>   
                                </div>
                                <span class="card-text"><?php echo $result["text"]; ?></span>
                            </div>
                            <div class="card-footer"> 
                                        <button id="<?php echo $result["id"]; ?>" class="btn-warning btn btn-sm edit float-right ">Edit!</button>   
                                        <button id="<?php echo $result["id"]; ?>" class="btn-danger btn btn-sm delet float-right mr-1 ">Delete!</button>
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



<!-- The Modal -->
<div class="modal fade" id="m1">
  <div class="modal-dialog">
    <div class="modal-content">
        <div id="getter"></div>

 
    </div>
  </div>
</div>  
    </body>
</html>
