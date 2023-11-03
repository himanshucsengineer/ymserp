<?php $currentUrl = url()->full(); 
    $getid = explode('=',$currentUrl);
?>

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
                                    <label for="container_no">Container Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="container_no" name="container_no" placeholder="Enter Container Number ">
                                </div>
                                <div class="form-group">
                                    <label for="container_size">Container Size <span style="color:red;">*</span></label>
                                    <select name="container_size" id="container_size" class="form-control">
                                        <option value="">Please Select Container Size</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="80">80</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="container_type">Container Type <span style="color:red;">*</span></label>
                                    <select name="container_type" id="container_type" class="form-control">
                                        <option value="">Please Select Container Type</option>
                                        <option value="FR">FR</option>
                                        <option value="HC">HC</option>
                                        <option value="DV">DV</option>
                                        <option value="TK">TK</option>
                                        <option value="SR">SR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="transport_id">Transport <span style="color:red;">*</span></label>
                                    <select name="transport_id" id="transport_id" class="form-control">
                                        <option value="">Please Select Transport</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inward_date">Inward Date <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="inward_date" name="inward_date" value="<?= date('Y-m-d')?>">
                                </div>
                                <div class="form-group">
                                    <label for="inward_time">Inward Time  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="inward_time" name="inward_time" value="<?= date('H:i:s')?>">
                                </div>

                                <div class="form-group">
                                    <label for="driver_name">Driver Name  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Enter Driver Name">
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_number">Vehicle Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" placeholder="Enter Vehicle Number">
                                </div>

                                <div class="form-group">
                                    <label for="contact_number">Contact Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number">
                                </div>
                                <div class="form-group">
                                    <label for="third_party">Third Party <span style="color:red;">*</span></label>
                                    <select name="third_party" id="third_party"  class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="line_id">Line Name <span style="color:red;">*</span></label>
                                    <select name="line_id" id="line_id" class="form-control">
                                        <option value="">Select Line</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="arrive_from">Arrive From <span style="color:red;">*</span></label>
                                    <select name="arrive_from" id="arrive_from" class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Cochine">Cochine</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Kerla">Kerla</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="port_name">Port Name <span style="color:red;">*</span></label>
                                    <select name="port_name" id="port_name" class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="Mundra port">Mundra port</option>
                                        <option value="Kandla">Kandla</option>
                                        <option value="Paradip Port">Paradip Port</option>
                                        <option value="Jawaharlal Nehru Port">Jawaharlal Nehru Port</option>
                                        <option value="Visakhapatnam Port">Visakhapatnam Port</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="driver_photo">Driver Photo <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="driver_photo" id="driver_photo">
                                </div>

                                <div class="form-group">
                                    <label for="challan">Challan <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="challan" id="challan">
                                </div>

                                <div class="form-group">
                                    <label for="driver_license">Driver License <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="driver_license" id="driver_license">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="do_copy">D.O. Copy <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="do_copy" id="do_copy">
                                </div>

                                <div class="form-group">
                                    <label for="aadhar">Aadhar Card <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="aadhar" id="aadhar">
                                </div>

                                <div class="form-group">
                                    <label for="pan">PAN Card <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="pan" id="pan">
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
    var containerid = <?= $getid[1]?>;
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "POST",
        url: "/api/gatein/getDataById",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':containerid
        },
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log(error);
        }
    });

});


$(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var container_no = $("#container_no").val();
        var container_type = $("#container_type").val();
        var container_size = $("#container_size").val();
        var transport_id = $("#transport_id").val();
        var inward_date = $("#inward_date").val();
        var inward_time = $("#inward_time").val();
        var driver_name = $("#driver_name").val();
        var vehicle_number = $("#vehicle_number").val();
        var contact_number   = $("#contact_number").val();
        var third_party = $("#third_party").val();
        var line_id = $("#line_id").val();
        var arrive_from = $("#arrive_from").val();
        var port_name = $("#port_name").val();  


            var formData = new FormData();

            formData.append('container_no', container_no);
            formData.append('container_type', container_type);
            formData.append('container_size', container_size);
            formData.append('transport_id', transport_id);
            formData.append('inward_date', inward_date);
            formData.append('inward_time', inward_time);
            formData.append('driver_name', driver_name);
            formData.append('vehicle_number', vehicle_number);
            formData.append('contact_number', contact_number);
            formData.append('third_party', third_party);
            formData.append('line_id', line_id);
            formData.append('arrive_from', arrive_from);
            formData.append('port_name', port_name);
            formData.append('user_id', user_id);
            formData.append('depo_id', depo_id);

            formData.append('driver_photo', $('#driver_photo')[0].files[0]);
            formData.append('challan', $('#challan')[0].files[0]);
            formData.append('driver_license', $('#driver_license')[0].files[0]);
            formData.append('do_copy', $('#do_copy')[0].files[0]);
            formData.append('aadhar', $('#aadhar')[0].files[0]);
            formData.append('pan', $('#pan')[0].files[0]);

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
        container_no: {
            required: true,
        },
        container_type: {
            required: true,
        },
        container_size: {
            required: true,
        },
        transport_id: {
            required: true,
        },

        inward_date: {
            required: true,
        },
        inward_time: {
            required: true,
        },
        driver_name: {
            required: true,
        },
        vehicle_number: {
            required: true,
        },

        contact_number: {
            required: true,
        },
        third_party: {
            required: true,
        },
        line_id: {
            required: true,
        },
        arrive_from: {
            required: true,
        },

        port_name: {
            required: true,
        },
        driver_photo: {
            required: true,
        },
        challan: {
            required: true,
        },
        driver_license: {
            required: true,
        },

        do_copy: {
            required: true,
        },
        aadhar: {
            required: true,
        },
        pan: {
            required: true,
        }

    },
    messages: {
        container_no: {
            required: "This Field Is Required!",
        },
        container_type: {
            required: "This Field Is Required!",
        },
        container_size: {
            required: "This Field Is Required!",
        },
        transport_id: {
            required: "This Field Is Required!",
        },

        inward_date: {
            required: "This Field Is Required!",
        },
        inward_time: {
            required: "This Field Is Required!",
        },
        driver_name: {
            required: "This Field Is Required!",
        },
        vehicle_number: {
            required: "This Field Is Required!",
        },

        contact_number: {
            required: "This Field Is Required!",
        },
        third_party: {
            required: "This Field Is Required!",
        },
        line_id: {
            required: "This Field Is Required!",
        },
        arrive_from: {
            required: "This Field Is Required!",
        },

        port_name: {
            required: "This Field Is Required!",
        },
        driver_photo: {
            required: "This Field Is Required!",
        },
        challan: {
            required: "This Field Is Required!",
        },
        driver_license: {
            required: "This Field Is Required!",
        },

        do_copy: {
            required: "This Field Is Required!",
        },
        aadhar: {
            required: "This Field Is Required!",
        },
        pan: {
            required: "This Field Is Required!",
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