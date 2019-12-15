<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title') - Peranking Bidang Minat [Skripsi]</title>
        <!-- Custom fonts for this template-->
        <link href="/sbAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="/sbAdmin/css/sb-admin.css" rel="stylesheet">
        <style>  
            #gfg { 
                width:170px; 
                text-align:center; 
                padding:20px; 
            } 
            #aboutPic { 
                max-width:100%; 
                        height:auto; 
            } 
        </style>  
        @yield('css')
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            <a class="navbar-brand mr-1" href="/">PBM [Skripsi]</a>

            <!-- Navbar -->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $nm_pendek }}
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#aboutModal">About</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="wrapper">
            <div id="content-wrapper">
                <div class="container">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
        <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout dari sistem?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Tekan "Logout" untuk keluar dari sistem.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="/Logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Modal -->
        <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">About</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="gfg" class="mx-auto">
                            <img id="aboutPic" src="http://localhost/storage/dev.jpg" alt="">
                        </div>
                        <p align="center">
                            <u>Agung Setyo Pribadi</u> <br>
                            06.2014.1.06361<br><br>

                            Dosen Pembimbing Utama <br> 
                            <u><strong>Andy Rachman, ST., M.Kom. </strong></u><br>
                            NIP. 011125<br><br>
                            Dosen Pembimbing Kedua <br> 
                            <u><strong>Nanang Fakhrur Rozi, S.ST., M.Kom.</strong></u><br>
                            NIP. 122093<br><br>

                            Program "Peranking Bidang Minat" dibangun menggunakan model V-Shape dan metode Topsis.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="/sbAdmin/vendor/jquery/jquery.min.js"></script>
        <script src="/sbAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="/sbAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="/sbAdmin/js/sb-admin.min.js"></script>
        @yield('js')
    </body>

</html>
