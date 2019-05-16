@extends('penyuluh.master')
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
                                    <h1>Form Laporan Kegiatan Penyuluhan Pertanian</h1>
                                </div>
                            </div>
                            <div class="sparkline10-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner inline-basic-form">
                                                <form action="/penyuluh/input_laporan_penyuluhan" method="post" enctype="multipart/form-data">
                                                    {{@csrf_field()}}
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Tema Penyuluhan</label>
                                                                <input name="tema" type="text" class="form-control basic-ele-mg-b-10 responsive-mg-b-10" placeholder="ex :  Penanganan Pasca Panen sebagai bahan baku olahan" value="{{old('tema')}}" />
                                                                  @if($errors->has('tema'))
                                                                    <div class="alert alert-danger" role="alert"> {{$errors->first('tema')}} </div>
                                                                  @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Konten penyuluhan (maksimal 1000 kata)</label>
                                                             <textarea name="content" class="f1-content form-control" id="f1-content" >{{old('content')}}</textarea>
                                                              @if($errors->has('content'))
                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('content')}} </div>
                                                              @endif
                                                            <p id="wordCount">words : 0</p>
                                                            <input type="hidden" id="words">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Berkas Laporan penyuluhan (docx,pdf)</label>
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
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Foto Kegiatan penyuluhan (jpg,jpeg,png)</label>
                                                            <div class="input-group control-group increment" >
                                                              <input type="file" name="foto[]" class="form-control">
                                                                  @if($errors->has('foto'))
                                                                    <div class="alert alert-danger" role="alert"> {{$errors->first('foto')}} </div>
                                                                  @endif
                                                              <div class="input-group-btn"> 
                                                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                              </div>
                                                            </div>
                                                            <div class="clone hide">
                                                              <div class="control-group input-group" style="margin-top:10px">
                                                                <input type="file" name="foto[]" class="form-control">
                                                                <div class="input-group-btn"> 
                                                                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                </div>
                                                              </div>
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
@endsection