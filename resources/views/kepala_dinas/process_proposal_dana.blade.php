@extends('kepala_dinas.master')
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-cart-inner">
                            <div id="example-basic">
                                <h3>Ceklis Kelayakan Laporan proposal</h3>
                                <section>
                                    <div class="product-list-cart">
                                        <div class="product-status-wrap border-pdt-ct">
                                            <form action="/kepala_dinas/input_process_proposal_dana/{{$id}}" method="post" enctype="multipart/form-data">
                                            {{@csrf_field()}}
                                            {{@method_field('put')}}
                                            <table>
                                                <tr>
                                                    <th>Ceklis Kelayakan</th>
                                                    <th>Verifikasi(Ceklis jika sudah layak)</th>
                                                    <th>Penjelasan</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Dana dikirim</h3>
                                                        <p>Jumlah dana yang dikirim tidak melebihi dari jumlah dana yang sudah di tentukan</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" style="transform: scale(1.5);" class="form-controle" name="dana" value="isi">
                                                    </td>
                                                    <td>
                                                        <textarea name="des_dana" cols="30" rows="3">{{old('des_dana')}}</textarea>
                                                          @if($errors->has('des_dana'))
                                                            <div class="alert alert-danger" role="alert"> {{$errors->first('des_dana')}} </div>
                                                          @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Isi/Konten</h3>
                                                        <p>Surat tugas berisi tentang perintah penugasan atau wewenang kepada sesorang untuk melakukan sebuah kegiatan <br>
                                                        surat tugas sudah di lengkapi dengan kop surat, judul surat, detail nama penerima surat, dnan isi surat tugas</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" style="transform: scale(1.5);" class="form-controle" name="isi" value="isi">
                                                    </td>
                                                    <td>
                                                        <textarea name="des_isi" cols="30" rows="3">{{old('des_isi')}}</textarea>
                                                          @if($errors->has('des_isi'))
                                                            <div class="alert alert-danger" role="alert"> {{$errors->first('des_isi')}} </div>
                                                          @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Berkas Laporan</h3>
                                                        <p>Berkas laporan berformat pdf atau docx</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" style="transform: scale(1.5);" class="form-controle" name="berkas" value="berkas">
                                                    </td>
                                                    <td>
                                                        <textarea name="des_berkas" cols="30" rows="3">{{old('des_berkas')}}</textarea>
                                                          @if($errors->has('des_berkas'))
                                                            <div class="alert alert-danger" role="alert"> {{$errors->first('des_berkas')}} </div>
                                                          @endif
                                                    </td>
                                                </tr>
                                            </table>
                                                <input type="submit" class="btn btn-primary" value="Submit" style="width: 100%">
                                        </form>
                                        </div>
                                    </div>
                                </section>
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