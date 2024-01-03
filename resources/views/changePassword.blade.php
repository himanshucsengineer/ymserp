

@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text" id="">Change Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Change Password</li>
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
                        <form id="categoryForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="current_password">Current Password <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password ">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Change Password</button>
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
    var checkToken = localStorage.getItem('token');

    $.validator.setDefaults({
    submitHandler: function () {
        var current_password = $("#current_password").val();
        var new_password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();

            const data = {
                'current_password':current_password,
                'new_password':new_password,
                'confirm_password':confirm_password
            }

            post('auth/change-password',data);
            // location.reload();
            $("#current_password").val('');
            $("#new_password").val('');
            $("#confirm_password").val('');
    }
  });
    $('#categoryForm').validate({
    rules: {
        current_password: {
            required: true,
        },
        new_password:{
            required: true,
        },
        confirm_password:{
            required: true,
        }
    },
    messages: {
        current_password: {
            required: "Please enter Current Password!",
        },
        new_password:{
            required: "Please enter New Password!",
        },
        confirm_password:{
            required: "Please enter Confirm Password!",
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