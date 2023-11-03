@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Material Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Material Code</li>
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
                                    <label for="damage_id">Demage Code <span style="color:red;">*</span></label>
                                    <select name="damage_id" id="damage_id" class="form-control">
                                        <option value="">Select Demage Code</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="repiar_id">Repair Code  <span style="color:red;">*</span></label>
                                    <select name="repiar_id" id="repiar_id" class="form-control">
                                        <option value="">Select Repair Code</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="material_code">Material Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="material_code" name="material_code" placeholder="Enter Material Code">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Material Details <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter Material Details">
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
        url: "/api/damage/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('damage_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.code;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#damage_id').change(function() {
        var inputValue = $(this).val();

        $.ajax({
        type: "POST",
        url: "/api/repair/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':inputValue
        },
        success: function (data) {
            var select = document.getElementById('repiar_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.repair_code;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    });
});

$(function () {
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.validator.setDefaults({
    submitHandler: function () {
        var damage_id = $("#damage_id").val();
        var repiar_id = $("#repiar_id").val();
        var material_code = $("#material_code").val();
        var desc = $("#desc").val();

            const data = {
                'damage_id':damage_id,
                'repiar_id':repiar_id,
                'material_code':material_code,
                'desc':desc,
                'user_id':user_id,
                'depo_id':depo_id,
            }
            post('material/create',data);
    }
  });

    $('#userForm').validate({
    rules: {
        damage_id: {
            required: true,
        },
        repiar_id: {
            required: true,
        },
        material_code: {
            required: true,
        },
        desc: {
            required: true,
        }
    },
    messages: {
        damage_id: {
            required: "Please select Demage Code",
        },
        repiar_id: {
            required: "Please select Repair Code",
        },
        material_code: {
            required: "Please Enter Material Code",
        },
        desc: {
            required: "Please Enter Description",
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