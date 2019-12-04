<?php
session_start();
if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId']; ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Data Tables | ThemeKit - Admin Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/jquery-minicolors/jquery.minicolors.css">
        <link rel="stylesheet" href="plugins/datedropper/datedropper.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <input type="hidden" id="userId" value="<?php echo $userId;?>"/>
        <div class="wrapper">
            <?php include 'navbar.php';?>

            <div class="page-wrap">
                <?php include 'sidebar.php';?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-inbox bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Data Table</h5>
                                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="../index.html"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Tables</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
            <div id="newvendor"></div>

                        <div class="row vendorlist">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Vendor List</h3>
                                        <button type="button" class="btn btn-primary" style="float: right;" onclick="addVendor();" >New Vendor</button>
                                    </div>
                                
                                    <div class="card-body">
                                        <table id="data_table" class="table vendors">
                                            <thead>
                                                <tr>
                                                    <th>Contact Number</th>
                                                    <th class="nosort">Avatar</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Birth Date</th>
                                                    <th>Contact Address</th>
                                                    <th class="nosort">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody class="vendorData">
                                                
                                               
                                               
                                                
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <footer class="footer">
                            <div class="w-100 clearfix">
                                <span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 ThemeKit v2.0. All Rights Reserved.</span>
                                <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a></span>
                            </div>
                        </footer>
                    </div>
                </div>




                <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="quick-search">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 ml-auto mr-auto">
                                            <div class="input-wrap">
                                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                                <i class="ik ik-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body d-flex align-items-center">
                                <div class="container">
                                    <div class="apps-wrap">
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                        </div>
                                        <div class="app-item">
                                            <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script>
                    window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
                </script>
                <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
                <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
                <script src="plugins/screenfull/dist/screenfull.js"></script>
                <script src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="dist/js/theme.min.js"></script>
                <script src="js/datatables.js"></script>
               
                <script src="plugins/moment/moment.js"></script>
        <script src="plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="plugins/jquery-minicolors/jquery.minicolors.min.js"></script>
        <script src="plugins/datedropper/datedropper.min.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="js/form-picker.js"></script>

                <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
                <script src="plugins/summernote/dist/summernote-bs4.min.js"></script>
                <script src="js/layouts.js"></script>
                <script src="jscode/apis.js"></script>
                <script src="jscode/vendors.js"></script>


             
       
       
       

    </body>

</html>
<?php 
}else{
    header('Location:login.html');
}
?>