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
                        <form id="gateinForm" novalidate="novalidate">
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
 






$(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var containerid = <?= $getid[0]?>;
    

    $.validator.setDefaults({
    submitHandler: function () {
        var status_name = $("#status_name").val();
        var job_work_no = $("#job_work_no").val();
        var gross_weight = $("#gross_weight").val();
        var tare_weight = $("#tare_weight").val();
        var vessel_name = $("#vessel_name").val();
        var grade = $("#grade").val();
        var sub_lease_unity = $("#sub_lease_unity").val();
        var voyage = $("#voyage").val();
        var consignee   = $("#consignee").val();
        var region = $("#region").val();
        var destuffung = $("#destuffung").val();
        var rftype = $("#rftype").val();
        var empty_repositioning = $("#empty_repositioning").val();
        var er_no = $("#er_no").val();  
        var remarks = $("#remarks").val(); 
        
        



        var container_no = $("#container_no").val();
        var container_size = $("#container_size").val();
        var container_type = $("#container_type").val();
        var transport_id = $("#transport_id").val();
        var inward_date = $("#inward_date").val();
        var inward_time = $("#inward_time").val();
        var driver_name = $("#driver_name").val();
        var vehicle_number = $("#vehicle_number").val();
        var contact_number = $("#contact_number").val();
        var third_party = $("#third_party").val();
        var line_id = $("#line_id").val();
        var arrive_from = $("#arrive_from").val();
        var port_name = $("#port_name").val();


        newdata = {
            'status_name': status_name,
            'job_work_no': job_work_no,
            'gross_weight': gross_weight,
            'tare_weight': tare_weight,
            'vessel_name': vessel_name,
            'grade': grade,
            'sub_lease_unity': sub_lease_unity,
            'voyage': voyage,
            'consignee': consignee,
            'region': region,
            'destuffung': destuffung,
            'rftype': rftype,
            'empty_repositioning': empty_repositioning,
            'er_no': er_no,
            'remarks': remarks,
            'user_id' :user_id,
            'depo_id': depo_id,
            'gate_in_id' : containerid
        }



            var formData = new FormData();

            formData.append('container_no', container_no);
            formData.append('id', containerid);

            formData.append('container_size', container_size);
            formData.append('container_type', container_type);
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

            $.ajax({
                url: '/api/gatein/update',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // var callout = document.createElement('div');
                    // callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">${data.message}</p></div>`;
                    // document.getElementById('apiMessages').appendChild(callout);
                    // setTimeout(function() {
                    //     callout.remove();
                    // }, 2000);
                    post('containerverify/create',newdata)
                  
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
        
        line_id:{
            required: true,
        },
       

    },
    messages: {
        job_work_no: {
            required: "This Field Is Required",
        },
        status_name: {
            required: "This Field Is Required",
        },
        gross_weight: {
            required: "This Field Is Required",
        },
        tare_weight: {
            required: "This Field Is Required",
        },
        vessel_name: {
            required: "This Field Is Required",
        },
        grade: {
            required: "This Field Is Required",
        },
        sub_lease_unity: {
            required: "This Field Is Required",
        },
        voyage: {
            required: "This Field Is Required",
        },
        consignee: {
            required: "This Field Is Required",
        },
        region: {
            required: "This Field Is Required",
        },
        destuffung: {
            required: "This Field Is Required",
        },
        rftype: {
            required: "This Field Is Required",
        },

        empty_repositioning: {
            required: "This Field Is Required",
        },
        er_no: {
            required: "This Field Is Required",
        },
        remarks: {
            required: "This Field Is Required",
        },

        container_no: {
            required: "This Field Is Required",
        },
        container_type: {
            required: "This Field Is Required",
        },
        container_size: {
            required: "This Field Is Required",
        },

        inward_date: {
            required: "This Field Is Required",
        },
        inward_time: {
            required: "This Field Is Required",
        },
        driver_name: {
            required: "This Field Is Required",
        },

        contact_number: {
            required: "This Field Is Required",
        },
        third_party: {
            required: "This Field Is Required",
        },
        arrive_from: {
            required: "This Field Is Required",
        },

        port_name: {
            required: "This Field Is Required",
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