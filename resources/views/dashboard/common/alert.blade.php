@if(session('error') || session('success'))
<div class="row" id="rowthongbao">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">Thông báo</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Error!</b> {{session('error')}}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Success!</b> {{session('success')}}
                </div>
                @endif
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div> <!-- /.row -->
@endif