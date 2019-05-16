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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-cart-inner">
                            <div id="example-basic">
                                <h3>Ceklis Kelayakan Laporan proposal</h3>
                                <section>
                                    <div class="product-list-cart">
                                        <div class="product-status-wrap border-pdt-ct">
                                            <form action="/bpp/input_process/{{$id}}" method="post" enctype="multipart/form-data">
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
                                                        <h3>Tema</h3>
                                                        <p>Sesuai dengan tema yang sudah di tentukan pada draft programa</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-controle" name="tema" value="tema">
                                                    </td>
                                                    <td>
                                                        <textarea required name="des_tema" cols="30" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Isi/Konten</h3>
                                                        <p>berisi semua proses kegiatan berupa semua fakta yang didapatkan pada saat melakukan kegiatan penyuluhan</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-controle" name="isi" value="isi">
                                                    </td>
                                                    <td>
                                                        <textarea required name="des_isi" cols="30" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Berkas Laporan</h3>
                                                        <p>Berkas laporan berformat pdf atau docx</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-controle" name="berkas" value="berkas">
                                                    </td>
                                                    <td>
                                                        <textarea required name="des_berkas" cols="30" rows="3"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Foto Laporan</h3>
                                                        <p>Foto sudah berformat jpg,jpeg,png,bmp. dan tanpa rekayasa</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-controle" name="foto" value="foto">
                                                    </td>
                                                    <td>
                                                        <textarea required name="des_foto" cols="30" rows="3"></textarea>
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