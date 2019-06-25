@extends('bpp.master')
@section('css_custom')
     <!-- x-editor CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/editor/select2.css">
    <link rel="stylesheet" href="/template/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="/template/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="/template/css/editor/x-editor-style.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="/template/css/data-table/bootstrap-editable.css">
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
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <h3>Pilih Tanggal Untuk Melihat status laporan</h3>
                                <hr>
                                <br>
                                <div class="form-inline">
                                    <div class="form-group row" style="width: 20%">
                                      <label style="margin-left: 10px" class="mr-sm-2" for="tanggal">Tanggal</label>
                                      <input name="date" id="date" class="form-control" type="date" value="{{old('tanggal')}}" id="example-date-input">
                                      @if($errors->has('tanggal'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('tanggal')}} </div>
                                      @endif
                                      </div>

                                      <button style="margin-left: 10px" onclick="tes()" class="btn btn-primary">Submit</button>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Daftar <span class="table-project-n">Laporan</span> Penyuluhan tanggal {{$tanggal}}</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" >
                                        <thead>
                                            <tr>
                                                <th data-field="no">No.</th>
                                                <th data-field="name">Penyuluh</th>
                                                <th data-field="company">Desa</th>
                                                <th data-field="task">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1 ?>

                                            @foreach($jadwal_date as $jadwal)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$jadwal->draft_programa->user->nama}}</td>
                                                <td>{{$jadwal->draft_programa->user->desa}}</td>
                                                <td>{{$jadwal->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    <!-- data table JS
        ============================================ -->
    <script src="/template/js/data-table/bootstrap-table.js"></script>
    <script src="/template/js/data-table/tableExport.js"></script>
    <script src="/template/js/data-table/data-table-active.js"></script>
    <script src="/template/js/data-table/bootstrap-table-editable.js"></script>
    <script src="/template/js/data-table/bootstrap-editable.js"></script>
    <script src="/template/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="/template/js/data-table/colResizable-1.5.source.js"></script>
    <script src="/template/js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
        ============================================ -->
    <script src="/template/js/editable/jquery.mockjax.js"></script>
    <script src="/template/js/editable/mock-active.js"></script>
    <script src="/template/js/editable/select2.js"></script>
    <script src="/template/js/editable/moment.min.js"></script>
    <script src="/template/js/editable/bootstrap-datetimepicker.js"></script>
    <script src="/template/js/editable/bootstrap-editable.js"></script>
    <script src="/template/js/editable/xediable-active.js"></script>
    <!-- Chart JS
        ============================================ -->
    <script src="/template/js/chart/jquery.peity.min.js"></script>
    <script src="/template/js/peity/peity-active.js"></script>
    <!-- tab JS
        ============================================ -->
    <script src="/template/js/tab.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="/template/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="/template/js/main.js"></script>

    <script>
        function tes(){
          var tanggal = document.getElementById('date').value;
          window.location = "/bpp/dashboard/" + tanggal;
        }
    </script>
@endsection