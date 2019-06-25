@extends('bpp.master')
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
                            <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                                <li class="active"><a data-toggle="tab" href="#TabProject"><span class="adminpro-icon adminpro-analytics tab-custon-ic"></span>Data Pribadi</a>
                                </li>
                                <li><a data-toggle="tab" href="#TabDetails"><span class="adminpro-icon adminpro-analytics-arrow tab-custon-ic"></span>Ubah Data</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">
                                    <div class="row">
                                      <div class="col-md-6 text-center" style="border-right: 1px solid black">
                                        <div class="profile-pic">
                                          <p><img src="{{Storage::url($user->foto)}}" class="img-circle" style="width: 50%"></p>
                                        </div>
                                      </div>
                                      <!-- /col-md-6 -->
                                      <div class="col-md-6 profile-text">
                                        <h3>{{$user->nama}}</h3>
                                        <h6 style="color: red">{{$user->jabatan}}</h6>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><b>Username</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{$user->username}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><b>NIP</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{$user->nip}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><b>Email</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{$user->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><b>Kecamatan Wilayah Kerja</b></p>
                                            </div>
                                            <div class="col-md-9">
                                                <p>{{$user->kecamatan}}</p>
                                            </div>
                                        </div>
                                      </div>
                                      <!-- /col-md-6 -->
                                    </div>
                                    <!-- /row -->
                                </div>
                                <div id="TabDetails" class="tab-pane row animated flipInX custon-tab-style1">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <div class="devit-card-custom">
                                            <div class="basic-login-form-ad">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="all-form-element-inner">
                                                            <form action="/bpp/ubah_data/{{auth()->guard('bpp')->id()}}" method="post" enctype="multipart/form-data">
                                                                {{@csrf_field()}}
                                                                {{@method_field('put')}}
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Nama</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="nama" type="text" class="form-control" value="{{$user->nama}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Username</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="username" type="text" class="form-control" value="{{$user->username}}" />
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">NIP</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="nip" type="text" class="form-control" value="{{$user->nip}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Email</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="email" type="email" class="form-control" value="{{$user->email}}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                            <label class="login2 pull-right pull-right-pro">Kecamatan</label>
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                            <input name="kecamatan" type="text" class="form-control" value="{{$user->kecamatan}}" />
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
                                                                                        <input name="foto" type="file" onchange="document.getElementById('append-small-btn').value = this.value;">
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
@endsection