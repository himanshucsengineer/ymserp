<?php $currentUrl = url()->full(); 
    $breakurl = explode('=',$currentUrl);
    $getid = explode('&',$breakurl[1]);
    // print_r($getid);
    // die;
?>

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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Outward Container</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Outward Container</li>
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
                        <form id="outwardForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="container_no">Container Number</label>
                                    <input type="text" style="text-transform:uppercase;" readonly class="form-control"    id="container_no" name="container_no" placeholder="Enter Container Number ">
                                </div>

                                <div class="form-group">
                                    <label for="container_size">Container Size</label>
                                    <input type="text" class="form-control" readonly name="container_size" id="container_size">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="container_type">Container Type</label>
                                    <input type="text" class="form-control" readonly name="container_type" id="container_type">
                                </div>
                                <div class="form-group">
                                    <label for="inward_date">Inward Date</label>
                                    <input type="text" class="form-control" id="inward_date" name="inward_date" readonly  placeholder="Enter inward date">
                                </div>
                                <div class="form-group">
                                    <label for="inward_time">Inward Time</label>
                                    <input type="text" class="form-control" id="inward_time" name="inward_time" readonly  placeholder="Enter inward time">
                                </div>

                                <div class="form-group">
                                    <label for="inward_done_by">Inward Done By</label>
                                    <input type="text" class="form-control" id="inward_done_by" name="inward_done_by" readonly   placeholder="Enter inward time">
                                </div>

                                <div class="form-group">
                                    <label for="survayor_date">Surveyor Date</label>
                                    <input type="text" class="form-control" id="survayor_date" name="survayor_date" readonly   placeholder="Enter inward time">
                                </div>

                                <div class="form-group">
                                    <label for="survayor_done_by">Surveyor Done By</label>
                                    <input type="text" class="form-control" id="survayor_done_by" name="survayor_done_by" readonly placeholder="Enter inward time">
                                </div>

                                <div class="form-group">
                                    <label for="repair_date">Repair Completion Date</label>
                                    <input type="text" class="form-control" id="repair_date" name="repair_date" readonly   placeholder="Enter inward time">
                                </div>

                                <div class="form-group">
                                    <label for="repair_done_by">Repair Done By</label>
                                    <input type="text" class="form-control" id="repair_done_by" name="repair_done_by" readonly   placeholder="Enter inward time">
                                </div>

                                <div class="form-group">
                                    <label for="driver_contact_number">Select Driver Contact</label>
                                    <select name="driver_contact_number" id="driver_contact_number" class="form-control">
                                        <option value="">Please Select Driver Contact</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="driver_name">Driver Name</label>
                                    <input type="text" class="form-control" readonly id="driver_name" name="driver_name"  placeholder="Enter Driver Name">
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_number">Vehicle Number</label>
                                    <input type="text" class="form-control" style="text-transform:uppercase;" id="vehicle_number" name="vehicle_number"  placeholder="Enter Vehicle Number">
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_img">Vehicle Image</label>
                                    <div class="img_prv_box"><span class="vehicle_img"></span></div>
                                </div>

                                <div class="form-group">
                                    <label for="do_number">DO Number</label>
                                    <input type="text" class="form-control" style="text-transform:uppercase;" id="do_number" name="do_number"  placeholder="Enter DO Number">
                                </div>
                                <div class="form-group">
                                    <label for="do_img">DO Image</label>
                                    <input type="file" class="form-control"  id="do_img" name="do_img"  placeholder="Enter DO Number">
                                    <div class="img_prv_box"><img class="do_img" src="" id="do_image"/></div>
                                </div>

                                <div class="form-group">
                                    <label for="driver_license">Driver License</label>
                                    <input type="text" class="form-control" style="text-transform:uppercase;" id="driver_license" name="driver_license"  placeholder="Enter Driver License">
                                </div>
                                <div class="form-group">
                                    <label for="driver_license_img">Driver License Image</label>
                                    <input type="file" class="form-control"  id="driver_license_img" name="driver_license_img"  placeholder="Enter DO Number">
                                    <div class="img_prv_box"><img class="driver_license_img" src="" id="driver_license_image"></div>
                                </div>

                                <div class="form-group">
                                    <label for="driver_aadhar">Driver Aadhar</label>
                                    <input type="text" class="form-control" style="text-transform:uppercase;" id="driver_aadhar" name="driver_aadhar"  placeholder="Enter Driver Aadhar">
                                </div>
                                <div class="form-group">
                                    <label for="driver_aadhar_img">Driver Aadhar Image</label>
                                    <input type="file" class="form-control"  id="driver_aadhar_img" name="driver_aadhar_img"  placeholder="Enter DO Number">
                                    <div class="img_prv_box"><img class="driver_aadhar_img" src="" id="driver_aadhar_image"></div>
                                </div>

                                <div class="form-group">
                                    <label for="transport_id">Transporter Name</label>
                                    <select name="transport_id" id="transport_id"  class="form-control">
                                        <option value="">Select Transporter</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="destination">Destination </label>
                                    <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter Destination">
                                </div>
                                <div class="form-group">
                                    <label for="shippers">Shippers</label>
                                    <input type="text" class="form-control" id="shippers" name="shippers"  placeholder="Enter shippers">
                                </div>

                                <div class="form-group">
                                    <label for="vessel">Vessel</label>
                                    <input type="text" class="form-control" id="vessel" name="vessel"  placeholder="Enter Vessel">
                                </div>


                                <div class="form-group">
                                    <label for="voyage">Voyage</label>
                                    <input type="text" class="form-control" id="voyage" name="voyage" placeholder="Enter Voyage">
                                </div>

                                <div class="form-group">
                                    <label for="port_name">Port Name</label>
                                    <input type="text" class="form-control" id="port_name" name="port_name" placeholder="Enter Port Name">
                                </div>

                                <div class="form-group">
                                    <label for="seal_no">Seal no.</label>
                                    <input type="text" class="form-control" id="seal_no" name="seal_no" placeholder="Enter Seal No.">
                                </div>

                                <div class="form-group">
                                    <label for="vent_seal_no">Vent Seal No.</label>
                                    <input type="text" class="form-control" id="vent_seal_no" name="vent_seal_no" placeholder="Enter Vent Seal No.">
                                </div>


                                <div class="form-group">
                                    <label for="temprature">Temprature</label>
                                    <input type="text" class="form-control" id="temprature" name="temprature" placeholder="Enter Temprature">
                                </div>

                                <div class="form-group">
                                    <label for="receipt">Receipt No.</label>
                                    <input type="text" class="form-control" id="receipt" name="receipt" placeholder="Enter Receipt No.">
                                </div>
                                <div class="form-group">
                                    <label for="cash">Cash amount</label>
                                    <input type="text" class="form-control" id="cash" name="cash" placeholder="Enter Cash Amount">
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
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

    
    $('#driver_license_img').on('change', function (e) {
        var fileInput = $(this)[0];
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.driver_license_img').attr('src', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    $('#driver_aadhar_img').on('change', function (e) {
        var fileInput = $(this)[0];
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.driver_aadhar_img').attr('src', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    $('#do_img').on('change', function (e) {
        var fileInput = $(this)[0];
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.do_img').attr('src', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    var containerid = <?= $getid[0]?>;
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');


    $.ajax({
        type: "post",
        url: "/api/transport/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            var select = document.getElementById('transport_id');
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
        type: "POST",
        url: "/api/gatein/getDataByIdOutward",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':containerid
        },
        success: function (data) {
            $("#container_no").val(data[0].container_no)
            $("#container_type").val(data[0].container_type)
            $("#container_size").val(data[0].container_size)
            $("#inward_date").val(data[0].inward_date)
            $("#inward_time").val(data[0].inward_time)
            $("#inward_done_by").val(data[0].inward_done_by)
            $("#survayor_date").val(data[0].survayor_date)
            $("#survayor_done_by").val(data[0].survayor_done_by)
            $("#repair_date").val(data[0].repair_complete)
            $("#repair_done_by").val(data[0].repair_done_by)            
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "POST",
        url: "/api/gateout/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            var select = document.getElementById('driver_contact_number');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.contact_number;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
});

$('#driver_contact_number').on('change', function(){
    var containerid = <?= $getid[0]?>;
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var id = $(this).val();

    $.ajax({
        type: "POST",
        url: "/api/gateout/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id,
            'id':id
        },
        success: function (data) {
            console.log(data);
            $('#driver_name').val(data.driver_name);
            $('#vehicle_number').val(data.vehicle_number);
            if(data.vehicle_img){
                $('.vehicle_img').html(`<img src="/uploads/gateout/${data.vehicle_img}">`);
            }else{
                $('.vehicle_img').html('<p>No Image Available</p>');
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
})
 





$('#outwardForm').on('submit',function(e){
    event.preventDefault();
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var containerid = <?= $getid[0]?>;

        var gate_in_id = "<?php echo $getid[0]?>";
        var gate_out_id = $('#driver_contact_number').val();
        var vehical_no =  $('#vehicle_number').val();
        var do_number =  $('#do_number').val();
        var driver_license =  $('#driver_license').val();
        var driver_aadhar =  $('#driver_aadhar').val();
        var transport_id =  $('#transport_id').val();
        var destination =  $('#destination').val();
        var shippers =  $('#shippers').val();
        var vessel =  $('#vessel').val();
        var voyage =  $('#voyage').val();
        var port_name =  $('#port_name').val();
        var seal_no =  $('#seal_no').val();
        var vent_seal_no =  $('#vent_seal_no').val();
        var temprature =  $('#temprature').val();
        var receipt =  $('#receipt').val();
        var cash =  $('#cash').val();
        var remarks =  $('#remarks').val();



        var formData = new FormData();

        formData.append('gate_in_id', gate_in_id);
        formData.append('gate_out_id', gate_out_id);
        formData.append('vehical_no', vehical_no);
        formData.append('do_number', do_number);
        formData.append('driver_license', driver_license);
        formData.append('driver_aadhar', driver_aadhar);
        formData.append('transport_id', transport_id);
        formData.append('destination', destination);
        formData.append('shippers', shippers);
        formData.append('vessel', vessel);
        formData.append('voyage', voyage);
        formData.append('port_name', port_name);
        formData.append('seal_no', seal_no);
        formData.append('vent_seal_no', vent_seal_no);
        formData.append('temprature', temprature);
        formData.append('receipt', receipt);
        formData.append('cash', cash);
        formData.append('remarks', remarks);
        formData.append('user_id', user_id);
        formData.append('depo_id', depo_id);

        if ($('#do_image')[0].files && $('#do_image')[0].files.length > 0) {
            formData.append('do_image', $('#do_image')[0].files[0]);
        }else{
            formData.append('do_image', '');
        }

        if ($('#driver_license_image')[0].files && $('#driver_license_image')[0].files.length > 0) {
            formData.append('driver_license_image', $('#driver_license_image')[0].files[0]);
        }else{
            formData.append('driver_license_image', '');
        }

        if ($('#driver_aadhar_image')[0].files && $('#driver_aadhar_image')[0].files.length > 0) {
            formData.append('driver_aadhar_image', $('#driver_aadhar_image')[0].files[0]);
        }else{
            formData.append('driver_aadhar_image', '');
        }
        
        $.ajax({
                url: '/api/outward/create',
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

                    window.open('/print/outward', '_blank');
                    location.href="/outward/view";
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
})



$(function () {
    

    $('#outwardForm').validate({
    rules: {
        // vehicle_number:{
        //     required:true,
        // }
    },
    messages:{
        vehicle_number:{
            required:"This Field Is Required",
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