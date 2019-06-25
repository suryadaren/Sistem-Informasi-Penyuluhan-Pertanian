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
                                        <span class="font-extra-bold">Dana dibutuhkan: </span>Rp. {{$draft->total_dana}},-
                                    </div>
                                    <div class="text-danger">
                                        <span class="font-extra-bold">Status: </span> {{$draft->status}}
                                    </div>
                                    <div>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#checklist"><i class="fa fa-check"></i> Lihat Checklist kelayakan</button>
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
                                    @if($draft->status == "belum diperiksa bpp")
                                        <a href="/bpp/process_draft/{{$draft->id}}" class="btn btn-primary">Process</a>
                                    @else
                                        <a class="btn btn-default" href="/bpp/daftar_draft_programa"><i class="fa fa-arrow-left"></i> Kembali</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="checklist" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header header-color-modal bg-color-1">
                            <h4 class="modal-title">Checklist kelayakan</h4>
                        </div>
                        <div class="modal-body" style="text-align: left">
                            @if($draft->process_draft_programa)
                            <table>
                                <tr>
                                    <th style="padding: 5px">Ceklis Kelayakan</th>
                                    <th style="padding: 5px">Verifikasi </th>
                                    <th style="padding: 5px"> Penjelasan</th>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Pendahuluan</h5>
                                        <p>Pendahuluan di lengkapi dengan latar belakang, tujuan dan manfat. <br>
                                        latar belakang <br>
                                        Latar belakang, menjelaskan munculnya masalah atau pertanyaan penelitian yang merupakan inferensi atau pengambilan kesimpulan dari fakta-fakta pendukung yang terdapat di draft programa sebelumnya atau di lapangan (misalnya hasil pengamata atau wawancara). Latar belakang harus bisa menunjukkan mengapa permasalahan yang diangkat dianggap penting. <br>
                                        tujuan <br>
                                        Tujuan, dituliskan dalam kalimat pernyataan yang sederhana dan jelas sesuai dengan masalah penelitian dan hasil yang ingin dicapai. <br>

                                        manfaat <br>
                                        Manfaat, menuliskan kontribusi skripsi terhadap ruang lingkup yang lebih dan/atau terhadap para pemangku kepentingan (stakeholders).</p>
                                    </td>
                                   
                                    <td>
                                        @if($draft->process_draft_programa->status_pendahuluan)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$draft->process_draft_programa->des_pendahuluan}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Keadaan</h5>
                                        <p>Dilengkapi dengan data biofisik, sumber daya manusia, dan kelembagaan usaha tani <br> 
                                        Keadaan, menuliskan keadaan atau kondisi yang ada pada target penelitian baik secara umum atau khusus.</p>
                                    </td>
                                   
                                    <td>
                                        @if($draft->process_draft_programa->status_keadaan)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$draft->process_draft_programa->des_keadaan}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Tujuan</h5>
                                        <p>Dilengkapi dengan data tujuan bersifat perilaku dan tujuan besifat non perilaku<br> 
                                        Tujuan, langkah pertama dalam pencapaian dari dilakukannya penelitian. Berupa target spesifik atau khusus. Penulisan indikasi ke arah mana atau data informasi yang dicari dari penelitian ini, dirumuskan dalam bentuk pernyataan yang konkret, dapat diamati dan diukur.</p>
                                    </td>
                                   
                                    <td>
                                        @if($draft->process_draft_programa->status_tujuan)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$draft->process_draft_programa->des_tujuan}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Permasalahan</h5>
                                        <p>Dilengkapi dengan data permasalahan bersifat perilaku, permasalahan besifat non perilaku, dan jumlah dana yang di butuhkan<br> 
                                        Tujuan, Menuliskan kesenjangan antara harapan dan kenyataan.menuliskan kesenjangan dari apa yang seharusnya  dan apa yang ada dalam kenyataan.</p>
                                    </td>
                                   
                                    <td>
                                        @if($draft->process_draft_programa->status_permasalahan)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$draft->process_draft_programa->des_permasalahan}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Berkas Draft programa</h5>
                                        <p>Berkas Draft Programa harus berformat pdf atau docx</p>
                                    </td>
                                   
                                    <td>
                                        @if($draft->process_draft_programa->status_berkas)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$draft->process_draft_programa->des_berkas}}</p>
                                    </td>
                                </tr>
                            </table>
                            @else
                                <p>Belum Di periksa</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">tutup</button>
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