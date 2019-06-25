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
                                <h3>Ceklis Kelayakan Draft Progama</h3>
                                <section>
                                    <div class="product-list-cart">
                                        <div class="product-status-wrap border-pdt-ct">
                                            <form action="/bpp/input_process_draft/{{$id}}" method="post" enctype="multipart/form-data">
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
                                                        <h3>Pendahuluan</h3>
                                                        <p>Pendahuluan di lengkapi dengan latar belakang, tujuan dan manfat. <br>
                                                        latar belakang <br>
                                                        Latar belakang, menjelaskan munculnya masalah atau pertanyaan penelitian yang merupakan inferensi atau pengambilan kesimpulan dari fakta-fakta pendukung yang terdapat di draft programa sebelumnya atau di lapangan (misalnya hasil pengamata atau wawancara). Latar belakang harus bisa menunjukkan mengapa permasalahan yang diangkat dianggap penting. <br>
                                                        tujuan <br>
                                                        Tujuan, dituliskan dalam kalimat pernyataan yang sederhana dan jelas sesuai dengan masalah penelitian dan hasil yang ingin dicapai. <br>

                                                        manfaat <br>
                                                        Manfaat, menuliskan kontribusi skripsi terhadap ruang lingkup yang lebih dan/atau terhadap para pemangku kepentingan (stakeholders).</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-controle" style="transform: scale(1.5);" name="pendahuluan" value="tema">
                                                    </td>
                                                    <td>
                                                        <textarea name="des_pendahuluan" cols="30" rows="3">{{old('des_pendahuluan')}}</textarea>
                                                          @if($errors->has('des_pendahuluan'))
                                                            <div class="alert alert-danger" role="alert"> {{$errors->first('des_pendahuluan')}} </div>
                                                          @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Keadaan</h3>
                                                        <p>Dilengkapi dengan data biofisik, sumber daya manusia, dan kelembagaan usaha tani <br> 
                                                        Keadaan, menuliskan keadaan atau kondisi yang ada pada target penelitian baik secara umum atau khusus.</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" style="transform: scale(1.5);" class="form-controle" name="keadaan" value="tema">
                                                    </td>
                                                    <td>
                                                        <textarea name="des_keadaan" cols="30" rows="3">{{old('des_keadaan')}}</textarea>
                                                          @if($errors->has('des_keadaan'))
                                                            <div class="alert alert-danger" role="alert"> {{$errors->first('des_keadaan')}} </div>
                                                          @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Tujuan</h3>
                                                        <p>Dilengkapi dengan data tujuan bersifat perilaku dan tujuan besifat non perilaku<br> 
                                                        Tujuan, langkah pertama dalam pencapaian dari dilakukannya penelitian. Berupa target spesifik atau khusus. Penulisan indikasi ke arah mana atau data informasi yang dicari dari penelitian ini, dirumuskan dalam bentuk pernyataan yang konkret, dapat diamati dan diukur.</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" style="transform: scale(1.5);" class="form-controle" name="tujuan" value="tema">
                                                    </td>
                                                    <td>
                                                        <textarea name="des_tujuan" cols="30" rows="3">{{old('des_tujuan')}}</textarea>
                                                          @if($errors->has('des_tujuan'))
                                                            <div class="alert alert-danger" role="alert"> {{$errors->first('des_tujuan')}} </div>
                                                          @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Permasalahan</h3>
                                                        <p>Dilengkapi dengan data permasalahan bersifat perilaku, permasalahan besifat non perilaku, dan jumlah dana yang di butuhkan<br> 
                                                        Tujuan, Menuliskan kesenjangan antara harapan dan kenyataan.menuliskan kesenjangan dari apa yang seharusnya  dan apa yang ada dalam kenyataan.</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" style="transform: scale(1.5);" class="form-controle" name="permasalahan" value="tema">
                                                    </td>
                                                    <td>
                                                        <textarea name="des_permasalahan" cols="30" rows="3">{{old('des_permasalahan')}}</textarea>
                                                          @if($errors->has('des_permasalahan'))
                                                            <div class="alert alert-danger" role="alert"> {{$errors->first('des_permasalahan')}} </div>
                                                          @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3>Berkas Draft programa</h3>
                                                        <p>Berkas Draft Programa harus berformat pdf atau docx</p>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" style="transform: scale(1.5);" class="form-controle" name="berkas" value="tema">
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