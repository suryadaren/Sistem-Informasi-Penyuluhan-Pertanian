@extends('bpp.master')
@section('css_custom')

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
        
        <div class="mailbox-view-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="hpanel email-compose mailbox-view mg-b-15">
                            <div class="panel-heading hbuilt">

                                <div class="p-xs h4">
                                    <small class="pull-right">
                                            {{$laporan->created_at}}
                                        </small> Detail Laporan Penyuluhan

                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div>
                                        <span class="font-extra-bold">Tema: </span> {{$laporan->tema}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Penyuluh: </span> {{$laporan->user->nama}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Status: </span> {{$laporan->status}}
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Content Laporan Penyuluhan</h4>
                                    <p>{{$laporan->content}}</p>
                                </div>
                            </div>

                            <div class="border-bottom border-left border-right bg-white mg-tb-15">
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="hpanel">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-pdf-o text-info"></i>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <a href="{{Storage::url($laporan->berkas)}}" download>Download Berkas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                @foreach($foto as $f)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hpanel blog-box responsive-mg-b-30">
                                        <div class="panel-heading custom-blog-hd">
                                            <img src="{{Storage::url($f)}}" alt="foto">
                                        </div>
                                        <div class="panel-footer">
                                            <span class="pull-right"><i class="fa fa-download"> </i> <a href="{{Storage::url($f)}}" download>download</a></span>
                                            <i class="fa fa-eye"> </i> <a target="_blank" href="{{Storage::url($f)}}">lihat</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <br>

                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#DangerModalhdbgcl"><i class="fa fa-times"></i> Tolak</button>
                                    <button class="btn btn-primary"  data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-check"></i> Terima</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabs End-->

        <div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <form action="/bpp/setujui_laporan/{{$laporan->id}}" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}
                    {{@method_field('put')}}
                    <div class="modal-content">
                        <div class="modal-header header-color-modal bg-color-1">
                            <h4 class="modal-title">Terima berkas</h4>
                        </div>
                        <div class="modal-body" style="text-align: left">
                            <h4>ceklis form yang sudah lengkap</h4>
                            <div class="checkbox">
                              <label><input name="cek[]" type="checkbox" value="content">content</label>
                            </div>
                            <div class="checkbox">
                              <label><input name="cek[]" type="checkbox" value="berkas">berkas</label>
                            </div>
                            <div class="checkbox">
                              <label><input name="cek[]" type="checkbox" value="foto">foto</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">tutup</button>
                            <input type="submit" class="btn btn-primary" value="simpan">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="DangerModalhdbgcl" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-4">
                        <h4 class="modal-title">Tolak berkas</h4>
                    </div>
                    <div class="modal-body" style="text-align: left">
                        <h4>Pesan :</h4>
                        <div class="form-group">
                            <label class="sr-only" for="f1-latar-belakang">Maksimal 500 kata</label>
                            <textarea name="f1-latar-belakang" placeholder="Maksimal 500 kata" 
                            class="f1-latar-belakang form-control" id="f1-latar-belakang" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" href="#">Cancel</a>
                        <a href="#">Process</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabs End-->
@endsection

@section('js_custom')
     <!-- morrisjs JS
        ============================================ -->
    <script src="/template/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="/template/js/sparkline/jquery.charts-sparkline.js"></script>
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