

@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text" id="">Create Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Category</li>
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
                                    <label for="name">Category Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
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
        url: "/api/category/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            console.log(response);
            $('#name').val(response.name);
            $('.text').text('Update Category');
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
        var name = $("#name").val();
        
        if(getCateId[1]){
            const data = {
                'name':name,
                'user_id':user_id,
                'depo_id':depo_id,
                'id':getCateId[1]
            }
            post('category/update',data);
            
        }else{
            const data = {
                'name':name,
                'user_id':user_id,
                'depo_id':depo_id,
            }
            post('category/create',data);
        }
        window.location = `/category/all`
    }
  });
    $('#categoryForm').validate({
    rules: {
        name: {
            required: true,
        }
    },
    messages: {
        name: {
            required: "Please enter a Category Name",
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