@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create User</li>
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
                        <form id="userForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="employee_id">Employee Name <span style="color:red;">*</span></label>
                                    <select name="employee_id" id="employee_id" class="form-control">
                                        <option value="">Select Employee</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role <span style="color:red;">*</span></label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">Select Role</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category Name <span style="color:red;">*</span></label>
                                    <select multiple="" class="form-control" name="category_id" id="category_id">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="depot_id">Depo Name <span style="color:red;">*</span></label>
                                    <select multiple="" class="form-control" name="depot_id" id="depot_id">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username">Login Id <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Login Id">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password <span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="c_password">Confirm Password <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="c_password" name="c_password" placeholder="Enter Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label for="recovery_number">Recovery Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="recovery_number" name="recovery_number" placeholder="Enter Recovery Number">
                                </div>
                                <div class="form-group">
                                    <label for="ans1">Where did you go to high school/college? <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="ans1" name="ans1" placeholder="Enter Ans">
                                </div>
                                <div class="form-group">
                                    <label for="ans2">What city were you bom in? <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="ans2" name="ans2" placeholder="Enter Ans">
                                </div>
                                <div class="form-group">
                                    <label for="ans3">Where is your favrite place to vacation? <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="ans3" name="ans3" placeholder="Enter Ans">
                                </div>
                                <div class="form-group">
                                    <label for="status">Active <span style="color:red;">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Active Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
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
$(document).ready(function () {
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "GET",
        url: "/api/employee/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('employee_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.firstname + ' ' + item.lastname + '(' + item.employee_code + ')';
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });


    $.ajax({
        type: "GET",
        url: "/api/depo/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            console.log(data);
            var select = document.getElementById('depot_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/category/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('category_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "GET",
        url: "/api/role/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('role_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
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
        url: "/api/user/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            console.log(response);
            var cate = response.category_id.split(',');
            console.log(cate);
            $('.text').text('Update Employee');
            $("#employee_id").val(response.employee_id);
            $("#role_id").val(response.role_id);
            $("#category_id").val(cate);
            $("#depot_id").val(response.depot_id);
            $("#username").val(response.username);
            $("#password").val(response.password);
            $("#c_password").val(response.c_password);
            $("#recovery_number").val(response.recovery_number);
            $("#ans1").val(response.ans1);
            $("#ans2").val(response.ans2);
            $("#ans3").val(response.ans3);
            $("#status").val(response.status);    
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    $.validator.setDefaults({
    submitHandler: function () {
        var employee_id = $("#employee_id").val();
        var role_id = $("#role_id").val();
        var category_id = $("#category_id").val();
        var depot_id = $("#depot_id").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var c_password = $("#c_password").val();
        var recovery_number = $("#recovery_number").val();
        var ans1 = $("#ans1").val();
        var ans2 = $("#ans2").val();
        var ans3 = $("#ans3").val();
        var status = $("#status").val();

        if(c_password == password){
            var user_id = localStorage.getItem('user_id');
            var depo_id = localStorage.getItem('depo_id');

            const data = {
                'employee_id':employee_id,
                'role_id':role_id,
                'category_id':category_id,
                'depot_id':depot_id,
                'username':username,
                'password':password,
                'recovery_number':recovery_number,
                'ans1':ans1,
                'ans2':ans2,
                'ans3':ans3,
                'status':status,
                'createdby' :user_id,
                'depo_id':depo_id
            }
            post('user/create',data);
        }else{
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Password Not Match</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }

        
    }
  });

    $('#userForm').validate({
    rules: {
        employee_id: {
            required: true,
        },
        role_id: {
            required: true,
        },
        category_id: {
            required: true,
        },
        depot_id: {
            required: true,
        },
        username: {
            required: true,
        },

        password: {
            required: true,
        },
        c_password: {
            required: true,
        },
        recovery_number: {
            required: true,
        },
        ans1: {
            required: true,
        },
        ans2: {
            required: true,
        },
        ans3: {
            required: true,
        },
        status: {
            required: true,
        },
    },
    messages: {
        employee_id: {
            required: "Please select employee",
        },
        role_id: {
            required: "Please select Role",
        },
        category_id: {
            required: "Please select Category",
        },
        depot_id: {
            required: "Please Select Depo",
        },
        username: {
            required: "Please enter username",
        },

        password: {
            required: "Please enter a Password",
        },
        c_password: {
            required: "Please enter a Confirm Password",
        },
        recovery_number: {
            required: "Please enter a recovbery no.",
        },
        ans1: {
            required: "Please enter a Answer",
        },
        ans3: {
            required: "Please enter a Answer",
        },

        ans2: {
            required: "Please enter Answer",
        },
        status: {
            required: "Please Select Status",
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