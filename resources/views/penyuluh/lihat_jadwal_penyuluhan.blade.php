@extends('penyuluh.master')
@section('css_custom')
        <!-- ============================================ --> 
    <link rel="stylesheet" href="/template/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/template/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="/template/js/vendor/modernizr-2.8.3.min.js"></script>
@endsection

@section('content')
    <!-- tabs start-->
    <div class="calender-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="calender-inner">
                            <h3>Jadwal Penyuluhan</h3>
                                <hr>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tabs End-->
@endsection

@section('js_custom')
     <!-- morrisjs JS
        ============================================ -->
    <!-- <script src="/template/js/morrisjs/raphael-min.js"></script>
    <script src="/template/js/morrisjs/morris.js"></script>
    <script src="/template/js/morrisjs/morris-active.js"></script> -->
    <!-- morrisjs JS
        ============================================ -->
    <script src="/template/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="/template/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="/template/js/calendar/moment.min.js"></script>
    <script src="/template/js/calendar/fullcalendar.min.js"></script>
    <script src="/template/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="/template/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="/template/js/main.js"></script>
@endsection