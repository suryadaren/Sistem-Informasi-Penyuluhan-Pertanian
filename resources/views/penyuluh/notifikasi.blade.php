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
                            <h3>Notifikasi</h3>
                            <hr>
                                <div class="table-responsive">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                            @for($i = 0; $i < 20; $i++)
                                            <tr class="unread">
                                                <td class="">
                                                    <div class="checkbox checkbox-single checkbox-success">
                                                        <input type="checkbox" checked>
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Jeremy Massey</a></td>
                                                <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                                </td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date"><a href="/penyuluh/lihat_notifikasi" class="btn btn-primary">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <div class="checkbox checkbox-single">
                                                        <input type="checkbox">
                                                        <label></label>
                                                    </div>
                                                </td>
                                                <td><a href="#">Ivor Rios</a> <span class="label label-info">Social</span>
                                                </td>
                                                <td><a href="#">Sed quis augue in nunc venenatis finibus.</a></td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td class="text-right mail-date"><a href="/penyuluh/lihat_notifikasi" class="btn btn-primary">Lihat</a></td>
                                            </tr>
                                            @endfor
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