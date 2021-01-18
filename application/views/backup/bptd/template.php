<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $assets = $this->session->userdata('assets'); ?>
        <script>
            assets = '<?=$assets;?>';
        </script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" type="image/png" href="<?=$assets;?>images/favicon.ico">
        <title>e-Kontrak</title>
        <?php 
            $this->load->view('temp/css');
            $iduser = $this->session->userdata('iduser');
            $nama = $this->session->userdata('nama');
            $user = $this->session->userdata('user');
            $type = $this->session->userdata('type');
            if ($type == 0) {
                $user_type = 'Kantor Cabang';
            }else{
                $user_type = 'BPTD';
            } 
        ?>
        <script>
            base_url = '<?=base_url();?>';
            type = '<?=$type;?>';
        </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #014898;">
            <a class="navbar-brand" href="#"><span id="nmpo">e-Kontrak Perintis</span></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                <i class="fas fa-bars"></i>
            </button><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group text-white">
                    <!-- Selamat Datang BPTD <?=$nama;?> -->
                </div>
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
                <li class="nav-item dropdown">
                    <a class="nav-link text-light" id="pesanDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope"></i>
                        <span class="badge badge-pill badge-warning"></span>
                    </a>
                    <div class="shadow dropdown-menu dropdown-menu-right border border-warning" aria-labelledby="pesanDropdown">
                        <!-- <a class="dropdown-item" href="#">Contoh 1</a>
                        <a class="dropdown-item" href="#">Contoh 2</a>
                        <a class="dropdown-item" href="#">Contoh 3</a>
                        <a class="dropdown-item" href="#">Contoh 4</a>
                        <a class="dropdown-item" href="#">Contoh 5</a> -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <!-- <img src="<?=base_url();?>assets/images/logo_menhub.png" alt="..." class="align-self-center rounded-circle" width="30px"> -->
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                        
                        <span class="small">
                            Selamat Datang, BPTD <?=$nama;?>
                        </span>
                            
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item klik" href="#" id="ganti_passwd">Ganti Password</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item klik" href="#" onclick="logout();" id="logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link klik" href="#" id="dash">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>
                            <a class="nav-link klik collapse" href="#" id="kontrak">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-file-contract"></i>
                                </div>
                                Data Kontrak
                            </a>
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
                            </a>
                            <a class="nav-link klik" href="#" id="pesan">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-inbox"></i> 
                                </div>
                                Pesan Masuk &nbsp;<span class="badge badge-pill badge-warning" id="jmlPesan2"></span>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        BPTD
                    </div> -->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid maryam"></div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; angkutanjalan.com</div>
                            <div>
                                <a href="#">Kementerian Perhubungan</a>
                                &middot;
                                <a href="#">Direktorat Jenderal Perhubungan Darat</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <?php $this->load->view('temp/js');?>

        <!-- JS -->
        <script>
            // $('#nmpo').html(Cookies.get('nmpo'));
            // $('#pesanDropdown').click();
            // $('#nmpo').html('E-Kontrak Perintis');

            // if(type==0){
            //     $('#menu-cabang').show();
            // }

            var dash = base_url + 'bptd/dash/index',
                kontrak = base_url + 'bptd/kontrak/index',
                trayek = base_url + 'bptd/trayek/index',
                kendaraan = base_url + 'bptd/kendaraan/index',
                pengemudi = base_url + 'bptd/pengemudi/index',
                ganti_passwd = base_url + 'bptd/user/ganti_passwd',
                pesan = base_url+'pesan/index'

            $('#dash').addClass('active');
            $('.maryam').load(dash);

            $('.klik').click(function(){
                $('a').removeClass('active');
                $(this).addClass('active');
                var menu = $(this).attr('id');
                $(this).addClass('active');

                if(menu == "kontrak"){
                    $('.maryam').load(kontrak);
                }
                else if(menu == "trayek"){
                    $('.maryam').load(trayek);      
                }
                else if(menu == "kendaraan"){
                    $('.maryam').load(kendaraan);       
                }
                else if(menu == "pengemudi"){
                    $('.maryam').load(pengemudi);       
                }
                else if(menu == "dash"){
                    $('.maryam').load(dash);
                }
                else if(menu == "ganti_passwd"){
                    $('.maryam').load(ganti_passwd);
                }
                else if(menu == "pesan"){
                    $('.maryam').load(pesan);
                }
            });

            function logout(){
                $.ajax({
                    url: base_url + 'login/logout',
                    type: 'GET',
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    beforeSend: function(e) {
                        $('#loder_out').show();
                        if(e && e.overrideMimeType) {
                            e.overrideMimeType('application/jsoncharset=UTF-8')
                        }
                    },
                    complete: function(){
                        $('#loder_out').hide();
                    },
                    success: function(response){
                        Cookies.remove('kontrak_id');
                        Cookies.remove('verifikasi');
                        $(location).attr('href',base_url);
                    }
                });
            };
        </script>
    </body>
</html>
