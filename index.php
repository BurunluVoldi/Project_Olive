<?php
session_start();
//$message=$_SESSION["message"];
 $message="";
 $logout="no";
if(isset($_GET["sonuc"])){
    switch ($_GET["sonuc"]){
        case "passerror":
            $message="password wrong!";
            break;
        case "usererror":
            $message="username wrong!";
            break;
        case "logout":
            $message="Logged out succesfully!!";
            $logout="yes";
            break;

    }
}
?>
<html>
<head>
    
    <?php include "header.php";?>
    <style>
        .container {
            margin-top: 150px;
        }
        h3 {
            font-family: Courier New;
            font-weight: 900;
        }
        h5 {
            font-family: Courier New;
        }
        input{
            font-family: Courier New;
        }
        #submitbuton {
            font-family: Impact;
        }
    </style>
    <script>
        //we could have used validate function with its own plugin. Further look required!!.
    $(document).ready(function(){
        $("#submitbuton").on("click", function(){
            var username =$("#username").val();
            var password =$("#pass").val();
            
            if (username=="" || password==""){
                Swal.fire(
                'HEY!',
                'need to fill the areas...',
                'question');
                return false;
            }
        });
    });
    </script>
    
    </head>
    
<body>
    <?php 
    if (!($message=="")){
        if ($logout=="yes"){ ?>
        <script>
            Swal.fire({
            type:'succes',
            title:'DONE!',
            text: '<?php echo $message; ?>'
            })
        </script>
        <?php       
        }
        else { ?>
        <script>
            Swal.fire({
                 type:'error',
                 title: '):',
                 text: '<?php echo $message; ?>'
            })
        </script>
        <?php     
        }
        ?>
    
    <?php
    }
    ?>
    <div class="container">
        <div class="row centered-form">
            <div class="col-md-6 mx-auto text-center">           
                 <h3 class="panel-title">get inside to the portal</h3><h5><small>need to fill all the blanks to login</small></h5>
                    <div class="panel-body">
                    <div class="text-center">

                        <form id="formlogin" class="" method="POST" action="login.php">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control input-sm" id="username" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <input type="password" name ="password" id="pass" class="form-control input-sm" placeholder="Password">
                            </div> 

                            <button id="submitbuton" type="submit" class="btn-primary btn-block btn">
                            LOG IN!</button>
                        </form>

                    </div>
                    </div>
            </div>
        </div>
    </div>
</body>
    
</html>

