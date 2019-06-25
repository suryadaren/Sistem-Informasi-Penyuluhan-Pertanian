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
    <link rel="shortcut icon" type="image/x-icon" href="/template/img/favicon.ico">
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
    <!-- forms CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/form/all-type-forms.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="/template/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        body{
            background-image: url('/template/img/backg.jpg');
            background-size: cover;
        }
        form {
          position: relative;
          width: 250px;
          margin: 0 auto;
          background: rgba(130,130,130,.3);
          padding: 20px 22px;
          border: 1px solid;
          border-radius: 10px;
          border-top-color: rgba(255,255,255,.4);
          border-left-color: rgba(255,255,255,.4);
          border-bottom-color: rgba(60,60,60,.4);
          border-right-color: rgba(60,60,60,.4);
        }
    </style>
  
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>

  

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="/template/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <br>
                    <br>
                    <h4>Sistem Informasi Penyuluhan Pertanian</h4>
                    <p>Dinas Pertanian Dan Ketahanan Pangan <br> Kabupaten Padang Pariaman</p>
                </div>
                <div class="hpanel">
                    <div class="panel-body" style="background-color: rgba(255,255,255,0)">
                        <form action="/check_login" id="loginForm" style="width: 80%" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label" for="email">email</label>
                                <input required type="email" placeholder="example@gmail.com" title="Masukan Alamat Email" value="" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input required type="password" title="Masukan password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
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
    <!-- tab JS
        ============================================ -->
    <script src="/template/js/tab.js"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="/template/js/icheck/icheck.min.js"></script>
    <script src="/template/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="/template/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="/template/js/main.js"></script>
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
</body>

</html>