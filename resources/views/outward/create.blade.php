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
                                            <input type="text" class="form-control" id="do_no" name="do_no"
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
                                        <div class="form-group">
                                            <label for="driver_copy">Driver Photo</label>
                                            <input type="file" class="form-control" id="driver_copy" name="driver_copy"
                                                placeholder="Enter Container Number ">
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
                                            <label for="pan_no">Pan Number</label>
                                            <input type="text" class="form-control" id="pan_no" name="pan_no"
                                                placeholder="Enter Pan Number ">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pan_copy">Pan Photo</label>
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
                console.log(data);
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
                $('#do_date').val(data.date);
                $('#pre_advice_id').val(data.id);
            },
            error: function(error) {
                console.log(error);
            }
        });
})

$(document).ready(function() {

    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.ajax({
        type: "post",
        url: "/api/transport/getTransporter",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'user_id': user_id,
            'depo_id': depo_id
        },
        success: function(data) {
            var select = document.getElementById('transport_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                select.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "post",
        url: "/api/transport/getConsignee",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'user_id': user_id,
            'depo_id': depo_id
        },
        success: function(data) {
            var select_2 = document.getElementById('consignee_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                select_2.appendChild(option);
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

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
});

$('#outwardForm').on('submit', function(e) {
    event.preventDefault();
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
})



$(function() {


    $('#outwardForm').validate({
        rules: {
            // vehicle_number:{
            //     required:true,
            // }
        },
        messages: {
            vehicle_number: {
                required: "This Field Is Required",
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
</script>

@endsection