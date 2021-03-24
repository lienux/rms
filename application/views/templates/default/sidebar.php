<nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link klik {menu_dashboard}" href="{link_menu_dashboard}" id="dash">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link klik {menu_data_jalan}" href="{link_menu_data_jalan}" id="jalan">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                Data Jalan
            </a>
            <a class="nav-link klik {menu_data_rambu}" href="{link_menu_data_rambu}" id="rambu">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                Data Rambu Lalu Lintas
            </a>
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {menu_pengaturan}" href="{link_menu_pengaturan}" data-toggle="collapse" data-target="#collapsePengaturan" aria-expanded="false" aria-controls="collapsePengaturan">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pengaturan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse{collapse_pengaturan}" id="collapsePengaturan" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link klik {menu_profile}" href="{link_menu_profile}" id="profil">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        Profile
                    </a>
                    <a class="nav-link klik {menu_about}" href="{link_menu_about}" id="about">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        About
                    </a>
                    <!-- <a class="nav-link klik {menu_about}" href="#" id="account">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        Account
                    </a> -->
                    <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div> -->
                </nav>
            </div>
            
            <!-- <div class="sb-sidenav-menu-heading">Data Master</div>
            <a class="nav-link klik" href="#" id="trayek">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-route"></i> 
                </div>
                Data Trayek
            </a>
            <a class="nav-link klik" href="#" id="kendaraan">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-bus-alt"></i> 
                </div>
                Data Kendaraan
            </a>   
            <a class="nav-link klik" href="#" id="pengemudi">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-id-card-alt"></i> 
                </div>
                Data Pengemudi
            </a> -->
            <!-- <a class="nav-link klik" href="#" id="pesan">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-inbox"></i> 
                </div>
                Pesan Masuk &nbsp;<span class="badge badge-pill badge-warning" id="jmlPesan2"></span>
            </a> -->
        </div>
    </div>
    <div class="sb-sidenav-footer text-light">
        <div class="small">Logged in as:</div>
        <div>{name}</div>
        <div>
            <span class="small font-italic">{level_name}</span>
        </div>
    </div>
</nav>