<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" type="image/png" href="{public}assets/images/{icon}">
        <title>{title}</title>
        <link href="{public}plugins/sb-admin/styles.css" rel="stylesheet" />
        <link href="{public}plugins/jquery-ui-1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" href="{public}plugins/jquery-ui-themes-1.12.1/themes/blitzer/jquery-ui.min.css">
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->
        <link href="{public}plugins/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="{public}plugins/DataTables/Responsive-2.2.3/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="{public}plugins/DataTables/Responsive-2.2.3/css/responsive.jqueryui.min.css">
        <link rel="stylesheet" type="text/css" href="{public}css/semutbasah.css">
        <link rel="stylesheet" type="text/css" href="{public}css/fahira_admin.css">
        <script src="{public}plugins/font-awesome/5.11.2/js/all.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxHlrMcummUyCCwnms0FOI_HNgQeP4sXQ"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <!-- <img src="{public}assets/images/{logo}" width="25px"> -->
                <span class="">Road Management System</span>
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group text-white"></div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0 ">
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link text-light" id="alertDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-pill badge-warning">3</span>
                    </a>
                    <div class="shadow dropdown-menu dropdown-menu-right border border-warning" aria-labelledby="alertDropdown">
                        <a class="dropdown-item" href="#">Contoh 1</a>
                        <a class="dropdown-item" href="#">Contoh 2</a>
                        <a class="dropdown-item" href="#">Contoh 3</a>
                    </div>
                </li> -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link text-light" id="pesanDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope"></i>
                        <span class="badge badge-pill badge-warning" id="jmlPesan"></span>
                    </a>
                    <div class="shadow dropdown-menu dropdown-menu-right border border-warning" aria-labelledby="pesanDropdown" style="padding: 0px;">
                        <div class="card">
                            <h6 class="card-header"><i class="fas fa-envelope"></i> Pesan untuk anda</h6>
                            <div class="card-body" id="isiPesan">
                                <p class="text-monospace list-group"></p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary float-right">Skip</a>
                            </div>
                        </div>
                    </div>
                </li> -->
                <li class="nav-item dropdown">
                    <!-- <img src="{public}assets/images/logo_menhub.png" alt="..." class="align-self-center rounded-circle" width="30px"> -->
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw d-sm-none"></i><span class="d-none d-md-inline-block" id="info_username">{username}</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item klik" href="#" id="ganti_passwd">{name}</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item klik" href="{logout}">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" class="collapse{collapse_nav}">
                <?php include"sidebar.php"; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <!-- <div class="container-fluid mt-4">
                        <div class="alert alert-danger collapse" role="alert" id="alert"></div>
                    </div> -->
                    <div class="container-fluid mt-4">
                        <?php $message = $this->session->flashdata('message'); if($message!=null) { ?>
                        <div class="alert alert-success mt-4" role="alert" id="alert"><?= $message;?></div>
                        <?php } ?>
                        <div class="row maryam" id="maryam">
                            <?= $page; ?>
                        </div>
                    </div>                  
                </main>
                <?php include"footer.php"; ?>
            </div>
        </div>

        <script src="http://www.openlayers.org/api/OpenLayers.js"></script>

        <!-- JQUERY -->
        <!-- <script src="{public}plugins/jquery/jquery-2.1.1.min.js"></script> -->
        <script src="{public}plugins/jquery/jquery-3.4.1.min.js"></script>
        <!-- <script src="{public}plugins/jquery-ui-1.12.1/jquery-ui.js"></script> -->

        <!-- BOOTSTSRAPS -->
        <script src="{public}plugins/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <!-- SB-ADMIN -->
        <script src="{public}plugins/sb-admin/scripts.js"></script>

        <!-- CHART.JS -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="{public}plugins/sb-admin/dist/assets/demo/chart-bar-demo.js"></script> -->

        <!-- DATA TABLES -->
        <script src="{public}plugins/DataTables/datatables.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->

        <script src="{public}plugins/DataTables/Responsive-2.2.3/js/responsive.jqueryui.min.js"></script>
        <script src="{public}plugins/DataTables/Responsive-2.2.3/js/dataTables.responsive.min.js"></script>

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script> -->


        <!-- COOKIE.JS -->
        <script type="module" src="{public}plugins/js-cookie/js.cookie.js"></script>

        <!-- CLOCK TIMEPICKER -->
        <script src="{public}plugins/jquery-clock-timepicker/jquery-clock-timepicker.min.js"></script>
    </body>
</html>