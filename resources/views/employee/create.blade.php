@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Employee</li>
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
                        <form id="employeeForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="employee_code">Employee Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="employee_code" id="employee_code" placeholder="Enter Contractor Code">
                                </div>
                                <div class="form-group">
                                    <label for="firstname">Employee First Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="middlename">Employee Middle Name </label>
                                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Middle Name">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Employee Surname <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Surname">
                                </div>
                                <div class="form-group">
                                    <label for="contractor_id">Contractor Name <span style="color:red;">*</span></label>
                                    <select name="contractor_id" class="form-control" id="contractor_id">
                                        <option value="">select Contractor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Employee Address </label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Employee Address">
                                </div>
                                <div class="form-group">
                                    <label for="pincode">Employee Pincode</label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Employee Pincode">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Employee Contact <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Employee Contact">
                                </div>
                                <div class="form-group">
                                    <label for="aadhar">Employee Aadhar Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="aadhar" name="aadhar" placeholder="Enter Employee Aadhar Number">
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
$(document).ready(function () {
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "GET",
        url: "/api/contractor/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            console.log(data);
            var select = document.getElementById('contractor_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.fullname + ' (' + item.contractor_code + ')';
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
});

$(function () {

    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');
    var checkToken = localStorage.getItem('token');

    if(getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/employee/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            console.log(response);
            $('.text').text('Update Employee');
            $("#employee_code").val(response.employee_code);
            $("#firstname").val(response.firstname);
            $("#middlename").val(response.middlename);
            $("#lastname").val(response.lastname);
            $("#contractor_id").val(response.contractor_id);
            $("#address").val(response.address);
            $("#pincode").val(response.pincode);
            $("#contact").val(response.contact);
            $("#aadhar").val(response.aadhar);
            
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
        var employee_code = $("#employee_code").val();
        var firstname = $("#firstname").val();
        var middlename = $("#middlename").val();
        var lastname = $("#lastname").val();
        var contractor_id = $("#contractor_id").val();
        var address = $("#address").val();
        var pincode = $("#pincode").val();
        var contact = $("#contact").val();
        var aadhar = $("#aadhar").val();

        if(getCateId[1]){
            const data = {
                'employee_code':employee_code,
                'firstname':firstname,
                'middlename':middlename,
                'lastname':lastname,
                'contractor_id':contractor_id,
                'address':address,
                'pincode':pincode,
                'contact':contact,
                'aadhar':aadhar,
                'user_id':user_id,
                'depo_id':depo_id,
                'id':getCateId[1]
            }
            post('employee/update',data);
        }else{
            const data = {
                'employee_code':employee_code,
                'firstname':firstname,
                'middlename':middlename,
                'lastname':lastname,
                'contractor_id':contractor_id,
                'address':address,
                'pincode':pincode,
                'contact':contact,
                'aadhar':aadhar,
                'user_id':user_id,
                'depo_id':depo_id,
            }
            post('employee/create',data);
        }
        window.location = `/employee/all`

        
    }
  });


    $('#employeeForm').validate({
    rules: {
        employee_code: {
            required: true,
        },
        firstname: {
            required: true,
        },
        lastname: {
            required: true,
        },
        contractor_id: {
            required: true,
        },
        contact: {
            required: true,
        },
        aadhar: {
            required: true,
        },
    },
    messages: {
        employee_code: {
            required: "Please enter a Employee Code",
        },
        firstname: {
            required: "Please enter First Name",
        },
        lastname: {
            required: "Please enter Last Name",
        },
        contractor_id: {
            required: "Please Select Contractor",
        },
        contact: {
            required: "Please enter Contact",
        },
        aadhar: {
            required: "Please enter AAdhar",
        },
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