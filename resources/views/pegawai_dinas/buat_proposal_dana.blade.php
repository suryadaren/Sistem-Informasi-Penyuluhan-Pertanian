@extends('pegawai_dinas.master')
@section('css_custom')
   <!-- CSS -->
        <link rel="stylesheet" href="/bootzard/css/form-elements.css">
        <link rel="stylesheet" href="/bootzard/css/style1.css">
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
                        <form role="form" action="" method="post" class="f1">

                            <h3>Form Membuat Proposal Dana</h3>
                            <div class="f1-steps">
                                <div class="f1-progress">
                                    <div class="f1-progress-line" data-now-value="16.16" data-number-of-steps="3" style="width: 16.16%"></div>
                                </div>
                                <div class="f1-step active">
                                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                    <p>Draft Programma</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                    <p>Data</p>
                                </div>
                                <div class="f1-step">
                                    <div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
                                    <p>Berkas</p>
                                </div>
                            </div>
                            
                            <fieldset>
                                <h4>Pilih Draft Programa dan penyuluh yang akan di kirim dana :</h4>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                      <option>Nama Penyuluh</option>
                                      <option>Nama penyuluh</option>
                                      <option>Nama penyuluh</option>
                                      <option>Nama penyuluh</option>
                                      <option>Nama penyuluh</option>
                                    </select>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Jumlah Bantuan yang Akan dikirim :</h4>
                                <div class="form-group">
                                    <div class="col-10">
                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                      </div>
                                </div>
                                <h4>Isi Proposal :</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-sdm">Maksimal 500 kata</label>
                                    <textarea name="f1-sdm" placeholder="Maksimal 500 kata" 
                                    class="f1-sdm form-control" id="f1-sdm" required></textarea>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Upload berkas Draft proggrama:</h4>
                                
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
@endsection