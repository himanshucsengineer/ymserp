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
                                            <input type="text" class="form-control" id="survayor_date" name="survayor_date" readonly value="<?= date('Y-m-d')?>" placeholder="Enter inward date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="survayor_time">Survey Start Time</label>
                                            <input type="text" class="form-control" id="survayor_time" name="survayor_time" readonly value="<?= date('H:i:s')?>"  placeholder="Enter inward time">
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
                                                <option value="20">20</option>
                                                <option value="40">40</option>
                                                <option value="45">45</option>
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
                                                <option value="DC">DC</option>
                                                <option value="DV">DV</option>
                                                <option value="FB">FB</option>
                                                <option value="FR">FR</option>
                                                <option value="HC">HC</option>
                                                <option value="HR">HR</option>
                                                <option value="HT">HT</option>
                                                <option value="OT">OT</option>
                                                <option value="RE">RE</option>
                                                <option value="RF">RF</option>
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
                                            <input type="date" class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Gross Weight">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_csc_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mfg_date">CSC Details</label>
                                            <input type="text" class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Gross Weight">
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
                                                <option value="AV">AV</option>
                                                <option value="C/R">C/R</option>
                                                <option value="DIRECT A/V">DIRECT A/V</option>
                                                <option value="F/W">F/W</option>
                                                <option value="H/R">H/R</option>
                                                <option value="H/W">H/W</option>
                                                <option value="HDM">HDM</option>
                                                <option value="L/D">L/D</option>
                                                <option value="LDM">LDM</option>
                                                <option value="M/DMG">M/DMG</option>
                                                <option value="N/W">N/W</option>
                                                <option value="OK">OK</option>
                                                <option value="RF">RF</option>
                                                <option value="S/0">S/0</option>
                                                <option value="SW">SW</option>
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
                                            <label for="line_id">Make <span style="color:red;">*</span></label>
                                            <select name="line_id" id="line_id" class="form-control">
                                                <option value="">Select Line</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_model_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mfg_date">Model No.</label>
                                            <input type="text" class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Gross Weight">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mfg_date">Serial No.</label>
                                            <input type="text" class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Gross Weight">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="container_device_div" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mfg_date"> Machinary Mfg Date</label>
                                            <input type="text" class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Gross Weight">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mfg_date">Device Status</label>
                                            <input type="text" class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Gross Weight">
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
    var conainerTyoe = $(this).val();

    if(conainerTyoe == "DRY"){
        $('#container_size_div').show();
        $('#container_sub_type_div').show();
        $('#container_tare_weight_div').show();
        $('#container_csc_div').show();
        $('#container_grade_div').show();
        $('#container_rf_type_div').hide();
        $('#container_model_div').hide();
        $('#container_device_div').hide();
        
    }else if(conainerTyoe == "REEFER"){
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
$(document).ready(function () {
    var containerid = <?= $getid[0]?>;
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.ajax({
        type: "post",
        url: "/api/line/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
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

            if(data.container_img){
                $('.container_img').html(`<img src="/uploads/gatein/${data.container_img}">`);
            }else{
                $('.container_img').html('<p>No Image Available</p>');
            }

            if(data.vehicle_img){
                $('.vehicle_img').html(`<img src="/uploads/gatein/${data.vehicle_img}">`);
            }else{
                $('.vehicle_img').html('<p>No Image Available</p>');
            }

            if(data.driver_photo){
                $('.driver_photo').html(`<img src="/uploads/gatein/${data.driver_photo}">`);
            }else{
                $('.driver_photo').html('<p>No Image Available</p>');
            }

            if(data.challan){
                $('.challan').html(`<img src="/uploads/gatein/${data.challan}">`);
            }else{
                $('.challan').html('<p>No Image Available</p>');
            }
            if(data.driver_license){
                $('.driver_license').html(`<img src="/uploads/gatein/${data.driver_license}">`);
            }else{
                $('.driver_license').html('<p>No Image Available</p>');
            }

            if(data.do_copy){
                $('.do_copy').html(`<img src="/uploads/gatein/${data.do_copy}">`);
            }else{
                $('.do_copy').html('<p>No Image Available</p>');
            }

            if(data.aadhar){
                $('.aadhar').html(`<img src="/uploads/gatein/${data.aadhar}">`);
            }else{
                $('.aadhar').html('<p>No Image Available</p>');
            }

            if(data.pan){
                $('.pan').html(`<img src="/uploads/gatein/${data.pan}">`);
            }else{
                $('.pan').html('<p>No Image Available</p>');
            }

            if(data.line_id){
                getline(data.line_id);
            }
            getverifydata();

            $("#container_no").val(data.container_no)
            $("#sub_type").val(data.sub_type)
            $("#container_type").val(data.container_type)
            $("#container_size").val(data.container_size)
            $("#inward_date").val(data.inward_date)
            $("#inward_time").val(data.inward_time)
            $("#driver_name").val(data.driver_name)
            $("#vehicle_number").val(data.vehicle_number)
            $("#contact_number").val(data.contact_number)
            if(data.third_party){
                $("#third_party").val(data.third_party)
            }else{
                $("#third_party").val("no")
            }
            $("#arrive_from").val(data.arrive_from)
            $("#port_name").val(data.port_name)
        },
        error: function (error) {
            console.log(error);
        }
    });  

});

 
function getline(id){
    $.ajax({
        type: "POST",
        url: "/api/line/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':id
        },
        success: function (data) {
            $("#line_id").val(data.id);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getTranport(id){
    $.ajax({
        type: "POST",
        url: "/api/transport/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':id
        },
        success: function (data) {
            $("#transport_id").val(data.id);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getverifydata(){
    var containerid = <?= $getid[0]?>;
    
    var checkToken = localStorage.getItem('token'); 
    $.ajax({
        type: "POST",
        url: "/api/containerverify/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'gate_in_id':containerid
        },
        success: function (data) {
            $('#status_name').val(data.status_name);
            $('#job_work_no').val(data.job_work_no);
            $('#gross_weight').val(data.gross_weight);
            $('#tare_weight').val(data.tare_weight);
            $('#vessel_name').val(data.vessel_name);
            $('#grade').val(data.grade);
            $('#sub_lease_unity').val(data.sub_lease_unity);
            $('#voyage').val(data.voyage);
            $('#consignee').val(data.consignee);
            $('#region').val(data.region);
            $('#destuffung').val(data.destuffung);
            $('#rftype').val(data.rftype);
            $('#empty_repositioning').val(data.empty_repositioning);
            $('#er_no').val(data.er_no);
            $('#remarks').val(data.remarks);

            if(data.survayor_date){
                $('#survayor_date').val(data.survayor_date);
            }else{
                $('#survayor_date').val('<?php echo date('Y-m-d')?>'); 
            }

            if(data.survayor_time){
                $('#survayor_time').val(data.survayor_time);
            }else{
                $('#survayor_time').val('<?php echo date('H:i:s')?>'); 
            }

            $('#mfg_date').val(data.mfg_date);

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
        var line_id = $("#line_id").val();
        var container_size = $("#container_size").val();
        var container_type = $("#container_type").val();
        var sub_type = $("#sub_type").val();
        var status_name = $("#status_name").val();
        var grade = $("#grade").val();
        var gross_weight = $("#gross_weight").val();
        var tare_weight = $("#tare_weight").val();
        var mfg_date = $('#mfg_date').val();
        var rftype = $("#rftype").val();
        var job_work_no = $("#job_work_no").val();
        var sub_lease_unity = $("#sub_lease_unity").val();

        newdata = {
            'status_name': status_name,
            'job_work_no': job_work_no,
            'gross_weight': gross_weight,
            'tare_weight': tare_weight,
            'survayor_date':survayor_date,
            'survayor_time':survayor_time,
            'mfg_date':mfg_date,
            // 'vessel_name': vessel_name,
            'grade': grade,
            'sub_lease_unity': sub_lease_unity,
            // 'voyage': voyage,
            // 'consignee': consignee,
            // 'region': region,
            // 'destuffung': destuffung,
            'rftype': rftype,
            // 'empty_repositioning': empty_repositioning,
            // 'er_no': er_no,
            // 'remarks': remarks,
            'user_id' :user_id,
            'depo_id': depo_id,
            'gate_in_id' : containerid
        }

        console.log(newdata);



            var formData = new FormData();

            formData.append('container_no', container_no);
            formData.append('id', containerid);
            formData.append('container_size', container_size);
            formData.append('container_type', container_type);
            formData.append('sub_type', sub_type);
            // formData.append('transport_id', transport_id);
            formData.append('inward_date', inward_date);
            formData.append('inward_time', inward_time);
            // formData.append('driver_name', driver_name);
            formData.append('vehicle_number', vehicle_number);
            // formData.append('contact_number', contact_number);
            // formData.append('third_party', third_party);
            formData.append('line_id', line_id);
            // formData.append('arrive_from', arrive_from);
            // formData.append('port_name', port_name);
            formData.append('user_id', user_id);
            formData.append('depo_id', depo_id);

            // formData.append('driver_photo', $('#driver_photo')[0].files[0]);
            // formData.append('challan', $('#challan')[0].files[0]);
            // formData.append('driver_license', $('#driver_license')[0].files[0]);
            // formData.append('do_copy', $('#do_copy')[0].files[0]);
            // formData.append('aadhar', $('#aadhar')[0].files[0]);
            // formData.append('pan', $('#pan')[0].files[0]);

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
                        var checkSuperbisor = <?php echo $checkSupervisor?>;
                        // window.location = `/surveyor/inspection`
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