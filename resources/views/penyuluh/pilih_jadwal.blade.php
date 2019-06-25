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
                                    <h1>Pilih Jadwal kegiatan</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" >
                                        <thead>
                                            <tr>
                                                <th data-field="no">No.</th>
                                                <th data-field="name">Tema</th>
                                                <th data-field="date">Jadwal_kegiatan</th>
                                                <th data-field="task">Status Laporan</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1; ?>

                                            @foreach($laporan_penyuluhan as $laporan)
                                                @if($laporan->draft_programa->user->id == auth()->guard('penyuluh')->id() && $laporan->draft_programa->status == "surat tugas diterbitkan")
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$laporan->tema}}</td>
                                                        <td>{{$laporan->jadwal_penyuluhan}}</td>
                                                        <td>{{$laporan->status}}</td>

                                                        @if($laporan->status == "belum di kirim" || $laporan->status == "unvalid oleh bpp" || $laporan->status == "unvalid oleh pegawai dinas")
                                                        <td class="datatable-ct"><a href="/penyuluh/buat_laporan_penyuluhan/{{$laporan->id}}" class="btn btn-primary">Pilih</a></td>
                                                        @else
                                                        <td class="datatable-ct"><a class="btn btn-primary" onclick="popup('{{$laporan->status}}')">Pilih</a></td>
                                                        @endif
                                                    </tr>
                                                @endif
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

        <div id="popup" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header header-color-modal bg-color-1">
                            <h4 class="modal-title">Peringatan</h4>
                        </div>
                        <div class="modal-body" style="text-align: left">
                            <p id="peringatan"></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">tutup</button>
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
        function popup(status){
            document.getElementById('peringatan').innerHTML = "Tidak Bisa membuat laporan karena status laporan : "+status;
            $('#popup').modal('show');
        }
    </script>
@endsection