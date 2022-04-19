<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="fa fa-edit"></span> Thêm mới <span class="popup-title"></span></h4>
            </div>
            <div class="modal-body">
                
                <div class="box box-primary">
                <div class="alert-popup alert alert-danger mt10" style="display: none;"></div>
                    <form role="form" method="post" id="formPopup">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="hidden" value="" name="module">
                                <input type="text" name="title" class="form-control" placeholder="">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    //popup
    $(document).on('click', '.popup-show', function(e) {
        e.preventDefault();
        $("#myModal .alert-popup").removeClass('alert-danger').html('').hide();
        $("#myModal .alert-popup").removeClass('alert-success').html('').hide();
        $('#myModal input[name="title"]').val('');
        let module = $(this).attr('data-module');
        $('#myModal .popup-title').html(module);
        $('#myModal input[name="module"]').val(module);
        $('#myModal').modal('show');
    });
    $(document).on('submit', '#formPopup', function(e) {
        e.preventDefault();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            url: BASE_URL_AJAX + "ajax-create",
            type: "POST",
            dataType: "JSON",
            data: {
                module: $('#myModal input[name="module"]').val(),
                title: $('#myModal input[name="title"]').val(),
            },
            success: function(data) {
                if (data.code === 200) {
                    $("#myModal .alert-popup").removeClass('alert-danger').addClass('alert-success');
                    $("#myModal .alert-popup").html('Thêm mới thành công').show();
                    setTimeout(function() {
                        $("#myModal .alert-popup").hide();
                        $('#myModal input[name="title"]').val('');
                    }, 1500);

                }
            },
            error: function(jqXhr, json, errorThrown) {
                var errors = jqXhr.responseJSON;
                var errorsHtml = "";
                $.each(errors["errors"], function(index, value) {
                    errorsHtml += value + "/ ";
                });
                $("#myModal .alert-popup").removeClass('alert-success').addClass('alert-danger');
                $("#myModal .alert-popup").html(errorsHtml).show();
            },
        });
    });
</script>