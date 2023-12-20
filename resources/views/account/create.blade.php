@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create Bank</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Bank</li>
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
                                    <label for="bank_name">Bank Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name">
                                </div>

                                <div class="form-group">
                                    <label for="account_no">Account Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Enter Account Number">
                                </div>
                                <div class="form-group">
                                    <label for="ifsc">IFSC Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="Enter IFSC Code">
                                </div>
                                <div class="form-group">
                                    <label for="branch_name">Branch Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name">
                                </div>
                                <div class="form-group">
                                    <label for="account_holder">Account Holder <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="account_holder" name="account_holder" placeholder="Enter Account Holder">
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
        url: "/api/account/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('.text').text('Update Bank');
            $('#bank_name').val(response.bank_name);
            $('#ifsc').val(response.ifsc);
            $('#branch_name').val(response.branch_name);
            $('#account_holder').val(response.account_holder);
            $('#account_no').val(response.account_no);
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
        var bank_name = $("#bank_name").val();
        var ifsc = $("#ifsc").val();
        var branch_name = $('#branch_name').val();
        var account_holder = $('#account_holder').val();
        var account_no = $('#account_no').val();
   
        if(getCateId[1]){
            const data = {
                'bank_name':bank_name,
                'ifsc':ifsc,
                'branch_name':branch_name,
                'account_holder':account_holder,
                'account_no':account_no,
                'id':getCateId[1]
            }
            post('account/update',data);
        }else{
            const data = {
                'bank_name':bank_name,
                'ifsc':ifsc,
                'branch_name':branch_name,
                'account_holder':account_holder,
                'account_no':account_no,
            }
            post('account/create',data);
        }
        window.location = `/account/all`
    }
  }); 

    $('#damageForm').validate({
    rules: {
        bank_name: {
            required: true,
        },
        account_no: {
            required: true,
        },
        ifsc: {
            required: true,
        },
        branch_name: {
            required: true,
        },
        account_holder: {
            required: true,
        }
    },
    messages: {
        bank_name: {
            required: "thi field id required!",
        },
        ifsc: {
            required: "thi field id required!",
        },
        account_no: {
            required: "thi field id required!",
        },
        branch_name: {
            required: "thi field id required!",
        },
        account_holder: {
            required: "thi field id required!",
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