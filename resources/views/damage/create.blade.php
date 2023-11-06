@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create Damage Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Damage Code</li>
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
                                    <label for="code">Damage Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Damage Code">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter Description">
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
        url: "/api/damage/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('.text').text('Update Damage Code');
            $('#code').val(response.code);
            $('#desc').val(response.desc);
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
        var code = $("#code").val();
        var desc = $("#desc").val();


        if(getCateId[1]){
            const data = {
                'code':code,
                'desc':desc,
                'user_id':user_id,
                'depo_id':depo_id,
                'id':getCateId[1]
            }
            post('damage/update',data);
        }else{
            const data = {
                'code':code,
                'desc':desc,
                'user_id':user_id,
                'depo_id':depo_id,
            }
            post('damage/create',data);
        }
        window.location = `/damage/all`
    }
  }); 

    $('#damageForm').validate({
    rules: {
        code: {
            required: true,
        },
        desc: {
            required: true,
        }
    },
    messages: {
        code: {
            required: "Please select employee",
        },
        desc: {
            required: "Please select Role",
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