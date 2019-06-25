@extends('admin.master')
@section('css_custom')
<!-- tabs CSS
        ============================================ -->
    <link rel="stylesheet" href="/template/css/tabs.css">
    
    <link rel="stylesheet" href="/template/css/form/all-type-forms.css">
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
        <div class="admintab-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="admintab-wrap mg-t-30">
                            <div class="tab-content">
                                <div class="row animated flipInX">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <div class="devit-card-custom">
                                            <div class="basic-login-form-ad">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="all-form-element-inner">
                                                            <form action="/admin/input_tambah_pengguna" method="post" enctype="multipart/form-data">
                                                                {{@csrf_field()}}
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Nama</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="nama" type="text" class="form-control" value="{{old('nama')}}" />
                                                                              @if($errors->has('nama'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('nama')}} </div>
                                                                              @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Username</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="username" type="text" class="form-control" value="{{old('username')}}" />
                                                                              @if($errors->has('username'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('username')}} </div>
                                                                              @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Password</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="password" type="password" class="form-control" />
                                                                              @if($errors->has('password'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('password')}} </div>
                                                                              @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">NIP</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="nip" type="text" class="form-control" value="{{old('nip')}}" />
                                                                              @if($errors->has('nip'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('nip')}} </div>
                                                                              @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Email</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="email" type="email" class="form-control" value="{{old('email')}}" />
                                                                              @if($errors->has('email'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('email')}} </div>
                                                                              @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Desa</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="desa" type="text" class="form-control" value="{{old('desa')}}" />
                                                                              @if($errors->has('desa'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('desa')}} </div>
                                                                              @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Kecamatan</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="kecamatan" type="text" class="form-control" value="{{old('kecamatan')}}" />
                                                                              @if($errors->has('kecamatan'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('kecamatan')}} </div>
                                                                              @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Jabatan</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <select name="jabatan" class="form-control">
                                                                                <option value="penyuluh">penyuluh</option>
                                                                                <option value="bpp">bpp</option>
                                                                                <option value="pegawai_dinas">pegawai_dinas</option>
                                                                                <option value="kepala_dinas">kepala_dinas</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Foto</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="file-upload-inner file-upload-inner-right ts-forms">
                                                                                <div class="input append-small-btn">
                                                                                    <div class="file-button">
                                                                                        Browse
                                                                                        <input name="foto" type="file">
                                                                              @if($errors->has('nama'))
                                                                                <div class="alert alert-danger" role="alert"> {{$errors->first('nama')}} </div>
                                                                              @endif
                                                                                    </div>
                                                                                    <input type="text" id="append-small-btn" placeholder="no file selected">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="login-btn-inner">
                                                                        <div class="row">
                                                                            <div class="col-lg-3"></div>
                                                                            <div class="col-lg-9">
                                                                                <div class="login-horizental cancel-wp pull-left">
                                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Simpan</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tabs End-->
@endsection

@section('js_custom')
    <!-- tab JS
        ============================================ -->
    <script src="/template/js/tab.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="/template/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="/template/js/main.js"></script>
    <script>
        
    </script>
@endsection