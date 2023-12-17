@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Register DO</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Register DO</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form id="damageForm" novalidate="novalidate">
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="do_no">DO No. <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="do_no" name="do_no" placeholder="Enter DO No.">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status <span style="color:red;">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Do Status</option>
                                        <option value="Block">Block</option>
                                        <option value="Unblock">Unblock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

$(function () {

    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');
    var checkToken = localStorage.getItem('token');

    if(getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/doblock/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('.text').text('Update Register DO');
            $('#do_no').val(response.do_no);
            $('#status').val(response.status);
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.validator.setDefaults({
    submitHandler: function () {
        var do_no = $("#do_no").val();
        var status = $("#status").val();
        if(getCateId[1]){
            const data = {
                'do_no':do_no,
                'status':status,
                'user_id':user_id,
                'depo_id':depo_id,
                'id':getCateId[1]
            }
            post('doblock/update',data);
        }else{
            const data = {
                'do_no':do_no,
                'status':status,
                'user_id':user_id,
                'depo_id':depo_id,
            }
            post('doblock/create',data);
        }
        window.location = `/doblock/all`
    }
  }); 

    $('#damageForm').validate({
    rules: {
        do_no: {
            required: true,
        },
        status: {
            required: true,
        }
    },
    messages: {
        do_no: {
            required: "DO No. is required!",
        },
        status: {
            required: "Please select Status",
        }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@endsection