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
                                    <h3>Detail Pengiriman Dana</h3>
                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5><span class="font-extra-bold">Jumlah</span> </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: Rp. {{$dana->jumlah}},-</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5><span class="font-extra-bold">No. Rekening Pengirim</span> </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{$dana->norek}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5><span class="font-extra-bold">Nama Pengirim</span> </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{$dana->nama_pengirim}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5><span class="font-extra-bold">Bank Pengirim</span> </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{$dana->bank_pengirim}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5><span class="font-extra-bold">Tanggal dikirim</span> </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{$dana->created_at->format('Y-m-d')}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5><span class="font-extra-bold">Status</span> </h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{$dana->status}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>Foto Bukti Pengiriman</label>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hpanel blog-box responsive-mg-b-30">
                                        <div class="panel-heading custom-blog-hd">
                                            <img src="{{Storage::url($dana->berkas)}}" alt="foto">
                                        </div>
                                        <div class="panel-footer">
                                            <span class="pull-right"><i class="fa fa-download"> </i> <a href="{{Storage::url($dana->berkas)}}" download>download</a></span>
                                            <i class="fa fa-eye"> </i> <a target="_blank" href="{{Storage::url($dana->berkas)}}">lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    @if($dana->status == "dana dikirim")
                                        <a class="btn btn-default" href="/penyuluh/daftar_pengiriman_dana"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        <a class="btn btn-success" href="#" onclick="popup('{{$dana->id}}')"> Konfirmasi Terima <i class="fa fa-arrow-right"></i></a>
                                    @else
                                        <a class="btn btn-default" href="/penyuluh/daftar_pengiriman_dana"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    @endif
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
                            <p>Apakah Anda sudah menerima dana yang di kirim ?</p>
                        </div>
                        <form name="form" action="/penyuluh/konfirmasi" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id">
                            <div class="modal-footer">
                                <button class="btn btn-danger" data-dismiss="modal">tutup</button>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
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

    <script>
        function popup(id){
            document.forms['form']['id'].value = id;
            $('#popup').modal('show');
        }
    </script>
@endsection