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
                                            {{$surat->created_at->format('Y-m-d')}}
                                        </small> Detail surat Perintah Tugas Penyuluhan

                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div>
                                        <span class="font-extra-bold">Penyuluh: </span> {{$surat->draft_programa->user->nama}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Desa: </span> {{$surat->draft_programa->user->desa}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Kecamatan: </span> {{$surat->draft_programa->user->kecamatan}}
                                    </div>
                                    <div class="text-danger">
                                        <span class="font-extra-bold">Status: </span> {{$surat->status}}
                                    </div>
                                    <div>
                                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#checklist"><i class="fa fa-check"></i> Lihat Checklist kelayakan</button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Content surat Penyuluhan</h4>
                                    <p>{{$surat->content}}</p>
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
                                                    <a href="{{Storage::url($surat->berkas)}}" download>Download Berkas</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br>

                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    <a class="btn btn-default" href="/penyuluh/daftar_surat_tugas"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabs End-->

        <div id="checklist" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header header-color-modal bg-color-1">
                            <h4 class="modal-title">Checklist kelayakan</h4>
                        </div>
                        <div class="modal-body" style="text-align: left">
                            @if($surat->process_surat_tugas)
                            <table>
                                <tr>
                                    <th style="padding: 5px">Ceklis Kelayakan</th>
                                    <th style="padding: 5px">Verifikasi </th>
                                    <th style="padding: 5px"> Penjelasan</th>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Isi/Konten</h5>
                                        <p>berisi semua proses kegiatan berupa semua fakta yang didapatkan pada saat melakukan kegiatan penyuluhan</p>
                                    </td>
                                    <td>
                                        @if($surat->process_surat_tugas->status_isi)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$surat->process_surat_tugas->des_isi}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Berkas surat</h5>
                                        <p>Berkas surat berformat pdf atau docx</p>
                                    </td>
                                    <td>
                                        @if($surat->process_surat_tugas->status_berkas)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$surat->process_surat_tugas->des_berkas}}</p>
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

        <!-- <div id="DangerModalhdbgcl" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-4">
                        <h4 class="modal-title">Tolak berkas</h4>
                    </div>
                    <div class="modal-body" style="text-align: left">
                        <h4>Pesan :</h4>
                        <div class="form-group">
                            <label class="sr-only" for="f1-latar-belakang">Maksimal 500 kata</label>
                            <textarea name="f1-latar-belakang" placeholder="Maksimal 500 kata" 
                            class="f1-latar-belakang form-control" id="f1-latar-belakang" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" href="#">Cancel</a>
                        <a href="#">Process</a>
                    </div>
                </div>
            </div>
        </div> -->
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