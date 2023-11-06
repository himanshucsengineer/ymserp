

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
                                        <option value="CREATE_CONTRACTOR">CREATE CONTRACTOR</option>
                                        <option value="VIEW_CONTRACTOR">VIEW CONTRACTOR</option>
                                        <option value="UPDATE_CONTRACTOR">UPDATE CONTRACTOR</option>
                                        <option value="DELETE_CONTRACTOR">DELETE CONTRACTOR</option>
                                        <option value="CREATE_CATEGORY">CREATE CATEGORY</option>
                                        <option value="VIEW_CATEGORY">VIEW CATEGORY</option>
                                        <option value="UPDATE_CATEGORY">UPDATE CATEGORY</option>
                                        <option value="DELETE_CATEGORY">DELETE CATEGORY</option>
                                        <option value="CREATE_DEPO">CREATE DEPO</option>
                                        <option value="VIEW_DEPO">VIEW DEPO</option>
                                        <option value="UPDATE_DEPO">UPDATE DEPO</option>
                                        <option value="DELETE_DEPO">DELETE DEPO</option>
                                        <option value="CREATE_EMPLOYEE">CREATE EMPLOYEE</option>
                                        <option value="VIEW_EMPLOYEE">VIEW EMPLOYEE</option>
                                        <option value="UPDATE_EMPLOYEE">UPDATE EMPLOYEE</option>
                                        <option value="DELETE_EMPLOYEE">DELETE EMPLOYEE</option>
                                        <option value="CREATE_USER">CREATE USER</option>
                                        <option value="VIEW_USER">VIEW USER</option>
                                        <option value="UPDATE_USER">UPDATE USER</option>
                                        <option value="DELETE_USER">DELETE USER</option>
                                        <option value="CREATE_DAMAGE">CREATE DAMAGE</option>
                                        <option value="VIEW_DAMAGE">VIEW DAMAGE</option>
                                        <option value="UPDATE_DAMAGE">UPDATE DAMAGE</option>
                                        <option value="DELETE_DAMAGE">DELETE DAMAGE</option>
                                        <option value="CREATE_REPAIR">CREATE REPAIR</option>
                                        <option value="VIEW_REPAIR">VIEW REPAIR</option>
                                        <option value="UPDATE_REPAIR">UPDATE REPAIR</option>
                                        <option value="DELETE_REPAIR">DELETE REPAIR</option>
                                        <option value="CREATE_MATERIAL">CREATE MATERIAL</option>
                                        <option value="VIEW_MATERIAL">VIEW MATERIAL</option>
                                        <option value="UPDATE_MATERIAL">UPDATE MATERIAL</option>
                                        <option value="DELETE_MATERIAL">DELETE MATERIAL</option>
                                        <option value="CREATE_LINE">CREATE LINE</option>
                                        <option value="VIEW_LINE">VIEW LINE</option>
                                        <option value="UPDATE_LINE">UPDATE LINE</option>
                                        <option value="DELETE_LINE">DELETE LINE</option>
                                        <option value="CREATE_TARRIF">CREATE TARRIF</option>
                                        <option value="VIEW_TARRIF">VIEW TARRIF</option>
                                        <option value="UPDATE_TARRIF">UPDATE TARRIF</option>
                                        <option value="DELETE_TARRIF">DELETE TARRIF</option>
                                        <option value="CREATE_TRANSPORT">CREATE TRANSPORT</option>
                                        <option value="VIEW_TRANSPORT">VIEW TRANSPORT</option>
                                        <option value="UPDATE_TRANSPORT">UPDATE TRANSPORT</option>
                                        <option value="DELETE_TRANSPORT">DELETE TRANSPORT</option>
                                        <option value="GATE_IN">GATE IN</option>
                                        <option value="GATE_OUT">GATE OUT</option>
                                        <option value="INSPECTION">INSPECTION</option>
                                        <option value="CREATE_ROLE">CREATE ROLE</option>
                                        <option value="VIEW_ROLE">VIEW ROLE</option>
                                        <option value="UPDATE_ROLE">UPDATE ROLE</option>
                                        <option value="DELETE_ROLE">DELETE ROLE</option>
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
            console.log(response);
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