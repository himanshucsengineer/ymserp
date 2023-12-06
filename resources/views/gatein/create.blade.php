@extends('common.layout')

@section('content')

<style>
.img_prv_box{
    margin-top:.5rem;
    /* border:1px solid #cdcdcd; */
    width:400px;
    /* height:200px; */
}
.img_prv_box img{
    width:100%;
}
#pagination{
    /* width:100%; */
    margin-top:1rem;
    float:right;
}
.pagination-btn{
    border:1px solid #cdcdcd;
    outline:none;
    background:white;
    color:#000;
    padding:.3rem .7rem;
}
.active-btn{
    background:#63bf84;
    color:white;
}
#search{
    float: right;
    padding: 0.5rem 1rem;
    outline: none;
    border: 1px solid #cdcdcd;
    border-radius: 4px;
    margin-bottom: 1rem;
    margin-top:1.7rem;
}
.flex_date_range{
    width:100%;
    height:auto;
    display:flex;
    margin-bottom:1rem;
}
.flex_date_range .left{
    width:50%;
}
.flex_date_range .right{
    width:50%;
}
.btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle{
    background-color:#63bf84;
    border-color:#63bf84;
    border-radius:2px;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Gate In</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Gate In</li>
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
                        <form id="gateinForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vehicle_number">Vehicle Number <span style="color:red;">*</span></label>
                                    <input type="text" class="" style="font-size:50px; width:100%; text-transform:uppercase;" id="vehicle_number" name="vehicle_number" placeholder="">
                                </div>
                                <h3 style="text-align:center">OR</h3>
                                <div class="form-group">
                                    <label for="vehicle_img">Vehicle Image</label>
                                    <input type="file" class="form-control" id="vehicle_img" name="vehicle_img" placeholder="Enter Vehicle Number">
                                    <div class="img_prv_box">
                                        <img id="vehicle_img_prev" src="" />
                                    </div>
                                
                                </div>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active mr-2" style="border-radius:2px;">
                                    <input type="radio" name="options" id="option_b1" autocomplete="off" checked="" value="with">With Container
                                    </label>
                                    <label class="btn btn-secondary mr-2" style="border-radius:2px;">
                                    <input type="radio" name="options" id="option_b2" autocomplete="off"  value="without"> Without Container
                                    </label>
                                    <label class="btn btn-secondary" style="border-radius:2px;">
                                    <input type="radio" name="options" id="option_b3" autocomplete="off"  value="2nd_without"> 2 Container
                                    </label>
                                </div>
                                <div class="container_div">
                                    <div class="form-group">
                                        <label for="container_no">Container Number <span style="color:red;">*</span></label>
                                        <input type="text" class="" oninput="validateInput(this)"  maxlength="11" style="font-size:50px; width:100%; text-transform:uppercase;" id="container_no" name="container_no" placeholder="">
                                        <span id="errorText" style="color:red; font-size:15px; margin-top: .5rem"></span>
                                    </div>
                                    <h3 style="text-align:center">OR</h3>
                                    <div class="form-group">
                                        <label for="container_img">Container Image</label>
                                        <input type="file" class="form-control" id="container_img" name="container_img" placeholder="Enter Vehicle Number">
                                        <div class="img_prv_box">
                                            <img id="container_img_prev" src="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="2_container_div" style="display:none;">
                                    <div class="form-group">
                                        <label for="container_no">2ND Container Number <span style="color:red;">*</span></label>
                                        <input type="text" class="" oninput="validateInput(this)"  maxlength="11" style="font-size:50px; width:100%; text-transform:uppercase;" id="container_no" name="container_no" placeholder="">
                                        <span id="errorText" style="color:red; font-size:15px; margin-top: .5rem"></span>
                                    </div>
                                    <h3 style="text-align:center">OR</h3>
                                    <div class="form-group">
                                        <label for="container_img">Container Image</label>
                                        <input type="file" class="form-control" id="container_img" name="container_img" placeholder="Enter Vehicle Number">
                                        <div class="img_prv_box">
                                            <img id="container_img_prev" src="" />
                                        </div>
                                    </div>
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

    $('input[name="options"]').on('change', function () {
    // Get the value of the selected radio button
    var selectedValue = $('input[name="options"]:checked').val();

    if (selectedValue == "without") {
        $('.container_div').hide();
        $('.2_container_div').hide();
    } else if (selectedValue == "2nd_without") {
        $('.container_div').show();
        $('.2_container_div').show();
    } else {
        $('.2_container_div').hide();
        $('.container_div').show();
    }
});

// Listen for changes in the file input
$('#container_img').on('change', function (e) {
    var fileInput = $(this)[0];
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#container_img_prev').attr('src', e.target.result);
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
});

$('#vehicle_img').on('change', function (e) {
    var fileInput = $(this)[0];
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#vehicle_img_prev').attr('src', e.target.result);
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
});

});



function validateInput(input) {
    input.style.color = 'black';
    document.getElementById('errorText').textContent = "";
    const inputField = document.getElementById('container_no');
    inputField.setAttribute('maxlength', '11');
    const inputValue = input.value;

    let checkFirstChar = isNaN(inputValue);
    if(checkFirstChar == false){
    document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
    inputField.setAttribute('maxlength', '1');
    input.style.color = 'red';
    }

    if(inputValue.length <= 4){
    const checkNumber = /\d/; // This regex matches any digit (0-9)
    let chechkNumberforstart =  checkNumber.test(inputValue);
    if(chechkNumberforstart){
        document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
        inputField.setAttribute('maxlength', inputValue.length);
        input.style.color = 'red';
    }
    }

    if(inputValue.length > 4){
        const part2 = inputValue.substring(4);
        let checkNumber = isNaN(part2);
        if(checkNumber == true){
            document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
            inputField.setAttribute('maxlength', inputValue.length);
            input.style.color = 'red';
        }
    }
}




$(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var container_no = $("#container_no").val();
        var vehicle_number = $("#vehicle_number").val();
        var type = $('input[name="options"]:checked').val();

            var formData = new FormData();
            formData.append('container_no', container_no);
            formData.append('vehicle_number', vehicle_number);
            formData.append('type', type);
            formData.append('user_id', user_id);
            formData.append('depo_id', depo_id);
            formData.append('container_img', $('#container_img')[0].files[0]);
            formData.append('vehicle_img', $('#vehicle_img')[0].files[0]);

            // Now, you can send formData in an AJAX request
            $.ajax({
                url: '/api/gatein/create',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">${data.message}</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                    // location.reload();
                    $("#gateinForm")[0].reset();
                },
                error: function(error) {
                    var finalValue = '';
                    if(Array.isArray(error.responseJSON.message)){
                        finalValue = Object.values(error.responseJSON.message[0]).join(', ');
                    }else{
                        finalValue = error.responseJSON.message;
                    }
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">${finalValue}</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                }
            });

    }
  });

    $('#gateinForm').validate({
    rules: {
        vehicle_number: {
            required: true,
        },
        
    },
    messages: {
        container_no: {
            required: "This Field Is Required!",
        },
        vehicle_number: {
            required: "This Field Is Required!",
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