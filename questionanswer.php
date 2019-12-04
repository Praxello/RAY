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
        <link rel="stylesheet" href="plugins/select2/dist/css/select2.min.css">
        <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <?php include 'navbar.php';?>
            <div class="page-wrap">
                <?php include 'sidebar.php';?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <!-- <div class="row align-items-end">
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
                            </div> -->
                        </div>
                        <div id="newquestion"></div>
                        <div class="row questionlist">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                      <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-sm-4">
                                            <h3>Question List</h3>
                                          </div>
                                          <div class="col-sm-4">

                                          </div>
                                          <div class="col-sm-4">
                                            <button type="button" class="btn btn-primary" style="float: right;" onclick="addQuestion();" >New Question</button>
                                          </div>
                                        </div>
                                        </div>
                                        <!-- <h3>Vendor List</h3> -->

                                    </div>

                                    <div class="card-body">
                                        <table id="data_table" class="table vendors">
                                            <thead>
                                                <tr>
                                                    <th style="width: 40%;">Question</th>
                                                    <th style="width: 40%;">Category</th>
                                                    <th style="width: 40%;" class="nosort">Option1</th>
                                                    <th style="width: 40%;">Option2</th>
                                                    <th style="width: 40%;">Option3</th>
                                                    <th style="width: 40%;">Option4</th>
                                                    <th style="width: 40%;">Correct Option</th>
                                                    <th style="width: 40%;" class="nosort">&nbsp;</th>
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




               <?php include "dashboardmodal.php"; ?>

                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src="plugins/select2/dist/js/select2.min.js"></script>
                <!-- <script>
                    window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
                </script> -->
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

                <script src="jscode/questionanswer.js"></script>

    </body>

</html>
