<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #014898;">
    <a class="navbar-brand" href="#">
        <img src="{public}assets/images/logo/{logo}" width="25px">
        <span class="">{company}</span>
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
                <a class="dropdown-item klik" href="#" id="ganti_passwd">Ganti Password</a>
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
            <div class="container-fluid mt-4">
                <div class="alert alert-danger collapse" role="alert" id="alert-kontrak"></div>
            </div>
            <div class="container-fluid">
                <div class="alert alert-danger collapse mt-4" role="alert" id="alert"></div>
                <div class="row maryam" id="maryam"></div>
            </div>                  
        </main>
        <?php 
        $this->load->view('templates/'.themes().'/body_footer');
        ?>
    </div>
</div>