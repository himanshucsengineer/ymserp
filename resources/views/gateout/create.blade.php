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
                    <h1 class="m-0">Create Gate Out</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Gate Out</li>
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
                        <form id="gateoutForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vehicle_no">Vehicle Number <span style="color:red;">*</span></label>
                                        <select name="vehicle_number" id="vehicle_no" class="form-control">
                                                <option value="">Select Containers</option>
                                        </select>
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
                                    <input type="radio" name="options" id="option_b3" autocomplete="off"  value="2nd_with"> 2 Container
                                    </label>
                                </div>
                                <div class="container_div">
                                    <div class="form-group">
                                        <label for="container_no">Container Number </label>
                                            <select name="container_no" id="container_no" class="form-control">
                                                <option value="">Select Containers</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="2_container_div" style="display:none;">
                                    <div class="form-group">
                                        <label for="2nd_container_no">2ND Container Number</label>
                                            <select name="2nd_container_no" id="2nd_container_no" class="form-control">
                                                <option value="">Select Containers</option>
                                            </select>
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

    $.ajax({
        type: "get",
        url: "/api/gatein/getReadyContainers",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function(data) {
            var select_2 = document.getElementById('container_no');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.vehicle_number;
                select_2.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "get",
        url: "/api/gatein/getReadyContainers",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function(data) {
            var select_2 = document.getElementById('2nd_container_no');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.vehicle_number;
                select_2.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "get",
        url: "/api/gatein/getInVehicle",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function(data) {
            var select_2 = document.getElementById('vehicle_no');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.vehicle_number;
                select_2.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

    $('input[name="options"]').on('change', function () {
    // Get the value of the selected radio button
    var selectedValue = $('input[name="options"]:checked').val();

    if (selectedValue == "without") {
        $('.container_div').hide();
        $('.2_container_div').hide();
    } else if (selectedValue == "2nd_with") {
        $('.container_div').show();
        $('.2_container_div').show();
    } else {
        $('.2_container_div').hide();
        $('.container_div').show();
    }
});

});



function validateInput2(input) {
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

function validateInput(input) {
    input.style.color = 'black';
    document.getElementById('errorText2').textContent = "";
    const inputField = document.getElementById('container_no');
    inputField.setAttribute('maxlength', '11');
    const inputValue = input.value;

    let checkFirstChar = isNaN(inputValue);
    if(checkFirstChar == false){
    document.getElementById('errorText2').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
    inputField.setAttribute('maxlength', '1');
    input.style.color = 'red';
    }

    if(inputValue.length <= 4){
    const checkNumber = /\d/; // This regex matches any digit (0-9)
    let chechkNumberforstart =  checkNumber.test(inputValue);
    if(chechkNumberforstart){
        document.getElementById('errorText2').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
        inputField.setAttribute('maxlength', inputValue.length);
        input.style.color = 'red';
    }
    }

    if(inputValue.length > 4){
        const part2 = inputValue.substring(4);
        let checkNumber = isNaN(part2);
        if(checkNumber == true){
            document.getElementById('errorText2').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
            inputField.setAttribute('maxlength', inputValue.length);
            input.style.color = 'red';
        }
    }
}




$(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var container_no = $("#container_no").val();
        var vehicle_number = $("#vehicle_no").val();
        var two_container_no = $("#2nd_container_no").val();

        var contariner_one = container_no.toUpperCase();
        var contariner_two = two_container_no.toUpperCase();
        var vehicle_number_finel = vehicle_number.toUpperCase();

        const data1 = {
            'user_id': user_id,
            'gateinid' : contariner_one,
            'out_status': 'Out'
        }
        post('gatein/updateout',data1);
        const data2 = {
            'user_id': user_id,
            'gateinid' : contariner_two,
            'out_status': 'Out'
        }
        post('gatein/updateout',data2);
        const data3 = {
            'user_id': user_id,
            'gateinid' : vehicle_number_finel,
            'out_status': 'Out'
        }
        post('gatein/updateout',data3);
        location.reload()
    }
  });

    $('#gateoutForm').validate({
    rules: {
        vehicle_no: {
            required: true,
        },
        
    },
    messages: {
        vehicle_no: {
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