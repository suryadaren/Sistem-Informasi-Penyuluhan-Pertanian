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
                                            {{$draft->created_at}}
                                        </small> Draft Programa

                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div>
                                        <span class="font-extra-bold">Penyuluh: </span> {{$draft->user->nama}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Desa: </span> {{$draft->user->desa}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Kecamatan: </span> {{$draft->user->kecamatan}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Status: </span> {{$draft->status}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Dana dibutuhkan: </span>Rp. {{$draft->total_dana}},-
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Latar Belakang</h4>

                                    <p>{{$draft->latar_belakang}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Tujuan</h4>

                                    <p>{{$draft->tujuan}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Manfaat</h4>

                                    <p>{{$draft->manfaat}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Biofisik</h4>

                                    <p>{{$draft->biofisik}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Sumber Daya Manusia</h4>

                                    <p>{{$draft->sdm}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Kelembagaan dan Sarana Usaha Tani</h4>

                                    <p>{{$draft->usaha_tani}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Tujuan Bersifat Perilaku</h4>

                                    <p>{{$draft->tujuan_perilaku}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Tujuan Bersifat Non Perilaku</h4>

                                    <p>{{$draft->tujuan_non_perilaku}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Masalah Bersifat Perilaku</h4>

                                    <p>{{$draft->masalah_perilaku}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Masalah Bersifat Non Perilaku Belakang</h4>

                                    <p>{{$draft->masalah_non_perilaku}}</p>
                                </div>
                            </div>
                            <br>

                            <div class="border-bottom border-left border-right bg-white mg-tb-15">
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="hpanel">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-pdf-o text-info"></i>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <a href="{{Storage::url($draft->berkas)}}" download>Download Berkas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    <a class="btn btn-default" href="/penyuluh/daftar_draft_programa"><i class="fa fa-arrow-left"></i> Kembali</a>
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