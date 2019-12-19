
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="products.php">
                            <div class="logo-img">
                               <img src="img/brand-a.png" class="header-brand-img" alt="lavalite"> 
                            </div>
                            <span class="text">Radiology</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Radiology Web</div>
                               <?php
                               if($roleId == 1){
                                   ?>
                                <div class="nav-item">
                                    <a href="vendors.php"><i class="ik  user ik-user"></i><span>Vendors</span> <span class="badge badge-success"></span></a>
                                </div>
                                <?php 
                               }
                               ?>
                                <div class="nav-item">
                                    <a href="products.php"><i class="ik shopping-bag ik-shopping-bag"></i><span>Products</span> <span class="badge badge-success"></span></a>
                                </div>
                                <?php if($roleId == 1){?>
                                <div class="nav-item">
                                    <a href="quiz.php"><i class="ik file-text ik-file-text"></i><span>Quiz</span> <span class="badge badge-success"></span></a>
                                </div>
                                 <div class="nav-item active">
                                    <a href="inquiry.php"><i class="ik phone-forwarded ik-phone-forwarded"></i><span>Inquiry</span></a>
                                </div>
                                <div class="nav-item active">
                                    <a href="levelsCategory.php"><i class="ik phone-forwarded ik-phone-forwarded"></i><span>Levels</span></a>
                                </div>
                                <?php 
                                }?>
                                
                            </nav>
                        </div>
                    </div>
                </div>
 