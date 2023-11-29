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
                    <h1 class="m-0">Pre Advice Entry</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Pre Advice Entry</li>
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
                                            <label for="date">Date</label>
                                            <input type="text" class="form-control" id="date" name="date" readonly value="<?= date('Y-m-d')?>" placeholder="Enter inward date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="time">Time</label>
                                            <input type="text" class="form-control" id="time" name="time" readonly value="<?= date('H:i:s')?>"  placeholder="Enter inward time">
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
                                            <label for="do_no">DO Number</label>
                                            <input type="text" class="form-control" style="text-transform:uppercase;" id="do_no" name="do_no"  placeholder="Enter DO Number">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="validity_period">Validity Period</label>
                                            <input type="text" class="form-control" id="validity_period" name="validity_period"  placeholder="Enter Validity Period">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="validity_date">Validity Date</label>
                                            <input type="date" class="form-control" id="validity_date" name="validity_date"  placeholder="Enter Validity Period">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shipper_name">Shipper Name</label>
                                            <input type="text" class="form-control" id="shipper_name" name="shipper_name"  placeholder="Enter Shipper Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pod">POD (Port Of Discharge)</label>
                                            <input type="text" class="form-control"  id="pod" name="pod"  placeholder="Enter Port Of Discharge">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vessel">Vessel Name</label>
                                            <input type="text" class="form-control" id="vessel" name="vessel"  placeholder="Enter Vessel Name">
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
                                            <label for="do_date">DO Date</label>
                                            <input type="date" class="form-control" id="do_date" name="do_date" placeholder="Enter Voyage">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
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
                                            <label for="container_type">Container Type</label>
                                            <select name="container_type" id="container_type" class="form-control">
                                                <option value="">Select Container Type</option>
                                                <option value="DRY">DRY</option>
                                                <option value="REEFER">REEFER</option>
                                            </select>
                                        </div>
                                    </div>
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="in_cargo">In Cargo</label>
                                            <input type="text" class="form-control" id="in_cargo" name="in_cargo"  placeholder="Enter In Cargo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="temprature_setting">Temprature Setting</label>
                                            <input type="text" class="form-control" id="temprature_setting" name="temprature_setting"  placeholder="Enter Temprature Setting">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="humadity_setting">Humadity Setting</label>
                                            <input type="text" class="form-control" id="humadity_setting" name="humadity_setting"  placeholder="Enter Humadity Setting">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ventilation_setting">Ventilation Setting</label>
                                            <input type="text" class="form-control" id="ventilation_setting" name="ventilation_setting"  placeholder="Enter Ventilation Setting">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="traxen_unit">Traxen Unit Details</label>
                                            <input type="text" class="form-control" id="traxen_unit" name="traxen_unit"  placeholder="Enter Traxen Unit Details">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_qty">Container Required Quantity</label>
                                            <input type="text" class="form-control" onfocusout="myFunction()" id="container_qty" name="container_qty"  placeholder="Enter Container Required Quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="remarks">Remarks</label>
                                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="submit-btn" class="btn btn-primary" disabled>Save and Print</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <ul id="conatinerList"></ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<script>

$(document).ready(function () {
    
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

});


function myFunction(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var container_required = $(this).val();

    var line_id = $('#line_id').val();
    // var shipper_name = $("#shipper_name").val();
    var vessel = $("#vessel").val();
    var voyage = $("#voyage").val();
    var container_size = $("#container_size").val();
    var container_type = $("#container_type").val();
    var sub_type = $("#sub_type").val();

    if(line_id == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Line Name</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

    if(vessel == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">vessel Is Required!</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

    if(voyage == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">voyage Is Required!</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }
    if(container_size == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Container Size</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }
    if(container_type == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Container Type</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }
    if(sub_type == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Sub Type</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

    if(line_id != '' && vessel!= '' && voyage != '' && container_size != '' && container_type != '' && sub_type != ''){
        $.ajax({
            type: "post",
            url: "/api/gatein/getPreAdviceContainer",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
                'line_id':line_id,
                'container_size':container_size,
                'container_type':container_type,
                'sub_type':sub_type,
                'vessel':vessel,
                'voyage':voyage,
            },
            success: function (data) {
                var count  = data.length;
                if(container_required == count){
                    data.forEach(function(item) {
                        $("#conatinerList").append(`${item.container_no}`);
                    });
                    $("#submit-btn").removeAttr("disabled");
                }else{
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Requirement Can Not Be Full Fill. Only ${count} Container is Available</p></div>`;
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


$(function () {
    
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {

        var date = $("#date").val();
        var time = $("#time").val();
        var line_id = $('#line_id').val();
        var do_no = $('#do_no').val();
        var validity_period = $("#validity_period").val();
        var validity_date = $("#validity_date").val();
        var shipper_name = $("#shipper_name").val();
        var pod = $("#pod").val();
        var vessel = $("#vessel").val();
        var voyage = $("#voyage").val();
        var do_date = $("#do_date").val();
        var container_size = $("#container_size").val();
        var container_type = $("#container_type").val();
        var sub_type = $("#sub_type").val();
        var container_qty = $("#container_qty").val();
        var remarks = $("#remarks").val();
        var in_cargo = $("#in_cargo").val();
        var temprature_setting = $("#temprature_setting").val();
        var humadity_setting = $("#humadity_setting").val();
        var ventilation_setting = $("#ventilation_setting").val();
        var traxen_unit = $("#traxen_unit").val();

        var data = {
            'date': date,
            'time': time,
            'line_id': line_id,
            'do_no': do_no,
            'validity_period': validity_period,
            'validity_date': validity_date,
            'shipper_name': shipper_name,
            'pod': pod,
            'vessel': vessel,
            'voyage': voyage,
            'do_date': do_date,
            'container_size': container_size,
            'container_type': container_type,
            'sub_type': sub_type,
            'container_qty': container_qty,
            'remarks': remarks,
            'in_cargo': in_cargo,
            'temprature_setting': temprature_setting,
            'humadity_setting': humadity_setting,
            'ventilation_setting': ventilation_setting,
            'traxen_unit': traxen_unit,
            'user_id': user_id,
            'depo_id': depo_id,
        }

        post('preadvice/create',data);
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