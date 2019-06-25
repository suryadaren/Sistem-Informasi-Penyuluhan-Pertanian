<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kab. Padang Pariaman</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="/template/img/favicon.png">
    
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/owl.carousel.css">
    <link rel="stylesheet" href="/template/css/owl.theme.css">
    <link rel="stylesheet" href="/template/css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/main.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/template/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/template/css/calendar/fullcalendar.print.min.css">

  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    
    
    @yield('css_custom')

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="/template/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

   <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header" style="margin-top: 10%">
              <p class="centered"><img src="{{Storage::url(auth()->guard('bpp')->user()->foto)}}" class="img-circle" width="80"></p>
              <h5 class="centered" style="color: red">{{auth()->guard('bpp')->user()->nama}}</h5>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <!-- <li>
                            <a title="Dashboard" href="/bpp/dashboard" aria-expanded="false"><i class="fa big-icon fa-home icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">Dashboard</span></a>
                        </li> -->
                        <li>
                            <a title="Profil" href="/bpp/profil" aria-expanded="false"><i class="fa big-icon fa-user icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">Profil</span></a>
                        </li>
                        <li>
                            @if($notifbaru)
                            <a title="Notifikasi" href="/bpp/notifikasi" aria-expanded="false"><i class="fa big-icon fa-bell icon-wrap text-danger" aria-hidden="true"></i> <span class="mini-click-non text-danger">Notifikasi</span></a>
                            @else
                            <a title="Notifikasi" href="/bpp/notifikasi" aria-expanded="false"><i class="fa big-icon fa-bell icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">Notifikasi</span></a>
                            @endif
                        </li>
                        <li>
                            <a title="Daftar Laporan" href="/bpp/daftar_laporan_penyuluhan" aria-expanded="false"><i class="fa fa-file-text sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Daftar Laporan</span></a>
                        </li>
                        <li>
                            <a title="Daftar Draft" href="/bpp/daftar_draft_programa" aria-expanded="false"><i class="fa fa-desktop sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Daftar Draft</span></a>
                        </li>
                        <li>
                            <a title="Daftar Surat Tugas" href="/bpp/daftar_surat_tugas" aria-expanded="false"><i class="fa fa-briefcase sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Daftar Surat Tugas</span></a>
                        </li>
                        <!-- <li>
                            <a title="daftar Penyuluh" href="/bpp/daftar_penyuluh_lapangan" aria-expanded="false"><i class="fa big-icon fa-users icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">daftar Penyuluh</span></a>
                        </li>
                        <li>
                            <a title="daftar Kelompok Tani" href="/bpp/daftar_kelompok_tani" aria-expanded="false"><i class="fa big-icon fa-users icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">daftar Kelompok Tani</span></a>
                        </li>
                        <li>
                            <a title="daftar Nagari" href="/bpp/daftar_nagari" aria-expanded="false"><i class="fa big-icon fa-users icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">daftar Nagari</span></a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->


    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="fa fa-bars"></i>
                                                </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                            <span class="admin-name">{{auth()->guard('bpp')->user()->nama}}</span>
                                                            <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="/bpp/profil"><span class="fa fa-user author-log-ic"></span>Profil Saya</a>
                                                        </li>
                                                        <li><a href="/logout_bpp"><span class="fa fa-lock author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @yield('content')

        <!-- tabs End-->
        <!-- <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- jquery
        ============================================ -->
    <script src="/template/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="/template/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="/template/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="/template/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="/template/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="/template/js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="/template/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="/template/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="/template/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/template/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="/template/js/metisMenu/metisMenu.min.js"></script>
    <script src="/template/js/metisMenu/metisMenu-active.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
      @if(Session::has('message'))
        var type="{{Session::get('alert-type','success')}}"
      
        switch(type){
          case 'success':
           toastr.info("{{ Session::get('message') }}");
           break;
        case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
        }
      @endif
    </script>
    @yield('js_custom') 
</body>

</html>