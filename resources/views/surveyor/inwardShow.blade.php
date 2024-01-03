<?php $currentUrl = url()->full(); 
    $breakurl = explode('=',$currentUrl);
    $getid = explode('&',$breakurl[1]);

    if(isset($getid[1])){
        $is_update = 1;
    }else{
        $is_update = 0;
    }
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
.select2-container .select2-selection--single{
    height:38px !important;
}
.select2-container{
    z-index:100;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inward Container</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Inward Container</li>
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
                                            <input type="text" class="form-control" id="inward_date" name="inward_date" readonly placeholder="Enter inward date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inward_time">Inward Time</label>
                                            <input type="text" class="form-control" id="inward_time" name="inward_time" readonly  placeholder="Enter inward time">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="survayor_date">Survey Start Date</label>
                                            <input type="text" class="form-control" id="survayor_date" name="survayor_date" readonly  placeholder="Enter Survey Start Date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="survayor_time">Survey Start Time</label>
                                            <input type="text" class="form-control" id="survayor_time" name="survayor_time" readonly  placeholder="Enter Survey Start Time">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_img">Container Image</label>
                                            <div class="img_prv_box"><span class="container_img"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicle_img">Vehicle Image</label>
                                            <div class="img_prv_box"><span class="vehicle_img"></span></div>
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
                                    <div class="col-md-6" id="container_size_div">
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="line_id">Line Name <span style="color:red;">*</span></label>
                                            <select name="line_id" id="line_id" class="form-control">
                                                <option value="">Select Line</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_no">Container Number</label>
                                            <input type="text" style="text-transform:uppercase;" class="form-control" oninput="validateInput(this)"  maxlength="11" id="container_no" name="container_no" placeholder="Enter Container Number ">
                                            <span id="errorText" style="color:red; font-size:15px; margin-top: .5rem"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="third_party">Third Party</label>
                                            <select name="third_party" id="third_party"  class="form-control">
                                                <option value="no">NO</option>
                                                <option value="yes">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicle_number">Vehicle Number</label>
                                            <input type="text" class="form-control" style="text-transform:uppercase;" id="vehicle_number" name="vehicle_number"  placeholder="Enter Vehicle Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="line_gst">GST No.</label>
                                            <input type="text" class="form-control" id="line_gst" name="line_gst" readonly  placeholder="Enter GST No.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="consignee_id">Consignee</label>
                                            <select name="consignee_id" id="consignee_id" class="form-control">
                                                <option value="">Select Consignee</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transaction_mode">Transaction Mode</label>
                                            <select name="transaction_mode" id="transaction_mode" class="form-control">
                                                <option value="Cash">Cash</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Net Banking">Net Banking</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Card">Card Payment</option>
                                                <option value="Line Account">Line Account</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transaction_ref_no">Transaction Reference No.</label>
                                            <input type="text" class="form-control" id="transaction_ref_no" name="transaction_ref_no" placeholder="Enter Transaction Reference No.">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="arrive_from">Arrive From</label>
                                            <input type="text" class="form-control" id="arrive_from" name="arrive_from"  placeholder="Enter Arrive From">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transport_id">Transport</label>
                                            <select name="transport_id" id="transport_id" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driver_name">Driver Name</label>
                                            <input type="text" class="form-control" id="driver_name" name="driver_name"  placeholder="Enter Driver Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="text" class="form-control" id="contact_number" name="contact_number"  placeholder="Enter Contact Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vessel_name">Vessel Name</label>
                                            <input type="text" class="form-control" id="vessel_name" name="vessel_name"  placeholder="Enter Vessel Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="voyage">Voyage</label>
                                            <input type="text" class="form-control" id="voyage" name="voyage" placeholder="Enter Voyage">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="port_name">Port Name</label>
                                            <input type="text" class="form-control" id="port_name" name="port_name"  placeholder="Enter Port Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="er_no">ER No.</label>
                                            <input type="text" class="form-control" id="er_no" name="er_no"  placeholder="Enter ER No.">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="empty_latter">Empty Latter</label></br>
                                            <input type="file" id="empty_latter" name="empty_latter" class="form-control">
                                            <div class="img_prv_box"><span class="empty_latter"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="challan">Challan</label></br>
                                            <input type="file" id="challan" name="challan" class="form-control">
                                            <div class="img_prv_box"><span class="challan"></span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="empty_repositioning">Empty Repositioning</label>
                                            <select name="empty_repositioning" id="empty_repositioning"  class="form-control">
                                                <option value="no">NO</option>
                                                <option value="yes">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="return">Return</label>
                                            <select name="return" id="return" class="form-control">
                                                <option value="NO">NO</option>
                                                <option value="YES">YES</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking_device">Tracking Device (<span id="track_device_name"></span>)</label>
                                            <select name="tracking_device" id="tracking_device" class="form-control">
                                                <option value="YES">YES</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="remarks">Remarks</label>
                                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billing_type">Billing Type</label>
                                            <select name="billing_type" class="form-control" id="billing_type">
                                                <option value="">Select Billing Type</option>
                                                <option value="lolo">Lolo Billing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="billing_type">Amount</label>
                                            <input type="text" id="amount" class="form-control" name="amount" placeholder="Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="is_included">Tax Included / Excluded</label>
                                            <select name="is_included" id="is_included" class="form-control">
                                                <option value="included">Included</option>
                                                <option value="excluded">Excluded</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="invoice_id">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
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
    refreshTransporter()
    refreshConsignee()

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

            if(data.challan){
                $('.challan').html(`<img src="/uploads/gatein/${data.challan}">`);
            }else{
                $('.challan').html('<p>No Image Available</p>');
            }

            if(data.empty_latter){
                $('.empty_latter').html(`<img src="/uploads/gatein/${data.empty_latter}">`);
            }else{
                $('.empty_latter').html('<p>No Image Available</p>');
            }

            getTransactionAmount('lolo',data.id);

            if(data.line_id){
                getline(data.line_id, data.container_type,data.container_size);
            }
            if(data.transport_id){
                getTranport(data.transport_id);
            }
            if(data.transport_id){
                getConsignee(data.consignee_id);
            }

            $("#inward_date").val(data.inward_date);
            $("#inward_time").val(data.inward_time);
            $('#survayor_date').val(data.survayor_date);
            $('#survayor_time').val(data.survayor_time);
            $("#container_no").val(data.container_no);
            $("#vehicle_number").val(data.vehicle_number);
            if(data.third_party != null){
                $("#third_party").val(data.third_party);
            }
            if(data.transaction_mode != null){
                $("#transaction_mode").val(data.transaction_mode);
            }
            $("#transaction_ref_no").val(data.transaction_ref_no);
            $("#arrive_from").val(data.arrive_from);
            $("#driver_name").val(data.driver_name);
            $("#contact_number").val(data.contact_number);
            $("#vessel_name").val(data.vessel_name);
            $("#voyage").val(data.voyage);
            $("#port_name").val(data.port_name);
            $("#er_no").val(data.er_no);
            if(data.empty_repositioning != null){
                $("#empty_repositioning").val(data.empty_repositioning);
            }
            if(data.return != null){
                $("#return").val(data.return);
            }
            if(data.tracking_device != null){
                $("#tracking_device").val(data.tracking_device);
            }
            $("#remarks").val(data.remarks);
        },
        error: function (error) {
            console.log(error);
        }
    });

});

function refreshConsignee(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.ajax({
        type: "post",
        url: "/api/transport/getConsignee",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            processConsignee(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function refreshTransporter(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.ajax({
        type: "post",
        url: "/api/transport/getTransporter",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            processTransporter(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function processConsignee(transporters){
    var transformedData = transporters.map(function(item) {
    return {
        id: item.id,
        text: item.name
    };
});

var blankOption = { id: '', text: '' };
transformedData.unshift(blankOption);

$('#consignee_id').select2({
    placeholder: 'Select Consignee',
    data: transformedData,
    escapeMarkup: function (markup) {
        return markup;
    },
    language: {
        noResults: function () {
            return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createConsigneeModel()">Add New</button></center>';
        }
    }
});
}


function processTransporter(transporters){
    var transformedData = transporters.map(function(item) {
        return {
            id: item.id,
            text: item.name
        };
    });

    var blankOption = { id: '', text: '' };
    transformedData.unshift(blankOption);

    $('#transport_id').select2({
        placeholder: 'Select Transporter',
        data: transformedData,
        escapeMarkup: function (markup) {
            return markup;
        },
        language: {
            noResults: function () {
                return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTransporterModel()">Add New</button></center>';
            }
        }
    });
}
function createTransporterModel(){
    $('#modal-transporter').modal('show');
}

function createConsigneeModel(){
    $('#modal-consignee').modal('show');
}
 



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

            var select = document.getElementById('line_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                select.appendChild(option);
            });
            var lineData = data.find(x => x.id == id);
            $('#line_id').val(lineData.id)
            $('#container_type').val(lineData.containerType)
            $('#container_size').val(lineData.containerSize)
            $("#line_gst").val(lineData.gst);
            $('#track_device_name').text(lineData.tracking_device); 
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getConsignee(id){
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
            $("#consignee_id").val(data.id).trigger('change');
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
            $("#transport_id").val(data.id).trigger('change');
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getTransactionAmount(bill_type,gateinid){
    var checkToken = localStorage.getItem('token');

    $.ajax({
                type: "POST",
                url: "/api/transcation/getbytype",
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data:{
                    'bill_type':bill_type,
                    'gateinid':gateinid
                },
                success: function (data) {
                    if(data){
                        $('#invoice_id').val(data.id);
                        $("#billing_type").val(data.incoice_type);
                        $("#amount").val(data.amount);
                        $("#is_included").val(data.is_included);
                    }
                    
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


$('#billing_type').on('change',function(){
    var bill_type = $(this).val();
    var checkToken = localStorage.getItem('token');
    var gateinid = <?php echo $getid[0]?>;

    if(bill_type == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Billing Type</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

        if(bill_type != ''){
            var line_id = $('#line_id').val();

            $.ajax({
                type: "POST",
                url: "/api/line/getbyid",
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data:{
                    'id':line_id,
                },
                success: function (data) {
                    var amount = ''
                    if(bill_type == 'lolo'){
                        amount = data.lolo_charges;
                    }else if(bill_type == "parking"){
                        amount = data.parking_charges;
                    }
                    $("#amount").val(`${amount}`);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        
    }

    

})


$(function () {
    
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var containerid = <?= $getid[0]?>;
    
    $.validator.setDefaults({
    submitHandler: function () {
        var container_type = $("#container_type").val();
        var container_size = $("#container_size").val();

        var inward_date = $("#inward_date").val();
        var inward_time = $("#inward_time").val();
        var survayor_date = $('#survayor_date').val();
        var survayor_time = $('#survayor_time').val();
        var container_no = $("#container_no").val();
        var vehicle_number = $("#vehicle_number").val();
        var line_id = $("#line_id").val();
        var third_party = $("#third_party").val();
        var consignee_id = $("#consignee_id").val();
        var transaction_mode = $("#transaction_mode").val();
        var transaction_ref_no = $("#transaction_ref_no").val();
        var arrive_from = $("#arrive_from").val();
        var transport_id = $("#transport_id").val();
        var driver_name = $("#driver_name").val();
        var contact_number = $("#contact_number").val();
        var vessel_name = $("#vessel_name").val();
        var voyage = $("#voyage").val();
        var port_name = $("#port_name").val();
        var er_no = $("#er_no").val();
        var empty_repositioning = $("#empty_repositioning").val();
        var returnfiled = $("#return").val();
        var tracking_device = $("#tracking_device").val();
        var remarks = $("#remarks").val();
        var billing_type = $("#billing_type").val();
        var amount = $("#amount").val();
        var is_included = $("#is_included").val();
        var invoice_id = $("#invoice_id").val();


            var formData = new FormData();
            formData.append('container_type', container_type);
            formData.append('container_size', container_size);
            formData.append('inward_date', inward_date);
            formData.append('inward_time', inward_time);
            formData.append('survayor_date', survayor_date);
            formData.append('survayor_time', survayor_time);
            formData.append('container_no', container_no);
            formData.append('vehicle_number', vehicle_number);
            formData.append('line_id', line_id);
            formData.append('third_party', third_party);
            formData.append('consignee_id', consignee_id);
            formData.append('transaction_mode', transaction_mode);
            formData.append('transaction_ref_no', transaction_ref_no);
            formData.append('arrive_from', arrive_from);
            formData.append('transport_id', transport_id);
            formData.append('driver_name', driver_name);
            formData.append('contact_number', contact_number);
            formData.append('vessel_name', vessel_name);
            formData.append('voyage', voyage);
            formData.append('port_name', port_name);
            formData.append('er_no', er_no);
            formData.append('empty_repositioning', empty_repositioning);
            formData.append('return', returnfiled);
            formData.append('tracking_device', tracking_device);
            formData.append('remarks', remarks);
            formData.append('id', containerid);
            formData.append('amount',amount);
            formData.append('is_included',is_included);
            formData.append('challan', $('#challan')[0].files[0]);
            formData.append('empty_latter', $('#empty_latter')[0].files[0]);

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
                    if(invoice_id != ''){
                        printurl= `/print/thirdparty?gatein=${containerid}&type=${billing_type}&p_type=${transaction_mode}&depo=${depo_id}&third_party=${third_party}&user=${user_id}&amt=${amount}&is_included=${is_included}&is_update=${invoice_id}`

                    }else{
                        printurl= `/print/thirdparty?gatein=${containerid}&type=${billing_type}&p_type=${transaction_mode}&depo=${depo_id}&third_party=${third_party}&user=${user_id}&amt=${amount}&is_included=${is_included}`

                    }
                    window.open(printurl, '_blank');
                    window.location = `/inward/executive`;
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
        billing_type:{
            required: true,
        },
        is_included:{
            required: true,
        },
       
        container_type: {
            required: true,
        },
        container_size: {
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

function add_transporter(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var name   = $('#t_name').val();
    var address   = $('#t_address').val();
    var city   = $('#t_city').val();
    var state   = $('#t_state').val();
    var pincode   = $('#t_pincode').val();
    var gst   = $('#t_gst').val();
    var pan   = $('#t_pan').val();
    var gst_state   = $('#t_gst_state').val();
    var state_code   = $('#t_state_code').val();

    if(name == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Name Is Required</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    if(name != ''){
        const data = {
        'name':name,
        'address':address,
        'city':city,
        'state':state,
        'pincode':pincode,
        'gst':gst,
        'pan':pan,
        'gst_state':gst_state,
        'state_code':state_code,
        'is_transport':"transport",
        'user_id':user_id,
        'depo_id':depo_id,
        }
    post('transport/create',data);
    refreshTransporter()
    $('#t_name').val('');
    $('#t_address').val('');
    $('#t_city').val('');
    $('#t_state').val('');
    $('#t_pincode').val('');
    $('#t_gst').val('');
    $('#t_pan').val('');
    $('#t_gst_state').val('');
    $('#t_state_code').val('');

    $('#modal-transporter').modal('hide');
    }

    
}

function add_consginee(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var name   = $('#name').val();
    var address   = $('#address').val();
    var city   = $('#city').val();
    var state   = $('#state').val();
    var pincode   = $('#pincode').val();
    var gst   = $('#gst').val();
    var pan   = $('#pan').val();
    var gst_state   = $('#gst_state').val();
    var state_code   = $('#state_code').val();

    if(name == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Name Is Required</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }
    if(name != ''){
    const data = {
        'name':name,
        'address':address,
        'city':city,
        'state':state,
        'pincode':pincode,
        'gst':gst,
        'pan':pan,
        'gst_state':gst_state,
        'state_code':state_code,
        'is_transport':"consignee",
        'user_id':user_id,
        'depo_id':depo_id,
    }
    post('transport/create',data);
    refreshConsignee()
    $('#name').val('');
    $('#address').val('');
    $('#city').val('');
    $('#state').val('');
    $('#pincode').val('');
    $('#gst').val('');
    $('#pan').val('');
    $('#gst_state').val('');
    $('#state_code').val('');
    $('#modal-consignee').modal('hide');
}
}

function getTransporter_t(){
        var gst = $('#t_gst').val();
        if(gst.length ==  15){
            var stateCode = gst.slice(0, 2);
            var pan = gst.slice(2, 13);
            var payload = {
                    "AppSCommonSearchTPItem":[{
                        "GSTIN":gst
                    }]
                } 

            $.ajax({
                type: "post",
                url: "https://www.ewaybills.com/MVEWBAuthenticate/MVAppSCommonSearchTP",
                headers: {
                    'MVApiKey': 'AbK438CB5t5EAOv',
                    'MVSecretKey': '6d1YZNP9IqFt3XE7t6UUuA==',
                    'GSTIN': '07AAHCT3019Q2ZV',
                    'Content-Type': 'application/json',
                },
                data:JSON.stringify(payload),
                success: function(response) {
                    var parjson = JSON.parse(response);
                    if(parjson.Status == 1){
                        fetch('/state.json')
                            .then(response => {
                                if (!response.ok) {
                                throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                var state_data = data.find(function(state) {
                                    return state.state_code === stateCode;
                                });
                                $("#t_state").val(state_data.state);
                                $("#t_state_code").val(state_data.state_code);
                                $("#t_pan").val(pan);

                            })
                            .catch(error => {
                                console.error('Error loading JSON:', error);
                            });
                            var final_addr = parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.bno + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.flno + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.bnm + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.st ;
                            $("#t_gst_state").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.stcd);
                            $("#t_name").val(parjson.lstAppSCommonSearchTPResponse[0].tradeNam);
                            $("#t_address").val(final_addr);
                            $("#t_city").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.loc);
                            $("#t_pincode").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.pncd);
                    }else{
                        var callout = document.createElement('div');
                            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Invalid Gst No.</p></div>`;
                            document.getElementById('apiMessages').appendChild(callout);
                            setTimeout(function() {
                                callout.remove();
                            }, 2000);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

}

function getTransporter_c(){
        var gst = $('#gst').val();
        if(gst.length ==  15){
            var stateCode = gst.slice(0, 2);
            var pan = gst.slice(2, 13);

            var payload = {
                    "AppSCommonSearchTPItem":[{
                        "GSTIN":gst
                    }]
                } 

            $.ajax({
                type: "post",
                url: "https://www.ewaybills.com/MVEWBAuthenticate/MVAppSCommonSearchTP",
                headers: {
                    'MVApiKey': 'AbK438CB5t5EAOv',
                    'MVSecretKey': '6d1YZNP9IqFt3XE7t6UUuA==',
                    'GSTIN': '07AAHCT3019Q2ZV',
                    'Content-Type': 'application/json',
                },
                data:JSON.stringify(payload),
                success: function(response) {
                    var parjson = JSON.parse(response);
                    if(parjson.Status == 1){
                        fetch('/state.json')
                            .then(response => {
                                if (!response.ok) {
                                throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                var state_data = data.find(function(state) {
                                    return state.state_code === stateCode;
                                });
                                $("#state").val(state_data.state);
                                $("#state_code").val(state_data.state_code);
                                $("#pan").val(pan);

                            })
                            .catch(error => {
                                console.error('Error loading JSON:', error);
                            });
                            var final_addr = parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.bno + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.flno + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.bnm + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.st ;
                            $("#gst_state").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.stcd);
                            $("#name").val(parjson.lstAppSCommonSearchTPResponse[0].tradeNam);
                            $("#address").val(final_addr);
                            $("#city").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.loc);
                            $("#pincode").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.pncd);
                    }else{
                        var callout = document.createElement('div');
                            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Invalid Gst No.</p></div>`;
                            document.getElementById('apiMessages').appendChild(callout);
                            setTimeout(function() {
                                callout.remove();
                            }, 2000);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

}

</script>

<div class="modal fade" id="modal-consignee">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Consignee</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">GST</label>
                            <input type="text" class="form-control" onkeyup="getTransporter_c()" id="gst" name="gst" placeholder="Enter GST">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="name" name="name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control"  id="address" name="address" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="city" name="city" placeholder="Enter City">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control"  id="state" name="state" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state_code">State Code <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="state_code" name="state_code" placeholder="Enter State Code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pincode">Pincode <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="pincode" name="pincode" placeholder="Enter pincode">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst_state">GST State</label>
                            <input type="text" class="form-control"  id="gst_state" name="gst_state" placeholder="Enter GST State">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pan">PAN NO. <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter PAN NO.">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="add_consginee()">Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-transporter">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Transporter</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">GST</label>
                            <input type="text" class="form-control" onkeyup="getTransporter_t()" id="t_gst" name="gst" placeholder="Enter GST">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="t_name" name="name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control"  id="t_address" name="address" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="t_city" name="city" placeholder="Enter City">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control"   id="t_state" name="state" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state_code">State Code <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="t_state_code" name="state_code" placeholder="Enter State Code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pincode">Pincode <span style="color:red;">*</span></label>
                            <input type="text" class="form-control"  id="t_pincode" name="pincode" placeholder="Enter pincode">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst_state">GST State</label>
                            <input type="text" class="form-control"  id="t_gst_state" name="gst_state" placeholder="Enter GST State">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pan">PAN NO. <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="t_pan" name="pan" placeholder="Enter PAN NO.">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="add_transporter()">Submit</button>
            </div>
        </div>
    </div>
</div>

@endsection