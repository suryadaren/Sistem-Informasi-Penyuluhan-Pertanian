@extends('penyuluh.master')
@section('css_custom')
     <link rel="stylesheet" href="/template/css/dropzone/dropzone.css">
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
    
        <!-- Multi Upload Start-->
        <div class="multi-uploaded-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="alert-title dropzone-custom-sys">
                            <h2>Drag and Drop file uploads System</h2>
                            <p>Dropzone Drag and Drop file uploads javascript plugins. Users using an old browser will be able to upload files. If you want the whole body to be a Dropzone and display the files somewhere else you can simply instantiate a
                                Dropzone object for the body.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="dropzone-pro mg-tb-30">
                            <div id="dropzone1">
                                <form action="/upload" class="dropzone dropzone-custom needsclick" id="demo1-upload">
                                    <div class="dz-message needsclick download-custom">
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                        <h2>Drop files here or click to upload.</h2>
                                        <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js_custom')
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
@endsection