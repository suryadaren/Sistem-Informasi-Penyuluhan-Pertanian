@extends('penyuluh.master')
@section('css_custom')
        <!-- ============================================ --> 
    <link rel="stylesheet" href="/template/css/calendar/fullcalendar.min.css">
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
    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <h3>Masukan Jadwal kegiatan</h3>
                            <hr>
                            <br>
                            <form class="form-inline" action="/penyuluh/input_jadwal" method="post">
                            {{@csrf_field()}}
                                    
                                <div class="form-group row increment" style="width: 100%;margin-left: 0">

                                    <div class="control-group input-group form-inline" style="width: 100%;margin-top: 10px">

                                      <input type="text" name="materi" id="materi[]" style="width: 70%" class="form-control" placeholder="masukan materi/tema penyuluhan" required>

                                      <input name="tanggal[]" class="form-control" type="date" style="width: 15%;margin-left: 2px;margin-right: 2px" id="example-date-input" required>

                                      <button style="width: 10%" class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                                    </div>
                                </div>
                                    
                                <div class="clone hide row" style="width: 100%">

                                    <div class="control-group input-group form-inline" style="width: 100%;margin-top: 10px">

                                      <input type="text" name="materi" id="materi[]" style="width: 70%" class="form-control" placeholder="masukan materi/tema penyuluhan" required>

                                      <input name="tanggal[]" class="form-control" type="date" style="width: 15%;margin-left: 2px;margin-right: 2px" id="example-date-input" required>

                                      <button style="width: 10%" class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
                                  
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                                                    
                </div>
            </div>
        </div>
    </div>
    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <h3>Jadwal Penyuluhan</h3>
                            <h6>

                                <ul class="inline">
                                    <li>
                                        <span style="color:red"> Merah </span> : Laporan Missing
                                    </li>
                                    <li>
                                        <span style="color:blue"> Biru </span> : Laporan Sudah Dikirim
                                    </li>
                                    <li>
                                        <span style="color:green"> Hijau </span> : Laporan pending
                                    </li>
                                </ul>
                            </h6>
                                <hr>
                            <div class="calender-area mg-tb-30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="calender-inner">
                                                <div id='calendar'></div>
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
    <!-- <script src="/template/js/calendar/fullcalendar-active.js"></script> -->
    <script>
        $(function() {

            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaDay'
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                backgroundColor: '#1f2e86',   
                eventTextColor: '#1f2e86',
                textColor: '#378006',
                dayClick: function(date, jsEvent, view) {

                alert('Clicked on: ' + date.format());

                alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                alert('Current view: ' + view.name);

                // change the day's background color just for fun
                $(this).css('background-color', 'red');

            },
                events: [
                    
                    @foreach($jadwal as $task)
                    {
                        title : '{{ $task->materi }}',
                        start : '{{ $task->tanggal }}',
                        @if($task->status == 'missing')
                        color: 'red',
                        @elseif($task->status == 'laporan dikirim')
                        color: 'blue',
                        @else
                        color: 'green',
                        @endif
                    },
                    @endforeach
                ]
            });
        });
    </script>
    <!-- plugins JS
        ============================================ -->
    <script src="/template/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="/template/js/main.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

          $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });

          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });

        });

    </script>
@endsection