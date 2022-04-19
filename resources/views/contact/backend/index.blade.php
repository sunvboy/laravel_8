@extends('dashboard.layout.dashboard')
@section('title')
<title>Danh sách liên hệ</title>
@section('content')
@include('dashboard.common.breadcrumb',['name' => 'Danh sách liên hệ','key'=> 'Danh sách'])
@include('dashboard.common.alert')
<section class="content">
    <!-- MAILBOX BEGIN -->
    <div class="mailbox row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <!-- BOXES are complex enough to move the .box-header around.
                                                 This is an example of having the box header within the box body -->
                            <div class="box-header">
                                <i class="fa fa-inbox"></i>
                                <h3 class="box-title">INBOX</h3>
                            </div>
                            <!-- compose message btn -->
                            <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Soạn email</a>
                            <!-- Navigation - folders-->
                            <div style="margin-top: 15px;">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="header">Folders</li>
                                    <li <?php if (request()->get('type') == 'contact') { ?>class="active" <?php } ?> <?php if (empty(request()->get('type'))) { ?>class="active" <?php } ?>><a href="{{route('contact.index',['type'=>'contact'])}}"><i class="fa fa-inbox"></i> Liên hệ ({{!empty($countContact)?$countContact:0}})</a></li>
                                    <li <?php if (request()->get('type') == 'mail') { ?>class="active" <?php } ?>><a href="{{route('contact.index',['type'=>'mail'])}}"><i class="fa fa-pencil-square-o"></i> Đăng ký gửi email ({{!empty($countEmail)?$countEmail:0}})</a></li>
                                </ul>
                            </div>
                        </div><!-- /.col (LEFT) -->
                        <div class="col-md-9 col-sm-8">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
                                @include('dashboard.common.search',['module'=>'contacts'])
                            </div>

                            <div class="table-responsive">
                                <!-- THE MESSAGES -->
                                <table class="table table-mailbox">
                                    <tbody>
                                        <tr class="unread">
                                            <td class="small-col">
                                                <input type="checkbox" id="checkbox-all">
                                                <label for="check-all" class="labelCheckAll"></label>
                                            </td>
                                            <td class="name">Họ và tên</td>
                                            <td class="subject">Nội dung</td>
                                            <td class="time">Ngày gửi</td>
                                        </tr>
                                        @foreach($data as $v)
                                        <tr id="post-<?php echo $v->id; ?>">
                                            <td class="small-col">
                                                <input type="checkbox" name="checkbox[]" value="<?php echo $v->id; ?>" class="checkbox-item">
                                                <label for="" class="label-checkboxitem"></label>
                                            </td>
                                            <td class="name"><a href="" class="choose" data-info="<?php echo base64_encode(json_encode($v)); ?>">{{$v->fullname}}</a></td>
                                            <td class="subject">{{$v->message}}</td>
                                            <td class="time">@if($v->created_at)
                                                {{Carbon\Carbon::parse($v->created_at)->diffForHumans()}}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /.col (RIGHT) -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col (MAIN) -->
    </div>
    <!-- MAILBOX END -->

</section>
<!-- COMPOSE MESSAGE MODAL -->
<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Gửi email</h4>
            </div>
            <form action="{{route('contact.index_store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Subject:</span>
                            <input name="subject" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">TO:</span>
                            <input name="email_to" type="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">CC:</span>
                            <?php
                            echo Form::select('email_cc', $temp_email, '', ['class' => 'form-control select3']);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;" required></textarea>
                    </div>
                    <?php /*<div class="form-group">
                        <div class="btn btn-success btn-file">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="attachment" />
                        </div>
                        <p class="help-block">Max. 32MB</p>
                    </div>
                    */ ?>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Đóng</button>
                    <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Gửi email</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Thông tin liên hệ</h4>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Họ và tên</span>
                            <input name="fullname" type="text" class="form-control fullname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input name="email" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Số điện thoại</span>
                            <input name="phone" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Địa chỉ</span>
                            <input name="address" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">Nội dung</label>
                        <textarea name="message" class="form-control" style="height: 120px;"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fa fa-times"></i> Đóng</button>

                    </div>

                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).on('click', '.choose', function(e) {
        e.preventDefault();
        let _this = $(this);

        let data = _this.attr('data-info');
        data = window.atob(data);
        let json = JSON.parse(data);
        $('.fullname').val('').val(json.fullname);
        $('input[name="phone"]').val('').val(json.phone);
        $('input[name="email"]').val('').val(json.email);
        $('input[name="address"]').val('').val(json.address);
        $('textarea[name="message"]').val('').val(json.message);
        $('#info-modal').modal('show');
    });
</script>
<link href="{{asset('backend/css/select2/select2.min.css')}}" rel="stylesheet" />
<script src="{{asset('backend/js/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $('.select3').select2();
</script>
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
@endsection