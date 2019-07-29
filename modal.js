    $(document).ready(function (){
        $(document).on("click",".modalopen", function modalopen(){
            var newest_id = $(this).attr("id");
            
            $.ajax({
                url:"modal.php",
                method:"GET",
                data:{newest_id:newest_id},
                success:function(data){
                    
                    $("#getter").html(data);   
                    $("#myModal").modal("show");   
                }
            });
        });
        
        
 
    });
    
