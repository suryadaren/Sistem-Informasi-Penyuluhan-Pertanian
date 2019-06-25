@extends('penyuluh.master')
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
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Pilih Draft Programa yang akan di kirim dana</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" >
                                        <thead>
                                            <tr>
                                                <th data-field="no">No.</th>
                                                <th data-field="name">Draft tanggal</th>
                                                <th data-field="date">Dana Dibutuhkan</th>
                                                <th data-field="dana">Dana terkirim</th>
                                                <th data-field="task">Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1; ?>

                                            @foreach($draft_programa as $draft)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$draft->created_at}}</td>
                                                <td>Rp. {{$draft->total_dana}},-</td>
                                                <td>Rp. {{$draft->dana_terkirim}},-</td>
                                                <td>{{$draft->status}}</td>
                                                <td class="datatable-ct"><a href="/penyuluh/lihat_jadwal/{{$draft->id}}" class="btn btn-primary">Pilih</a></td>
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
@endsection