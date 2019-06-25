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
        <div class="mailbox-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="hpanel mg-b-15">
                            <div class="panel-body">
                            <h3>Daftar Notifikasi</h3>
                            <br><br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                            <tr>
                                                <th>Nama Pengirim</th>
                                                <th>Jabatan</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            @foreach($notifikasi as $notif)
                                                @if($notif->status == "belum di baca")
                                                    <tr class="unread">
                                                        <td>{{$notif->user->nama}} <span class="label label-info">notifikasi baru</span></td>
                                                        <td>{{$notif->user->jabatan}}</td>
                                                        <td>{{$notif->created_at->format('Y-m-d')}}</td>
                                                        <td>{{$notif->deskripsi}}</td>
                                                        <td class="text-center"><a style="width: 200px" href="/penyuluh/lihat_notifikasi/{{$notif->id}}" class="btn btn-primary">Lihat detail</a></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>{{$notif->user->nama}}</td>
                                                        <td>{{$notif->user->jabatan}}</td>
                                                        <td>{{$notif->created_at->format('Y-m-d')}}</td>
                                                        <td>{{$notif->deskripsi}}</td>
                                                        <td class="text-center"><a style="width: 200px" href="/penyuluh/lihat_notifikasi/{{$notif->id}}" class="btn btn-primary">Lihat detail</a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
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