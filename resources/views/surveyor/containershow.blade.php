<?php $currentUrl = url()->full(); 
    $breakurl = explode('=',$currentUrl);
    $getid = explode('&',$breakurl[1]);
    // print_r($getid);
    // die;
?>

@extends('common.layout')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                    <h1 class="m-0">Inspect Container</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Inspect Container</li>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inward_date">Inward Date</label>
                                            <input type="text" class="form-control" id="inward_date" name="inward_date" readonly value="<?= date('Y-m-d')?>" placeholder="Enter inward date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inward_time">Inward Time</label>
                                            <input type="text" class="form-control" id="inward_time" name="inward_time" readonly value="<?= date('H:i:s')?>"  placeholder="Enter inward time">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="survayor_date">Survey Start Date</label>
                                            <input type="text" class="form-control" id="survayor_date" name="survayor_date" readonly value="<?= date('Y-m-d')?>" placeholder="Enter Survey Start Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="survayor_time">Survey Start Time</label>
                                            <input type="text" class="form-control" id="survayor_time" name="survayor_time" readonly value="<?= date('H:i:s')?>"  placeholder="Enter Survey Start Time">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_img">Container Image</label>
                                            <div class="img_prv_box"><span class="container_img"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="container_no">Container Number</label>
                                            <input type="text" style="text-transform:uppercase;" class="form-control" oninput="validateInput(this)"  maxlength="11" id="container_no" name="container_no" placeholder="Enter Container Number ">
                                            <span id="errorText" style="color:red; font-size:15px; margin-top: .5rem"></span>
                                        </div>

                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicle_img">Vehicle Image</label>
                                            <div class="img_prv_box"><span class="vehicle_img"></span></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="vehicle_number">Vehicle Number</label>
                                            <input type="text" class="form-control" style="text-transform:uppercase;" id="vehicle_number" name="vehicle_number"  placeholder="Enter Vehicle Number">
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_type">Container Type</label>
                                            <select name="container_type" id="container_type" class="form-control">
                                                <option value="">Select Container Type</option>
                                                <option value="DRY">DRY</option>
                                                <option value="REEFER">REEFER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="container_size_div" style="display:none;">
                                        <div class="form-group">
                                            <label for="container_size">Container Size</label>
                                            <select name="container_size" id="container_size" class="form-control">
                                                <option value="">Select Container Size</option>
                                                <option value="20">20 Size</option>
                                                <option value="40">40 Size</option>
                                                <option value="45">45 Size</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_sub_type_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_type">Sub Type  <span style="color:red;">*</span></label>
                                            <select name="sub_type" id="sub_type" class="form-control">
                                                <option value="">Please Select Sub Type</option>
                                                <option value="DC">DC (  )</option>
                                                <option value="DV">DV (NORMAL)</option>
                                                <option value="FB">FB (FLAT BELT)</option>
                                                <option value="FR">FR (FLAT RACK)</option>
                                                <option value="HC">HC (HIGH CUBE)</option>
                                                <option value="HR">HR (REEFER)</option>
                                                <option value="HT">HT (HAT TOP)</option>
                                                <option value="OT">OT (OPEN TOP)</option>
                                                <option value="RE">RE (REEFER)</option>
                                                <option value="RF">RF (REEFER)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gross_weight">Gross Weight</label>
                                            <input type="number" class="form-control" id="gross_weight" name="gross_weight" placeholder="Enter Gross Weight">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_tare_weight_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tare_weight">Tare Weight</label>
                                            <input type="number" class="form-control" id="tare_weight" name="tare_weight" placeholder="Enter Tare Weight">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mfg_date">Mfg Date</label>
                                            <input class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Gross Weight">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_csc_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="csc_details">CSC Details</label>
                                            <input type="text" class="form-control" id="csc_details" name="csc_details" placeholder="Enter CSC Details">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="line_id">Line Name <span style="color:red;">*</span></label>
                                            <select name="line_id" id="line_id" class="form-control">
                                                <option value="">Select Line</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_grade_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="grade">Grade</label>
                                            <select name="grade" id="grade" class="form-control">
                                                <option value="">Select Grade</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_name">Status Name</label>
                                            <select class="form-control" name="status_name" id="status_name">
                                                <option value="">Select an option</option>
                                                <option value="DIRECT A/V"> DIRECT A/V </option>
                                                <option value="AV">AV (AVAILABLE)</option>
                                                <option value="C/R">C/R </option>
                                                <option value="DIRECT A/V">DIRECT A/V</option>
                                                <option value="F/W">F/W</option>
                                                <option value="H/R">H/R</option>
                                                <option value="H/W">H/W (HEAVY WASH)</option>
                                                <option value="HDM">HDM (HEAVY DAMAGE)</option>
                                                <option value="L/D">L/D (LIGHT DAMAGE)</option>
                                                <option value="LDM">LDM (LIGHT DAMAGE)</option>
                                                <option value="M/DMG">M/DMG (MEDIUM DAMAGE)</option>
                                                <option value="N/W">N/W (NORMAL WASH)</option>
                                                <option value="OK">OK (OKEY)</option>
                                                <option value="RF">RF</option>
                                                <option value="S/0">S/O (SWEEP OUT)</option>
                                                <option value="SW">SW (STEAM WASH)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" id="container_rf_type_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rftype">RF Type</label>
                                            <select class="form-control" name="rftype" id="rftype">
                                                <option value="">select an option</option>
                                                <option value="HUMIDITY-NO">HUMIDITY-NO</option>
                                                <option value="HUMIDITY-YES">HUMIDITY-YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="make">Make <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="make" name="make" placeholder="Enter Make">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_model_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="model_no">Model No.</label>
                                            <input type="text" class="form-control" id="model_no" name="model_no" placeholder="Enter Model No.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="serial_no">Serial No.</label>
                                            <input type="text" class="form-control" id="serial_no" name="serial_no" placeholder="Enter Serial No.">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_device_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="machine_mfg_date"> Machinary Mfg Date</label>
                                            <input type="date" class="form-control" id="machine_mfg_date" name="machine_mfg_date" placeholder="Enter Gross Weight">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="device_status">Device Status</label>
                                            <input type="text" class="form-control" id="device_status" name="device_status" placeholder="Enter Device Status">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save and Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
<script>
  var picker = flatpickr('#mfg_date', {
    dateFormat: 'MM/yyyy',
    enableTime: false,
    altFormat: 'F Y',
    altInput: true,
  });
</script>
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

$('#container_type').on('change',function(){
    var conainerType = $(this).val();

    if(conainerType == "DRY"){
        $('#container_size_div').show();
        $('#container_sub_type_div').show();
        $('#container_tare_weight_div').show();
        $('#container_csc_div').show();
        $('#container_grade_div').show();
        $('#container_rf_type_div').hide();
        $('#container_model_div').hide();
        $('#container_device_div').hide();
        
    }else if(conainerType == "REEFER"){ 
        $('#container_size_div').show();
        $('#container_sub_type_div').show();
        $('#container_tare_weight_div').show();
        $('#container_csc_div').show();
        $('#container_grade_div').show();
        $('#container_rf_type_div').show();
        $('#container_model_div').show();
        $('#container_device_div').show();
    }else{
        $('#container_size_div').hide();
        $('#container_sub_type_div').hide();
        $('#container_tare_weight_div').hide();
        $('#container_csc_div').hide();
        $('#container_grade_div').hide();
        $('#container_rf_type_div').hide();
        $('#container_model_div').hide();
        $('#container_device_div').hide();
    }
})

$('#container_size').on('change',function(){
    var containerType = $('#container_type').val();
    var containerSize = $(this).val();
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    if(containerType == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Container Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    if(containerType != '' && containerSize != ''){
        $.ajax({
            type: "post",
            url: "/api/line/getbysizetype",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
                'containerType':containerType,
                'containerSize':containerSize
            },
            success: function (data) {
                $('#line_id').empty();
                var select = document.getElementById('line_id');
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
    }
})

$(document).ready(function () {
    var containerid = <?= $getid[0]?>;
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    
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
            if(data.container_type == "DRY"){
                $('#container_size_div').show();
                $('#container_sub_type_div').show();
                $('#container_tare_weight_div').show();
                $('#container_csc_div').show();
                $('#container_grade_div').show();
                $('#container_rf_type_div').hide();
                $('#container_model_div').hide();
                $('#container_device_div').hide();
                
            }else if(data.container_type == "REEFER"){
                $('#container_size_div').show();
                $('#container_sub_type_div').show();
                $('#container_tare_weight_div').show();
                $('#container_csc_div').show();
                $('#container_grade_div').show();
                $('#container_rf_type_div').show();
                $('#container_model_div').show();
                $('#container_device_div').show();
            }else{
                $('#container_size_div').hide();
                $('#container_sub_type_div').hide();
                $('#container_tare_weight_div').hide();
                $('#container_csc_div').hide();
                $('#container_grade_div').hide();
                $('#container_rf_type_div').hide();
                $('#container_model_div').hide();
                $('#container_device_div').hide();
            }
            
            if(data.line_id){
                getline(data.line_id, data.container_type,data.container_size);
            }
            // getverifydata();

            $("#inward_date").val(data.inward_date);
            $("#inward_time").val(data.inward_time);
            if(data.survayor_date != null){
                console.log('sdfsd')
                $('#survayor_date').val(data.survayor_date);
            }else{
                $('#survayor_date').val("<?= date('Y-m-d')?>");
            }
            if(data.survayor_time != null){
                $('#survayor_time').val(data.survayor_time);
            }else{
                $('#survayor_time').val("<?= date('H:i:s')?>");
            }
            $("#container_no").val(data.container_no);
            $("#vehicle_number").val(data.vehicle_number);
            $("#container_type").val(data.container_type);
            $("#container_size").val(data.container_size);
            $("#sub_type").val(data.sub_type);
            $("#gross_weight").val(data.gross_weight);
            $("#tare_weight").val(data.tare_weight);
            $('#mfg_date').val(data.mfg_date);
            $('#csc_details').val(data.csc_details);
            $("#grade").val(data.grade);
            $("#status_name").val(data.status_name);
            $("#rftype").val(data.rftype);
            $("#make").val(data.make);
            $("#model_no").val(data.model_no);
            $("#serial_no").val(data.serial_no);
            $("#machine_mfg_date").val(data.machine_mfg_date);
            $("#device_status").val(data.device_status);
        },
        error: function (error) {
            console.log(error);
        }
    });  

});

 
function getline(id,containerType,containerSize){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.ajax({
        type: "POST",
        url: "/api/line/getbysizetype",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id,
            'containerType':containerType,
            'containerSize':containerSize
        },
        success: function (data) {
            $('#line_id').empty();
                var select = document.getElementById('line_id');
                data.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.text = item.name;
                    select.appendChild(option);
                });

            $('#line_id').val(id)
                
        },
        error: function (error) {
            console.log(error);
        }
    });
}



<?php 

    if(isset($breakurl[2])){
        $checkSupervisor = 1;
    }else{
        $checkSupervisor = 0;
    }
?>



$(function () {
    

    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var containerid = <?= $getid[0]?>;
    

    $.validator.setDefaults({
    submitHandler: function () {

        var inward_date = $("#inward_date").val();
        var inward_time = $("#inward_time").val();
        var survayor_date = $('#survayor_date').val();
        var survayor_time = $('#survayor_time').val();
        var container_no = $("#container_no").val();
        var vehicle_number = $("#vehicle_number").val();
        var container_type = $("#container_type").val();
        var container_size = $("#container_size").val();
        var sub_type = $("#sub_type").val();
        var gross_weight = $("#gross_weight").val();
        var tare_weight = $("#tare_weight").val();
        var mfg_date = $('#mfg_date').val();
        var csc_details = $('#csc_details').val();
        var line_id = $("#line_id").val();
        var grade = $("#grade").val();
        var status_name = $("#status_name").val();
        var rftype = $("#rftype").val();
        var make = $("#make").val();
        var model_no = $("#model_no").val();
        var serial_no = $("#serial_no").val();
        var machine_mfg_date = $("#machine_mfg_date").val();
        var device_status = $("#device_status").val();

       var newdata = {
            'inward_date': inward_date,
            'inward_time': inward_time,
            'survayor_date': survayor_date,
            'survayor_time': survayor_time,
            'container_no':container_no,
            'vehicle_number':vehicle_number,
            'container_type':container_type,
            'container_size': container_size,
            'sub_type': sub_type,
            'gross_weight': gross_weight,
            'tare_weight': tare_weight,
            'mfg_date': mfg_date,
            'csc_details': csc_details,
            'line_id': line_id,
            'grade': grade,
            'status_name': status_name,
            'rftype': rftype,
            'make': make,
            'model_no': model_no,
            'serial_no': serial_no,
            'machine_mfg_date': machine_mfg_date,
            'device_status': device_status,
            'user_id' :user_id,
            'depo_id': depo_id,
            'id' : containerid
        }

            $.ajax({
                url: '/api/gatein/update',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data: newdata,
                success: function(data) {
                    var checkSuperbisor = <?php echo $checkSupervisor?>;
                    if(checkSuperbisor == 1){
                        window.location = `/surveyor/masterserveyor?id=${containerid}&supervisor=yes`
                    }else{
                        window.location = `/surveyor/masterserveyor?id=${containerid}`
                    }
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