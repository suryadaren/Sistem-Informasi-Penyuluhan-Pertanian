@extends('bpp.master')
@section('css_custom')
<!-- modals CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/modals.css">
    <!-- style CSS
        ============================================ -->
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
                                            08:26 PM (16 hours ago)
                                        </small> Email view

                                </div>
                            </div>
                            <div class="border-top border-left border-right bg-light">
                                <div class="p-m custom-address-mailbox">

                                    <div>
                                        <span class="font-extra-bold">Subject: </span> Lorem Ipsum has been the industry's standard dummy text ever
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">From: </span>
                                        <a href="#">example.@email.com</a>
                                    </div>
                                    <div>
                                        <span class="font-extra-bold">Date: </span> 14.10.2016
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body panel-csm">
                                <div>
                                    <h4>Hello Jonathan! </h4>

                                    <p>Dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the dustrys</strong> standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                                        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                        containing Lorem Ipsum passages, and more
                                        <br/>
                                        <br/>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                                        a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. recently with.</p>

                                    <p>Mark Smith
                                    </p>
                                </div>
                            </div>

                            <div class="border-bottom border-left border-right bg-white mg-tb-15">
                                <p class="m-b-md">
                                    <span><i class="fa fa-paperclip"></i> 3 attachments - </span>
                                    <a href="#" class="btn btn-default btn-xs">Download all in zip format <i class="fa fa-file-zip-o"></i> </a>
                                </p>

                                <div>
                                    <div class="row">
                                        <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="hpanel">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-pdf-o text-info"></i>
                                                </div>
                                                <div class="panel-footer">
                                                    <a href="#">Document_2016.doc</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="hpanel">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-audio-o text-warning"></i>
                                                </div>
                                                <div class="panel-footer">
                                                    <a href="#">Audio_2016.doc</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="hpanel">
                                                <div class="panel-body file-body incon-ctn-view">
                                                    <i class="fa fa-file-excel-o text-success"></i>
                                                </div>
                                                <div class="panel-footer">
                                                    <a href="#">Sheets_2016.doc</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel-footer text-right">
                                <div class="btn-group">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#DangerModalhdbgcl"><i class="fa fa-times"></i> Tolak</button>
                                    <button class="btn btn-primary"  data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-check"></i> Terima</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header header-color-modal bg-color-1">
                        <h4 class="modal-title">Terima berkas</h4>
                    </div>
                    <div class="modal-body" style="text-align: left">
                        <h4>ceklis form yang sudah lengkap</h4>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Pendahuluan</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Keadaan</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Tujuan</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Permasalahan</label>
                        </div>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Berkas</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" href="#">Cancel</a>
                        <a href="#">Process</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="dangermodal" class="modal modal-adminpro-general FullColor-popup-DangerModal fade" role="dialog">
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