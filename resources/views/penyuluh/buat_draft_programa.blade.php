@extends('penyuluh.master')
@section('css_custom')
   <!-- CSS -->
        <link rel="stylesheet" href="/bootzard/css/form-elements.css">
        <link rel="stylesheet" href="/bootzard/css/style.css">
        <link rel="stylesheet" href="/template/style.css">

     <link rel="stylesheet" href="/template/css/dropzone/dropzone.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="/template/js/vendor/modernizr-2.8.3.min.js"></script>
@endsection

@section('content')
        
        <!-- Top content -->
        <div class="top-content text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 form-box">
                        <form name="content" role="form" action="/penyuluh/input_draft_programa" method="post" enctype="multipart/form-data" class="f1" >
                            {{@csrf_field()}}
                            <h3>Form Membuat Draft programa</h3>
                            <div class="f1-steps">
                                <div class="f1-progress">
                                    <div class="f1-progress-line" data-now-value="10" data-number-of-steps="3" style="width: 10%;"></div>
                                </div>
                                <div class="f1-step active">
                                    <div class="f1-step-icon"><i class="fa fa-angle-double-right"></i></div>
                                    <p>Pendahuluan</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-angle-double-right"></i></div>
                                    <p>Keadaan</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-angle-double-right"></i></div>
                                    <p>Tujuan</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-angle-double-right"></i></div>
                                    <p>Permasalahan</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-angle-double-right"></i></div>
                                    <p>Berkas</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-angle-double-right"></i></div>
                                    <p>Jadwal</p>
                                </div>
                            </div>
                            
                            <fieldset>
                                <h4>Latar Belakang (Maksimal 1000 kata)</h4>
                                <div class="form-group text-right text-right">
                                    <textarea name="f1-latar-belakang"  
                                    class="f1-latar-belakang form-control" id="f1-latar-belakang" >{{old('f1-latar-belakang')}}</textarea>
                                      @if($errors->has('f1-latar-belakang'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-latar-belakang')}} </div>
                                      @endif
                                    <p id="wordCount">jumlah kata : 0</p>
                                </div>
                                <h4>Tujuan  (Diisi dalam bentuk numbering)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-tujuan"   placeholder="1. &#x0a;2. &#x0a;3." 
                                    class="f1-tujuan form-control" id="f1-tujuan" >{{old('f1-tujuan')}}</textarea>
                                      @if($errors->has('f1-tujuan'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-tujuan')}} </div>
                                      @endif
                                    <p id="wordCountTujuan">jumlah kata : 0</p>
                                </div>
                                <h4>Manfaat (Diisi dalam bentuk numbering)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-manfaat"  placeholder="1. &#x0a;2. &#x0a;3."
                                    class="f1-manfaat form-control" id="f1-manfaat" >{{old('f1-tujuan')}}</textarea>
                                      @if($errors->has('f1-manfaat'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-manfaat')}} </div>
                                      @endif
                                    <p id="wordCountManfaat">jumlah kata : 0</p>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Biofisik (maksimal 1000 kata)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-biofisik"   placeholder="informasi faktual mengenai potensi, produktivitas, dan produksi komoditas" 
                                    class="f1-biofisik form-control" id="f1-biofisik" >{{old('f1-biofisik')}}</textarea>
                                      @if($errors->has('f1-biofisik'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-biofisik')}} </div>
                                      @endif
                                    <p id="wordCountBiofisik">jumlah kata : 0</p>
                                </div>
                                <h4>Sumber Daya Manusia (maksimal 1000 kata)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-sdm" placeholder="Perilaku dan Non Perilaku Pelaku Utama dan Pelaku Usaha dalam usaha tani" 
                                    class="f1-sdm form-control" id="f1-sdm" >{{old('f1-sdm')}}</textarea>
                                      @if($errors->has('f1-sdm'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-sdm')}} </div>
                                      @endif
                                    <p id="wordCountSdm">jumlah kata : 0</p>
                                </div>
                                <h4>Kelembagaan dan Sarana Usaha Tani (maksimal 1000 kata)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-usaha-tani" placeholder="dukungan Sistem Penyelenggaraan Penyuluhan Pertanian dan Lingkungan Usaha Tani" 
                                    class="f1-usaha-tani form-control" id="f1-usaha-tani" >{{old('f1-usaha-tani')}}</textarea>
                                      @if($errors->has('f1-usaha-tani'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-usaha-tani')}} </div>
                                      @endif
                                    <p id="wordCountUsahaTani">jumlah kata : 0</p>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Tujuan Bersifat Perilaku (maksimal 1000 kata)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-tujuan-perilaku" placeholder="perubahan yang akan dicapai dalam kurun waktu setahun bersifat perilaku" 
                                    class="f1-tujuan-perilaku form-control" id="f1-tujuan-perilaku" >{{old('f1-tujuan-perilaku')}}</textarea>
                                      @if($errors->has('f1-tujuan-perilaku'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-tujuan-perilaku')}} </div>
                                      @endif
                                    <p id="wordCountTujuanPerilaku">jumlah kata : 0</p>
                                </div>
                                <h4>Tujuan bersifat Non perilaku (maksimal 1000 kata)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-tujuan-non-perilaku" placeholder="perubahan yang akan dicapai dalam kurun waktu setahun bersifat non perilaku" 
                                    class="f1-tujuan-non-perilaku form-control" id="f1-tujuan-non-perilaku" >{{old('f1-tujuan-non-perilaku')}}</textarea>
                                      @if($errors->has('f1-tujuan-non-perilaku'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-tujuan-non-perilaku')}} </div>
                                      @endif
                                    <p id="wordCountTujuanNonPerilaku">jumlah kata : 0</p>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Masalah Bersifat Perilaku (maksimal 1000 kata)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-masalah-perilaku" placeholder="hal yang menyebabkan tidak tercapainya tujuan atau terjadinya perbedaan antara kondisi saat ini (faktual) dengan kondisi yang akan dicapai yang bersifat perilaku" 
                                    class="f1-masalah-perilaku form-control" id="f1-masalah-perilaku" >{{old('f1-masalah-perilaku')}}</textarea>
                                      @if($errors->has('f1-masalah-perilaku'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-masalah-perilaku')}} </div>
                                      @endif
                                    <p id="wordCountMasalahPerilaku">jumlah kata : 0</p>
                                </div>
                                <h4>Masalah bersifat Non perilaku (maksimal 1000 kata)</h4>
                                <div class="form-group text-right">
                                    <textarea name="f1-masalah-non-perilaku" placeholder="hal yang menyebabkan tidak tercapainya tujuan atau terjadinya perbedaan antara kondisi saat ini (faktual) dengan kondisi yang akan dicapai yang bersifat non perilaku" 
                                    class="f1-masalah-non-perilaku form-control" id="f1-masalah-non-perilaku" >{{old('f1-masalah-non-perilaku')}}</textarea>
                                      @if($errors->has('f1-masalah-non-perilaku'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-masalah-non-perilaku')}} </div>
                                      @endif
                                    <p id="wordCountMasalahNonPerilaku">jumlah kata : 0</p>
                                </div>
                                <h4>Jumlah Dana yang dibutuhkan (Rp)</h4>
                                <div class="form-group">
                                    <input name="f1-total-dana" placeholder="ex : 1.000.000" class="f1-total-dana form-control" value="{{old('f1-total-dana')}}" id="f1-total-dana" type="text" class="form-control">
                                      @if($errors->has('f1-total-dana'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('f1-total-dana')}} </div>
                                      @endif
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Upload berkas Draft proggrama (docx,pdf)</h4>
                                
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="dropzone-pro mg-tb-30">
                                        <div id="dropzone1">
                                                <div class="dz-message needsclick download-custom">
                                                    <input class="form-control file" name="berkas" type="file">
                                      @if($errors->has('berkas'))
                                        <div class="alert alert-danger" role="alert"> {{$errors->first('berkas')}} </div>
                                      @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Upload Jadwal Penyuluhan</h4>
                                
                            <div class="row" style="margin-bottom: 50px">
                                <div class="form-group row increment" style="width: 100%;margin-left: 0">

                                    <div class="control-group input-group form-inline" style="width: 100%;margin-top: 10px">

                                      <input type="text" name="materi[]" style="width: 70%" class="form-control" placeholder="masukan materi/tema penyuluhan">

                                      <input name="tanggal[]" class="form-control" type="date" style="width: 15%;margin-left: 2px;margin-right: 2px;height: 45px">

                                      <button style="width: 10%" class="btn btn-success" onclick="return false"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                                    </div>
                                </div>
                                <div class="clone hide row" style="width: 100%;margin-left: 0">

                                    <div class="control-group input-group form-inline" style="width: 100%;margin-top: 10px">

                                      <input type="text" name="materi[]" style="width: 70%" class="form-control" placeholder="masukan materi/tema penyuluhan">

                                      <input name="tanggal[]" class="form-control" type="date" style="width: 15%;margin-left: 2px;margin-right: 2px;height: 45px">

                                      <button style="width: 10%" class="btn btn-danger"><i class="glyphicon glyphicon-plus"></i>Hapus</button>
                                    </div>
                                </div>
                            </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                        
                        </form>
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
    <script src="/bootzard/js/jquery.backstretch.min.js"></script>
    <script src="/bootzard/js/retina-1.1.0.min.js"></script>
    <script src="/bootzard/js/scripts.js"></script>
    <!-- dropzone JS
        ============================================ -->
    <script src="/template/js/dropzone/dropzone.js"></script>
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

    document.getElementById('f1-latar-belakang').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCount').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-tujuan').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountTujuan').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-manfaat').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountManfaat').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-biofisik').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountBiofisik').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-sdm').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountSdm').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-usaha-tani').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountUsahaTani').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-tujuan-perilaku').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountTujuanPerilaku').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-tujuan-non-perilaku').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountTujuanNonPerilaku').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-masalah-perilaku').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountMasalahPerilaku').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });

    document.getElementById('f1-masalah-non-perilaku').addEventListener('input', function () {
        var text = this.value,
        count = text.trim().replace(/\s+/g, ' ').split(' ').length;
        document.getElementById('wordCountMasalahNonPerilaku').textContent = "jumlah kata : "+count;
        if (count>1000) {
            $('#dangermodal').modal('show');
        }

    });
    </script>

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