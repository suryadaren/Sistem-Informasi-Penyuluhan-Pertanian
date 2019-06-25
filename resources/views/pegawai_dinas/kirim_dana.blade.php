@extends('pegawai_dinas.master')
@section('css_custom')
   <!-- summernote CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/summernote/summernote.css">
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
        
        <!-- Basic Form Start -->
        <div class="basic-form-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline10-list mt-b-30">
                            <div class="sparkline10-hd">
                                <div class="main-sparkline10-hd">
                                    <h1>Form Pengiriman Dana</h1>
                                </div>
                            </div>
                            <div class="sparkline10-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner inline-basic-form">
                                                <form action="/pegawai_dinas/input_kirim_dana/{{$proposal->id}}/{{$proposal->dana_dikirim}}" method="post" enctype="multipart/form-data">
                                                    {{@csrf_field()}}
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Jumlah dana yang akan dikirim(Rupiah)</label>
                                                            <input name="dana_dikirim" placeholder="ex : 1.000.000" required class="f1-total-dana form-control" id="f1-total-dana" type="text" class="form-control" value="{{$proposal->dana_dikirim}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>No. Rekening Pengirim</label>
                                                            <input name="norek" placeholder="ex : 412 439891" required class="form-control" type="text" class="form-control" value="{{old('norek')}}">
                                                            </div>
                                                                  @if($errors->has('norek'))
                                                                    <div class="alert alert-danger" role="alert"> {{$errors->first('norek')}} </div>
                                                                  @endif
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Nama Pengirim</label>
                                                            <input name="nama_pengirim" placeholder="ex : Surya Daren Hafizh" required class="form-control" type="text" class="form-control" value="{{old('norek')}}">
                                                            </div>
                                                                  @if($errors->has('nama_pengirim'))
                                                                    <div class="alert alert-danger" role="alert"> {{$errors->first('nama_pengirim')}} </div>
                                                                  @endif
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Bank Pengirim</label>
                                                            <input name="bank_pengirim" placeholder="ex : BRI" required class="form-control" type="text" class="form-control" value="{{old('norek')}}">
                                                            </div>
                                                                  @if($errors->has('bank_pengirim'))
                                                                    <div class="alert alert-danger" role="alert"> {{$errors->first('bank_pengirim')}} </div>
                                                                  @endif
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Foto Bukti Pengiriman (jpg,jpeg,png)</label>
                                                            <div class="input-group control-group" >
                                                              <input type="file" name="berkas" class="form-control">
                                                                  @if($errors->has('berkas'))
                                                                    <div class="alert alert-danger" role="alert"> {{$errors->first('berkas')}} </div>
                                                                  @endif
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button style="width: 100%" class="btn btn-sm btn-primary login-submit-cs" type="submit">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
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


        <div id="dangermodal" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-4">
                        <h4 class="modal-title">Peringatan !</h4>
                    </div>
                    <div class="modal-body" style="text-align: left">
                        <h4>Pesan :</h4>
                        <p>Jumlah Kata yang anda masukan melebehi 500 kata</p>
                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" class="btn btn-danger" href="#">Tutup</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabs End-->
@endsection

@section('js_custom')
     <!-- summernote JS
        ============================================ -->
    <script src="/template/js/summernote/summernote.min.js"></script>
    <script src="/template/js/summernote/summernote-active.js"></script>
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
        document.getElementById('f1-content').addEventListener('input', function () {
            var text = this.value,
            count = text.trim().replace(/\s+/g, ' ').split(' ').length;
            document.getElementById('wordCount').textContent = count;
            document.getElementById('words').value = count;
            if (count>1000) {
                $('#dangermodal').modal('show');
            }

        });
    </script>
    <script type="text/javascript">
        
        var rupiah = document.getElementById('f1-total-dana');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
 
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>
@endsection