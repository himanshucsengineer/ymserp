

@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text" id="">Create Role</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Role</li>
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
                                    <label for="name">Role Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Role Name">
                                </div>
                                <div class="form-group">
                                    <label for="permission">Select Permissions <span style="color:red;">*</span></label>
                                    <select name="permission" multiple="" id="permission" class="form-control">
                                        <option value="MASTERS">MASTERS</option>
                                        <option value="MANAGEMENT">MANAGEMENT</option>
                                        <option value="INWARD_EXECUTIVE"> INWARD EXECUTIVE</option>
                                        <option value="MAINTENANCE"> REPAIR AND MAINTENANCE</option>
                                        <option value="PRE_ADVICE"> PRE ADVICE</option>
                                        <option value="OUTWARD_EXECUTIVE"> OUTWARD EXECUTIVE</option>
                                        <option value="PURCHASES" > PURCHASES </option>
                                        <option value="SUPERVISOR" > SUPERVISOR</option>
                                        
                                        <option value="STORES">STORES</option>
                                        <option value="BILLING">BILLING</option>
                                        <option value="SURVEYOR">SURVEYOR</option>
                                        <option value="SECURITY">SECURITY</option>
                                        <option value="DO_MANAGER">DO MANAGER</option>
                                        <option value="PTI">PTI</option>
                                        <option value="BANK">BANK</option>
                                        <option value="CASH_FLOW">CASH FLOW</option>
                                        <option value="REPORT">REPORT</option>

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

    if(getCateId[1] == 1){
        window.location = `/role/all`
    }

    if(getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/role/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('#name').val(response[0].role);
            $('#permission').val(response[0].permissions);
            $('.text').text('Update Role');
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    $.validator.setDefaults({
    submitHandler: function () {
        var name = $("#name").val();
        var permission = $("#permission").val();

        
        if(getCateId[1]){
            const data = {
                'name':name,
                'permission':permission,
                'id':getCateId[1]
            }
            post('role/update',data);
            
        }else{
            const data = {
                'name':name,
                'permission':permission
            }
            post('role/create',data);
        }
        window.location = `/role/all`
    }
  });
    $('#categoryForm').validate({
    rules: {
        name: {
            required: true,
        },
        permission:{
            required: true,
        }
    },
    messages: {
        name: {
            required: "Please enter a Role Name",
        },
        permission:{
            required: "Please Select Permissions!",
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