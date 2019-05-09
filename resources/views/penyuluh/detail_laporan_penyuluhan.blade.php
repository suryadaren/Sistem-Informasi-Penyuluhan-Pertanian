@extends('penyuluh.master')
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
                                    <a class="btn btn-default" href="/penyuluh/daftar_laporan_penyuluhan"><i class="fa fa-arrow-left"></i> Kembali</a>
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