<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form>
                @csrf
                <div class="print-error-msg alert" style="display: none;"><ul></ul></div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" class="form-control" name="fullname" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung</label>
                    <textarea class="form-control" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">


    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var fullname = $("input[name='fullname']").val();
            var phone = $("input[name='phone']").val();
            var email = $("input[name='email']").val();
            var address = $("input[name='address']").val();
            var message = $("textarea[name='message']").val();
            $.ajax({
                url: "<?php echo url('lien-he')?>",
                type:'POST',
                data: {_token:_token, fullname:fullname, phone:phone, email:email, address:address, message:message},
                success: function(data) {
                    
                    if($.isEmptyObject(data.error)){
                        $(".print-error-msg").html('').removeClass('alert-danger').addClass('alert-success');
                        $(".print-error-msg").css('display','block');
                        $(".print-error-msg").html(data.success);
                        setTimeout(function(){
                            location.reload();

                        }, 1000);
                    }else{
                        $(".print-error-msg").html('').addClass('alert-danger');
                        $(".print-error-msg").css('display','block');
                        $(".print-error-msg").html(data.error);
                    }
                }
            });
        });
        function printErrorMsg (msg) {
            $(".print-error-msg").html('').addClass('alert-danger');
            $(".print-error-msg").css('display','block');
            let error = '';
            $.each( msg, function( key, value ) {
                error += value+' /';
                $(".print-error-msg").html(error);
            });
        }
    });


</script>