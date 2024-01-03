@extends('common.layout')

@section('content')

<style>
.img_prv_box {
    margin-top: .5rem;
    /* border:1px solid #cdcdcd; */
    width: 400px;
    /* height:200px; */
}

.img_prv_box img {
    width: 100%;
}
.select2-container .select2-selection--single{
    height:38px !important;
}
.select2-container{
    z-index:100;
}
.driver_flex{
    width:100%;
    height:auto;
    display: flex;
}
.driver_flex .right{
    width:88%;
}
.driver_flex .right input{
    border-radius:4px 0px 0px 4px !important;
}
.driver_flex .left{
    padding-top:2rem;
    width:12%;
}
.driver_flex .left #captureButton{
    width: 100%;
    height: auto;
    border: 1px solid #cdcdcd;
    background: transparent;
    color: #63bf84;
    font-size: 1.53rem;
    cursor:pointer;
    border-radius:0px 4px 4px 0px ;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Outward Entry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Outward Entry</li>
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="container_no">Container Number <span
                                                    style="color:red;">*</span></label>
                                            <input type="text" class="" oninput="validateInput(this)" maxlength="11"
                                                style="font-size:50px; width:100%; text-transform:uppercase;"
                                                id="container_no" name="container_no" placeholder="">
                                            <span id="errorText"
                                                style="color:red; font-size:15px; margin-top: .5rem"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_type">Container Type</label>
                                            <input type="text" id="container_type" name="container_type"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_size">Container Size</label>
                                            <input type="text" id="container_size" name="container_size"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_type">Sub Type</label>
                                            <input type="text" id="sub_type" name="sub_type" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_name">Status Name</label>
                                            <input type="text" id="status_name" name="status_name" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="grade">Grade</label>
                                            <input type="text" id="grade" name="grade" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="line_name">Line Name</label>
                                            <input type="text" id="line_name" name="line_name" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="repair_date">Repair Completion Date</label>
                                            <input type="text" id="repair_date" name="repair_date" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inward_date">Inward Date</label>
                                            <input type="text" id="inward_date" name="inward_date" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="do_no">D.O. Number</label>
                                            <input type="text" class="form-control" onfocusout="checkDoNo()" id="do_no" name="do_no"
                                                placeholder="Enter D.O. Number ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="do_date">D.O. Date</label>
                                            <input type="text" readonly class="form-control" id="do_date" name="do_date"
                                                placeholder="Enter D.O. Date ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transport_id">Transporters</label>
                                            <select name="transport_id" id="transport_id" class="form-control">
                                                <option value="">Select Transporters</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicle_no">Vehicle Number </label>
                                            <select name="vehicle_no" id="vehicle_no" class="form-control">
                                                <option value="">Select Vehicle Number</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="destination">Destination</label>
                                            <input type="text" class="form-control" id="destination" name="destination"
                                                placeholder="Enter Destination ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seal_no">Seal Number</label>
                                            <input type="text" class="form-control" id="seal_no" name="seal_no"
                                                placeholder="Enter Seal Number ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="third_party">Third Party </label>
                                            <select name="third_party" id="third_party" class="form-control">
                                                <option value="">Select Third Party</option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="port_name">Port Name</label>
                                            <input type="text" class="form-control" id="port_name" name="port_name"
                                                placeholder="Enter Port Name ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="temprature">Temprature</label>
                                            <input type="text" class="form-control" id="temprature" name="temprature"
                                                placeholder="Enter Temprature ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vent_seal_no">Vent Seal No.</label>
                                            <input type="text" class="form-control" id="vent_seal_no"
                                                name="vent_seal_no" placeholder="Enter Vent Seal No. ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ventilation">Ventilation</label>
                                            <input type="text" class="form-control" id="ventilation" name="ventilation"
                                                placeholder="Enter Ventilation ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="humadity">Humadity</label>
                                            <select name="humadity" id="humadity" class="form-control">
                                                <option value="">Select Humadity</option>
                                                <option value="yes">HUMADITY YES</option>
                                                <option value="no">HUMADITY NO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="device_status">Device Status</label>
                                            <input type="text" class="form-control" id="device_status"
                                                name="device_status" placeholder="Enter Device Status ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount"
                                                placeholder="Enter Amount ">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="do_copy">D.O. Photo</label>
                                            <input type="file" class="form-control" id="do_copy" name="do_copy"
                                                placeholder="Enter Container Number ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="challan_copy">Challan Photo</label>
                                            <input type="file" class="form-control" id="challan_copy"
                                                name="challan_copy" placeholder="Enter Container Number ">
                                        </div>


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="challan_no">Challan Number</label>
                                            <input type="text" class="form-control" id="challan_no" name="challan_no"
                                                placeholder="Enter Challan Number ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driver_name">Driver Name</label>
                                            <input type="text" class="form-control" id="driver_name" name="driver_name"
                                                placeholder="Enter Driver Name ">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="driver_flex">
                                            <div class="right">
                                            <div class="form-group">
                                                <label for="driver_copy">Driver Photo</label>
                                                <input type="file" class="form-control" id="driver_copy" name="driver_copy"
                                                    placeholder="Enter Container Number " required>
                                            </div>
                                            </div>
                                            <div class="left">
                                                <div id="captureButton" class="text-center"><i class="fas fa-camera"></i></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="driver_contact">Driver Contact</label>
                                            <input type="text" class="form-control" id="driver_contact" name="driver_contact"
                                                placeholder="Enter Driver Contact">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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
                                            <label for="licence_no">Licence Number</label>
                                            <input type="text" class="form-control" id="licence_no" name="licence_no"
                                                placeholder="Enter Licence Number ">
                                        </div>
                                        <div class="form-group">
                                            <label for="licence_copy">Licence Photo</label>
                                            <input type="file" class="form-control" id="licence_copy"
                                                name="licence_copy" placeholder="Enter Container Number ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="aadhar_no">Aadhar Number</label>
                                            <input type="text" class="form-control" id="aadhar_no" name="aadhar_no"
                                                placeholder="Enter Aadhar Number ">
                                        </div>
                                        <div class="form-group">
                                            <label for="aadhar_copy">Aadhar Photo</label>
                                            <input type="file" class="form-control" id="aadhar_copy" name="aadhar_copy"
                                                placeholder="Enter Container Number ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pan_no">PAN Number</label>
                                            <input type="text" class="form-control" id="pan_no" name="pan_no"
                                                placeholder="Enter Pan Number ">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pan_copy">PAN Photo</label>
                                            <input type="file" class="form-control" id="pan_copy" name="pan_copy"
                                                placeholder="Enter Container Number ">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="gate_in_id" >
                                <input type="hidden" id="pre_advice_id" >
                                <button type="submit" class="btn btn-primary">Save Print Gate Pass</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
        document.addEventListener('DOMContentLoaded', function () {
            const captureButton = document.getElementById('captureButton');
            const webcamVideo = document.getElementById('webcamVideo');
            const confirmButton = document.getElementById('confirmButton');
            const discardButton = document.getElementById('discardButton');
            let hiddenFileInput = document.getElementById('driver_copy');

            captureButton.addEventListener('click', function () {
                $('#modal-camera').modal('show');
                // Access the webcam
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        // Display the video element
                        webcamVideo.srcObject = stream;
                        webcamVideo.play();
                        webcamVideo.style.display = 'block';

                        // Hide the capture button
                        captureButton.style.display = 'none';

                        // Show the confirm and discard buttons
                        confirmButton.style.display = 'inline-block';
                        discardButton.style.display = 'inline-block';
                    })
                    .catch(function (error) {
                        console.error('Error accessing webcam:', error);
                    });
            });

            confirmButton.addEventListener('click', function () {
                setTimeout(function () {
                    const canvas = document.createElement('canvas');
                    canvas.width = webcamVideo.videoWidth;
                    canvas.height = webcamVideo.videoHeight;
                    const context = canvas.getContext('2d');
                    context.drawImage(webcamVideo, 0, 0, canvas.width, canvas.height);
                    const imageDataURL = canvas.toDataURL('image/png');

                    const newFileInput = document.createElement('input');
                    newFileInput.type = 'file';
                    newFileInput.accept = 'image/*';
                    newFileInput.style.display = 'block';
                    newFileInput.className  = 'form-control';
                    const blob = dataURLtoBlob(imageDataURL);
                    const file = new File([blob], 'captured_image.png', { type: 'image/png' });
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    newFileInput.files = dataTransfer.files;

                    hiddenFileInput.parentNode.replaceChild(newFileInput, hiddenFileInput);
                    hiddenFileInput = newFileInput;

                    const tracks = webcamVideo.srcObject.getTracks();
                    tracks.forEach(track => track.stop());
                    webcamVideo.style.display = 'none';
                    captureButton.style.display = 'block';
                    confirmButton.style.display = 'none';
                    discardButton.style.display = 'none';
                    $('#modal-camera').modal('hide');

                }, 1000);
            });

            discardButton.addEventListener('click', function () {
                $('#modal-camera').modal('hide');
                const tracks = webcamVideo.srcObject.getTracks();
                tracks.forEach(track => track.stop());
                webcamVideo.style.display = 'none';
                captureButton.style.display = 'block';
                confirmButton.style.display = 'none';
                discardButton.style.display = 'none';
            });

            // Function to convert data URL to Blob
            function dataURLtoBlob(dataURL) {
                const arr = dataURL.split(',');
                const mime = arr[0].match(/:(.*?);/)[1];
                const bstr = atob(arr[1]);
                let n = bstr.length;
                const u8arr = new Uint8Array(n);
                while (n--) {
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new Blob([u8arr], { type: mime });
            }
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
    if (checkFirstChar == false) {
        document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
        inputField.setAttribute('maxlength', '1');
        input.style.color = 'red';
    }

    if (inputValue.length <= 4) {
        const checkNumber = /\d/; // This regex matches any digit (0-9)
        let chechkNumberforstart = checkNumber.test(inputValue);
        if (chechkNumberforstart) {
            document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
            inputField.setAttribute('maxlength', inputValue.length);
            input.style.color = 'red';
        }
    }

    if (inputValue.length > 4) {
        const part2 = inputValue.substring(4);
        let checkNumber = isNaN(part2);
        if (checkNumber == true) {
            document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
            inputField.setAttribute('maxlength', inputValue.length);
            input.style.color = 'red';
        }
    }
}

function checkDoNo(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var do_no = $('#do_no').val();

    if(do_no != ''){
        $.ajax({
            type: "post",
            url: "/api/doblock/checkDoNo",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
                'do_no':do_no,
            },
            success: function (data) {
                if(data > 0){
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Do Is Blocked You Can Not Use This DO No.</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

}

$('#container_no').on('input',function(){
    const inputValue = $(this).val();
    if(inputValue.length == 11){
        var checkToken = localStorage.getItem('token');
        $.ajax({
            type: "post",
            url: "/api/gatein/getbycontainer",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: {
                'container_no': inputValue,
            },
            success: function(data) {
                $('#container_type').val(data.gateindata.container_type);
                $('#container_size').val(data.gateindata.container_size);
                $('#sub_type').val(data.gateindata.sub_type);
                $('#status_name').val(data.gateindata.status_name);
                $('#grade').val(data.gateindata.grade);
                $('#line_name').val(data.line_name);
                $('#repair_date').val(data.gateindata.repair_updatedat);
                $('#inward_date').val(data.gateindata.inward_date);
                $('#gate_in_id').val(data.gateindata.id)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
})

function getlinedata(id){
    var checkToken = localStorage.getItem('token');
        $.ajax({
            type: "post",
            url: "/api/line/getbyid",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: {
                'id': id,
            },
            success: function(data) {
                $('#line_name').val(data.name);
            },
            error: function(error) {
                console.log(error);
            }
        });
}


function getContainerData(id){
    var checkToken = localStorage.getItem('token');
        $.ajax({
            type: "post",
            url: "/api/gatein/getDataById",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: {
                'id': id,
            },
            success: function(data) {
                getlinedata(data.line_id)
                $('#container_no').val(data.container_no);
                $('#container_type').val(data.container_type);
                $('#container_size').val(data.container_size);
                $('#sub_type').val(data.sub_type);
                $('#status_name').val(data.status_name);
                $('#grade').val(data.grade);
                $('#repair_date').val(data.repair_updatedat);
                $('#inward_date').val(data.inward_date);

            },
            error: function(error) {
                console.log(error);
            }
        });
}

$('#do_no').on('input',function(){
    const inputValue = $(this).val();
    var checkToken = localStorage.getItem('token');
        $.ajax({
            type: "post",
            url: "/api/preadvice/getbydo",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: {
                'do_no': inputValue,
            },
            success: function(data) {
                $('#do_date').val(data.do_date);
                $('#pre_advice_id').val(data.id);
            },
            error: function(error) {
                console.log(error);
            }
        });
})

function getPreadviceData(id){
    var checkToken = localStorage.getItem('token');
        $.ajax({
            type: "post",
            url: "/api/preadvice/getbyid",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: {
                'id': id,
            },
            success: function(data) {
                $('#do_date').val(data.do_date);
                $('#do_no').val(data.do_no);
            },
            error: function(error) {
                console.log(error);
            }
        });
}

$(document).ready(function() {
    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');

    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    refreshTransporter()
    refreshConsignee()

    if(!getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/gatein/geVhicle",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'user_id': user_id,
            'depo_id': depo_id
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
    }
    
    if(getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/outward/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': getCateId[1],
        },
        success: function(data) {
            getContainerData(data.gate_in_id)
            getPreadviceData(data.pre_advice_id)
            $('#gate_in_id').val(data.gate_in_id);
            $('#pre_advice_id').val(data.pre_advice_id);
            $('#transport_id').val(data.transport_id).trigger('change');
            $('#vehicle_no').val(data.vehicle_no);
            $('#destination').val(data.destination);
            $('#seal_no').val(data.seal_no);
            $('#third_party').val(data.third_party);
            $('#port_name').val(data.port_name);
            $('#temprature').val(data.temprature);
            $('#vent_seal_no').val(data.vent_seal_no);
            $('#ventilation').val(data.ventilation);
            $('#humadity').val(data.humadity);
            $('#device_status').val(data.device_status);
            $('#amount').val(data.amount);
            $('#challan_no').val(data.challan_no);
            $('#driver_name').val(data.driver_name);
            $('#consignee_id').val(data.consignee_id).trigger('change');
            $('#licence_no').val(data.licence_no);
            $('#aadhar_no').val(data.aadhar_no);
            $('#pan_no').val(data.pan_no);
            $('#driver_contact').val(data.driver_contact);
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    
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


$('#outwardForm').on('submit', function(e) {
    event.preventDefault();
    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');

    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var gate_in_id = $('#gate_in_id').val();
    var pre_advice_id = $('#pre_advice_id').val();
    var transport_id = $('#transport_id').val();
    var vehicle_no = $('#vehicle_no').val();
    var destination = $('#destination').val();
    var seal_no = $('#seal_no').val();
    var third_party = $('#third_party').val();
    var port_name = $('#port_name').val();
    var temprature = $('#temprature').val();
    var vent_seal_no = $('#vent_seal_no').val();
    var ventilation = $('#ventilation').val();
    var humadity = $('#humadity').val();
    var device_status = $('#device_status').val();
    var amount = $('#amount').val();
    var challan_no = $('#challan_no').val();
    var driver_name = $('#driver_name').val();
    var consignee_id = $('#consignee_id').val();
    var licence_no = $('#licence_no').val();
    var aadhar_no = $('#aadhar_no').val();
    var pan_no = $('#pan_no').val();
    var driver_contact = $('#driver_contact').val();
    var formData = new FormData();

    

    if(gate_in_id != '' && pre_advice_id != '' && transport_id != '' && vehicle_no != '' && amount != '' && driver_name != '' && consignee_id != '' && driver_contact != ''){
        if(getCateId[1]){

            formData.append('gate_in_id',gate_in_id)
            formData.append('pre_advice_id',pre_advice_id)
            formData.append('transport_id',transport_id)
            formData.append('vehicle_no',vehicle_no)
            formData.append('destination',destination)
            formData.append('seal_no',seal_no)
            formData.append('third_party',third_party)
            formData.append('port_name',port_name)
            formData.append('temprature',temprature)
            formData.append('vent_seal_no',vent_seal_no)
            formData.append('ventilation',ventilation)
            formData.append('humadity',humadity)
            formData.append('device_status',device_status)
            formData.append('amount',amount)
            formData.append('challan_no',challan_no)
            formData.append('driver_name',driver_name)
            formData.append('consignee_id',consignee_id)
            formData.append('licence_no',licence_no)
            formData.append('aadhar_no',aadhar_no)
            formData.append('pan_no',pan_no)
            formData.append('user_id', user_id);
            formData.append('depo_id', depo_id);
            formData.append('driver_contact', driver_contact);
            formData.append('id', getCateId[1]);

            if ($('#do_copy')[0].files && $('#do_copy')[0].files.length > 0) {
                formData.append('do_copy', $('#do_copy')[0].files[0]);
            } else {
                formData.append('do_copy', '');
            }

            if ($('#challan_copy')[0].files && $('#challan_copy')[0].files.length > 0) {
                formData.append('challan_copy', $('#challan_copy')[0].files[0]);
            } else {
                formData.append('challan_copy', '');
            }
            
            if ($('#driver_copy')[0].files && $('#driver_copy')[0].files.length > 0) {
                formData.append('driver_copy', $('#driver_copy')[0].files[0]);
            } else {
                formData.append('driver_copy', '');
            }
            
            if ($('#licence_copy')[0].files && $('#licence_copy')[0].files.length > 0) {
                formData.append('licence_copy', $('#licence_copy')[0].files[0]);
            } else {
                formData.append('licence_copy', '');
            }
            
            if ($('#aadhar_copy')[0].files && $('#aadhar_copy')[0].files.length > 0) {
                formData.append('aadhar_copy', $('#aadhar_copy')[0].files[0]);
            } else {
                formData.append('aadhar_copy', '');
            }

            if ($('#pan_copy')[0].files && $('#pan_copy')[0].files.length > 0) {
                formData.append('pan_copy', $('#pan_copy')[0].files[0]);
            } else {
                formData.append('pan_copy', '');
            }

            $.ajax({
            url: '/api/outward/update',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var callout = document.createElement('div');
                callout.innerHTML =
                    `<div class="callout callout-success"><p style="font-size:13px;">${data.message}</p></div>`;
                document.getElementById('apiMessages').appendChild(callout);
                setTimeout(function() {
                    callout.remove();
                }, 2000);

                window.open(`/print/gatepass?id=${data.gatepassdata.id}`, '_blank');
                location.reload();
            },
            error: function(error) {
                var finalValue = '';
                if (Array.isArray(error.responseJSON.message)) {
                    finalValue = Object.values(error.responseJSON.message[0]).join(', ');
                } else {
                    finalValue = error.responseJSON.message;
                }
                var callout = document.createElement('div');
                callout.innerHTML =
                    `<div class="callout callout-danger"><p style="font-size:13px;">${finalValue}</p></div>`;
                document.getElementById('apiMessages').appendChild(callout);
                setTimeout(function() {
                    callout.remove();
                }, 2000);
            }
        });
        }else{

            formData.append('gate_in_id',gate_in_id)
            formData.append('pre_advice_id',pre_advice_id)
            formData.append('transport_id',transport_id)
            formData.append('vehicle_no',vehicle_no)
            formData.append('destination',destination)
            formData.append('seal_no',seal_no)
            formData.append('third_party',third_party)
            formData.append('port_name',port_name)
            formData.append('temprature',temprature)
            formData.append('vent_seal_no',vent_seal_no)
            formData.append('ventilation',ventilation)
            formData.append('humadity',humadity)
            formData.append('device_status',device_status)
            formData.append('amount',amount)
            formData.append('challan_no',challan_no)
            formData.append('driver_name',driver_name)
            formData.append('consignee_id',consignee_id)
            formData.append('licence_no',licence_no)
            formData.append('aadhar_no',aadhar_no)
            formData.append('pan_no',pan_no)
            formData.append('user_id', user_id);
            formData.append('depo_id', depo_id);
            formData.append('driver_contact', driver_contact);
            formData.append('id', getCateId[1]);

            if ($('#do_copy')[0].files && $('#do_copy')[0].files.length > 0) {
                formData.append('do_copy', $('#do_copy')[0].files[0]);
            } else {
                formData.append('do_copy', '');
            }

            if ($('#challan_copy')[0].files && $('#challan_copy')[0].files.length > 0) {
                formData.append('challan_copy', $('#challan_copy')[0].files[0]);
            } else {
                formData.append('challan_copy', '');
            }
            
            if ($('#driver_copy')[0].files && $('#driver_copy')[0].files.length > 0) {
                formData.append('driver_copy', $('#driver_copy')[0].files[0]);
            } else {
                formData.append('driver_copy', '');
            }
            
            if ($('#licence_copy')[0].files && $('#licence_copy')[0].files.length > 0) {
                formData.append('licence_copy', $('#licence_copy')[0].files[0]);
            } else {
                formData.append('licence_copy', '');
            }
            
            if ($('#aadhar_copy')[0].files && $('#aadhar_copy')[0].files.length > 0) {
                formData.append('aadhar_copy', $('#aadhar_copy')[0].files[0]);
            } else {
                formData.append('aadhar_copy', '');
            }

            if ($('#pan_copy')[0].files && $('#pan_copy')[0].files.length > 0) {
                formData.append('pan_copy', $('#pan_copy')[0].files[0]);
            } else {
                formData.append('pan_copy', '');
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
                    callout.innerHTML =
                        `<div class="callout callout-success"><p style="font-size:13px;">${data.message}</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);

                    window.open(`/print/gatepass?id=${data.gatepassdata.id}`, '_blank');
                    location.reload();
                },
                error: function(error) {
                    var finalValue = '';
                    if (Array.isArray(error.responseJSON.message)) {
                        finalValue = Object.values(error.responseJSON.message[0]).join(', ');
                    } else {
                        finalValue = error.responseJSON.message;
                    }
                    var callout = document.createElement('div');
                    callout.innerHTML =
                        `<div class="callout callout-danger"><p style="font-size:13px;">${finalValue}</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                }
            });
        }
    }

    
})



$(function() {
    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');
    var driver_copy = '';
    if(getCateId[1]){
        driver_copy = false;
    }else{
        driver_copy = true;
    }
    $('#outwardForm').validate({
        rules: {
            container_no:{
                required:true,
            },
            do_no:{
                required:true,
            },
            transport_id:{
                required:true,
            },
            vehicle_no:{
                required:true,
            },
            amount:{
                required:true,
            },
            driver_name:{
                required:true,
            },
            consignee_id:{
                required:true,
            },
            driver_contact:{
                required:true,
            },
            driver_copy:{
                required:driver_copy,
            }
        },
        messages: {
            container_no: {
                required: "Please Enter Container No",
            },
            do_no:{
                required:"Please Enter DO No",
            },
            transport_id:{
                required:"Please Select Transporter",
            },
            vehicle_no:{
                required:"Please Select Vehicle No.",
            },
            amount:{
                required:"Please Enter Amount",
            },
            driver_name:{
                required:"Please Enter Driver Name",
            },
            consignee_id:{
                required:"Please Select Consignee",
            },
            driver_contact:{
                required:"Please Enter Driver Contact",
            },
            driver_copy:{
                required:"Please Upload Driver Photo",
            }
        },

        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
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

<div class="modal fade" id="modal-camera">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <video id="webcamVideo" style="width:100%"></video>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="discardButton" class="btn btn-default ">Discard</button>
                <button type="button" id="confirmButton" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>




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