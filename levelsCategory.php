<?php
session_start();
if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
    $roleId = $_SESSION['roleId']; ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Report Levels | Radiology - Admin Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/brand.png" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

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
                                        <i class="ik ik-file-text bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Category</h5>
                                            <span>Report Levels</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="./"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#">Levels</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Report Levels</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        
                            <div class="col-lg-4 col-md-5">
                            <div class="card table-card">
                                    <div class="card-header">
                                        <h3>Categories</h3>
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#categoryModal" style="margin: 10px;">Add Category</button>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                                <li><i class="ik ik-x close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0 without-header">
                                                <tbody id="categories">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card">
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Level one report</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Level second report</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Level third report</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                            <div class="card-body">
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#demoModal" style="margin: 10px;">Add Level 1 Category</button>
                                            <div class="card-block">
                                            <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Report Level</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="levelone">
                                                   
                                                   
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="card-body">
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#secondmodal" style="margin: 10px;">Add Level 2 Category</button>
                                            <div class="card-block">
                                            <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Report Level</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="levelsecond">
                                                  
                                                   
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                            <div class="card-body">
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#thirdmodal" style="margin: 10px;">Add Level 3 Category</button>
                                            <div class="card-block">
                                            <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Report Level</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="levelthird">
                                                  
                                                   
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="right-sidebar">
                    <div class="sidebar-chat" data-plugin="chat-sidebar">
                        <div class="sidebar-chat-info">
                            <h6>Chat List</h6>
                            <form class="mr-t-10">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search for friends ...">
                                    <i class="ik ik-search"></i>
                                </div>
                            </form>
                        </div>
                        <div class="chat-list">
                            <div class="list-group row">
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
                                    <figure class="user--online">
                                        <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Gene Newman</span> <span class="username">@gene_newman</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
                                    <figure class="user--online">
                                        <img src="../img/users/2.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Billy Black</span> <span class="username">@billyblack</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
                                    <figure class="user--online">
                                        <img src="../img/users/3.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Herbert Diaz</span> <span class="username">@herbert</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
                                    <figure class="user--busy">
                                        <img src="../img/users/4.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Sylvia Harvey</span> <span class="username">@sylvia</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item active" data-chat-user="Marsha Hoffman">
                                    <figure class="user--busy">
                                        <img src="../img/users/5.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Marsha Hoffman</span> <span class="username">@m_hoffman</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
                                    <figure class="user--offline">
                                        <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Mason Grant</span> <span class="username">@masongrant</span> </span>
                                </a>
                                <a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
                                    <figure class="user--offline">
                                        <img src="../img/users/2.jpg" class="rounded-circle" alt="">
                                    </figure><span><span class="name">Shelly Sullivan</span> <span class="username">@shelly</span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

                <div class="chat-panel" hidden>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
                            <span class="user-name">John Doe</span>
                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="card-body">
                            <div class="widget-chat-activity flex-1">
                                <div class="messages">
                                    <div class="message media reply">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/3.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>Epic Cheeseburgers come in all kind of styles.</p>
                                        </div>
                                    </div>
                                    <div class="message media">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>Cheeseburgers make your knees weak.</p>
                                        </div>
                                    </div>
                                    <div class="message media reply">
                                        <figure class="user--offline">
                                            <a href="#">
                                                <img src="../img/users/5.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>Cheeseburgers will never let you down.</p>
                                            <p>They'll also never run around or desert you.</p>
                                        </div>
                                    </div>
                                    <div class="message media">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>A great cheeseburger is a gastronomical event.</p>
                                        </div>
                                    </div>
                                    <div class="message media reply">
                                        <figure class="user--busy">
                                            <a href="#">
                                                <img src="../img/users/5.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
                                        </div>
                                    </div>
                                    <div class="message media">
                                        <figure class="user--online">
                                            <a href="#">
                                                <img src="../img/users/1.jpg" class="rounded-circle" alt="">
                                            </a>
                                        </figure>
                                        <div class="message-body media-body">
                                            <p>If you are a vegan, we are sorry for you loss.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="javascript:void(0)" class="card-footer" method="post">
                            <div class="d-flex justify-content-end">
                                <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                                <button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
                            </div>
                        </form>
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
            window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')
        </script>
        <script src="plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="plugins/screenfull/dist/screenfull.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="jscode/apis.js"></script>
        <script src="jscode/levels.js"></script>
        <script src="jscode/loadFile.js"></script>
        <?php include 'add_category.php';?>
        <?php include 'edit_category.php';?>
        <?php include 'add_level_one.php';?>
        <?php include 'edit_level_one.php';?>
        <?php include 'add_level_second.php';?>
        <?php include 'edit_level_second.php';?>
        <?php include 'add_level_third.php';?>
        <?php include 'edit_level_third.php';?>
    </body>

</html>
<?php
}else{
    header('Location:index.php');
}
?>