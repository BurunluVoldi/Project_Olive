<nav class="navbar navbar-expand-lg bg-info navbar-light">
                              <div class="container-fluid">  
                                <a class="navbar-brand" href="homepage.php">
                                    <img src="portal.png" alt="logo" style="width:40px; height:40px;">
                                </a>
                                
                                <ul class="navbar-nav ">
                                    
                                    <li class="nav-item">
                                      <a class="nav-link" href="homepage.php">Homepage</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                      <a class="nav-link" href="homepage.php">Entries</a>
                                    </li>
                                    
                                    <?php if ($showspecialpanel){
                                    
                                    echo '<li class="nav-item">
                                      <a class="nav-link" href="myentries.php">My Entries</a>
                                    </li>';
                                    
                                    }
                                    ?>  
                                    
                                    <?php if ($showspecialpanel){
                                    ?>
                                    <li class="nav-item">
                                      <a class="nav-link" href="newentry.php">New Entry++</a>
                                    </li>
                                    <?php
                                    }
                                    ?> 
                                    
                                </ul>
                            
                                <ul class="navbar-nav navbar-right nav">
                                    <li>
                                    <?php if ($showspecialpanel){
                                    ?>
                                    <a href="logout.php"><button type="button" id="logoutbtn" class="btn btn-info"><img src="logout.png" style="width:25px;"> Logout</button></a>
                                    <?php
                                    } else { ?>
                                    <a href="index.php"><button type="button" id="logoutbtn" class="btn btn-info"><img src="login.png" style="width:25px;"> Login</button></a>
                                    <?php
                                    }
                                    ?> 
                                    </li>
                                </ul>
                            </div>     
                        </nav>