@extends('common.layout')

@section('content')
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
                                    <label for="container_no">Container Number</label>
                                    <input type="text" class="" oninput="validateInput(this)"  maxlength="11" style="font-size:100px; width:100%; text-transform:uppercase;" id="container_no" name="container_no" placeholder="">
                                    <span id="errorText" style="color:red; font-size:15px; margin-top: .5rem"></span>
                                </div>
                                <h3 style="text-align:center">OR</h3>
                                <div class="form-group">
                                    <label for="container_img">Container Image</label>
                                    <input type="file" class="form-control" id="container_img" name="container_img" placeholder="Enter Vehicle Number">
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_number">Vehicle Number</label>
                                    <input type="text" class="" style="font-size:100px; width:100%; text-transform:uppercase;" id="vehicle_number" name="vehicle_number" placeholder="">
                                </div>
                                <h3 style="text-align:center">OR</h3>
                                <div class="form-group">
                                    <label for="vehicle_img">Vehicle Image</label>
                                    <input type="file" class="form-control" id="vehicle_img" name="vehicle_img" placeholder="Enter Vehicle Number">
                                </div>

                                <div class="form-group">
                                    <label for="driver_name">Driver Name  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Enter Driver Name">
                                </div>
                                

                                <div class="form-group">
                                    <label for="contact_number">Driver Contact Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number">
                                </div>

                                <div class="form-group">
                                    <label for="container_size">Container Size <span style="color:red;">*</span></label>
                                    <select name="container_size" id="container_size" class="form-control">
                                        <option value="">Select Container Size</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="container_type">Container Type <span style="color:red;">*</span></label>
                                    <select name="container_type" id="container_type" class="form-control">
                                        <option value="">Select Container Type</option>
                                        <option value="DRY">DRY</option>
                                        <option value="REEFER">REEFER</option>
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
        var container_type = $("#container_type").val();
        var container_size = $("#container_size").val();
        var driver_name = $("#driver_name").val();
        var vehicle_number = $("#vehicle_number").val();
        var contact_number   = $("#contact_number").val();



            var formData = new FormData();

            formData.append('container_no', container_no);
            formData.append('container_type', container_type);
            formData.append('container_size', container_size);
            formData.append('driver_name', driver_name);
            formData.append('vehicle_number', vehicle_number);
            formData.append('contact_number', contact_number);
     
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
        container_type: {
            required: true,
        },
        container_size: {
            required: true,
        },
        driver_name: {
            required: true,
        },
        contact_number: {
            required: true,
        },

    },
    messages: {
        container_type: {
            required: "This Field Is Required!",
        },
        container_size: {
            required: "This Field Is Required!",
        },
        driver_name: {
            required: "This Field Is Required!",
        },
        contact_number: {
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