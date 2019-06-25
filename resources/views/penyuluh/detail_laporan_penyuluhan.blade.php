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
                                            {{$laporan->jadwal_penyuluhan}}
                                        </small> Detail Laporan Penyuluhan

                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div>
                                        <span class="font-extra-bold">Tema: </span> {{$laporan->tema}}
                                    </div>
                                    <div class="text-danger">
                                        <span class="font-extra-bold">Status: </span> {{$laporan->status}}
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">dana Terpakai: </span> {{$laporan->dana_terpakai}}
                                    </div>
                                    <div>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#checklist"><i class="fa fa-check"></i> Lihat Checklist kelayakan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Content Laporan Penyuluhan</h4>
                                    <p>{{$laporan->content}}</p>
                                </div>
                            </div>

                            <div class="border-bottom border-left border-right bg-white mg-tb-15">
                                <div>
                                    <div class="row">
                                        <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="hpanel">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-pdf-o text-info"></i>
                                                    <label>Berkas Laporan Penyuluhan</label>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    <a href="{{Storage::url($laporan->berkas)}}" download>Download Berkas laporan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <label>Foto Presensi Penyuluhan</label>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hpanel blog-box responsive-mg-b-30">
                                        <div class="panel-heading custom-blog-hd">
                                            <img src="{{Storage::url($laporan->presensi)}}" alt="foto">
                                        </div>
                                        <div class="panel-footer">
                                            <span class="pull-right"><i class="fa fa-download"> </i> <a href="{{Storage::url($laporan->presensi)}}" download>download</a></span>
                                            <i class="fa fa-eye"> </i> <a target="_blank" href="{{Storage::url($laporan->presensi)}}">lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <label>Galeri kegiatan Penyuluhan</label>
                            <div class="row">
                                @foreach($foto as $f)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hpanel blog-box responsive-mg-b-30">
                                        <div class="panel-heading custom-blog-hd">
                                            <img src="{{Storage::url($f)}}" alt="foto">
                                        </div>
                                        <div class="panel-footer">
                                            <span class="pull-right"><i class="fa fa-download"> </i> <a href="{{Storage::url($f)}}" download>download</a></span>
                                            <i class="fa fa-eye"> </i> <a target="_blank" href="{{Storage::url($f)}}">lihat</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <br>
                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    <a class="btn btn-default" href="/penyuluh/daftar_laporan_penyuluhan"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            @if($laporan->process_laporan_penyuluhan)
                            <table>
                                <tr>
                                    <th style="padding: 5px">Ceklis Kelayakan</th>
                                    <th style="padding: 5px">Verifikasi </th>
                                    <th style="padding: 5px"> Penjelasan</th>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Tema</h5>
                                        <p>Sesuai dengan tema yang sudah di tentukan pada draft programa</p>
                                    </td>
                                    <td>
                                        @if($laporan->process_laporan_penyuluhan->status_tema)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$laporan->process_laporan_penyuluhan->des_tema}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Isi/Konten</h5>
                                        <p>berisi semua proses kegiatan berupa semua fakta yang didapatkan pada saat melakukan kegiatan penyuluhan</p>
                                    </td>
                                    <td>
                                        @if($laporan->process_laporan_penyuluhan->status_isi)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$laporan->process_laporan_penyuluhan->des_isi}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Berkas Laporan</h5>
                                        <p>Berkas laporan berformat pdf atau docx</p>
                                    </td>
                                    <td>
                                        @if($laporan->process_laporan_penyuluhan->status_berkas)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$laporan->process_laporan_penyuluhan->des_berkas}}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>Foto Laporan</h5>
                                        <p>Foto sudah berformat jpg,jpeg,png,bmp. dan tanpa rekayasa</p>
                                    </td>
                                    <td>
                                        @if($laporan->process_laporan_penyuluhan->status_foto)
                                            <span class="fa fa-check text-primary"></span>
                                        @else
                                            <span class="fa fa-times text-danger"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{$laporan->process_laporan_penyuluhan->des_foto}}</p>
                                    </td>
                                </tr>
                            </table>
                            @else
                                <p>Laporan Belum Di periksa</p>
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