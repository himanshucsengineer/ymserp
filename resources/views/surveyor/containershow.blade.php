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
                                <div class="form-group">
                                    <label for="container_no">Container Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="container_no" name="container_no" placeholder="Enter Container Number ">
                                </div>
                                <div class="form-group">
                                    <label for="container_size">Container Size <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="container_size" name="container_size" placeholder="Enter Container Number ">
                                </div>

                                <div class="form-group">
                                    <label for="container_type">Container Type <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="container_type" name="container_type" placeholder="Enter Container Number ">
                                </div>
                                <div class="form-group">
                                    <label for="transport_id">Transport <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="transport_id" name="transport_id" placeholder="Enter Container Number ">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="inward_date">Inward Date <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="inward_date" name="inward_date" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inward_time">Inward Time  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="inward_time" name="inward_time" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="driver_name">Driver Name  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="driver_name" name="driver_name" readonly placeholder="Enter Driver Name">
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_number">Vehicle Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" readonly placeholder="Enter Vehicle Number">
                                </div>

                                <div class="form-group">
                                    <label for="contact_number">Contact Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" readonly placeholder="Enter Contact Number">
                                </div>
                                <div class="form-group">
                                    <label for="third_party">Third Party <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="third_party" name="third_party" readonly placeholder="Enter Contact Number">
                                </div>

                                <div class="form-group">
                                    <label for="line_id">Line Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="line_id" name="line_id" placeholder="Enter Container Number ">

                                </div>
                                <div class="form-group">
                                    <label for="arrive_from">Arrive From <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="arrive_from" name="arrive_from" readonly placeholder="Enter Contact Number">
                                </div>

                                <div class="form-group">
                                    <label for="port_name">Port Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="port_name" name="port_name" readonly placeholder="Enter Contact Number">
                                </div>

                                <div class="form-group">
                                    <label for="driver_photo">Driver Photo <span style="color:red;">*</span></label></br>
                                    <img src="" alt="" id="driver_photo" width="150">
                                </div>

                                <div class="form-group">
                                    <label for="challan">Challan <span style="color:red;">*</span></label></br>
                                    <img src="" alt="" id="challan" width="150">
                                </div>

                                <div class="form-group">
                                    <label for="driver_license">Driver License <span style="color:red;">*</span></label></br>
                                    <img src="" alt="" id="driver_license" width="150">
                                     
                                </div>

                                <div class="form-group">
                                    <label for="do_copy">D.O. Copy <span style="color:red;">*</span></label></br>
                                    <img src="" alt="" id="do_copy" width="150">

                                </div>

                                <div class="form-group">
                                    <label for="aadhar">Aadhar Card <span style="color:red;">*</span></label></br>
                                    <img src="" alt="" id="aadhar" width="150">
                                
                                </div>

                                <div class="form-group">
                                    <label for="pan">PAN Card <span style="color:red;">*</span></label></br>
                                    <img src="" alt="" id="pan" width="150">
                                
                                </div>
                                </hr>
                                <div class="form-group">
                                    <label for="status_name">Status Name <span style="color:red;">*</span></label>
                                    <select class="form-control" name="status_name" id="status_name">
                                        <option value="">Select an option</option>
                                        <option value=" DIRECT A/V "> DIRECT A/V </option>
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

                                <div class="form-group">
                                    <label for="job_work_no">Job Work No <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="job_work_no" name="job_work_no" placeholder="Enter Job Work No">
                                </div>

                                <div class="form-group">
                                    <label for="gross_weight">Gross Weight <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gross_weight" name="gross_weight" placeholder="Enter Gross Weight">
                                </div>

                                <div class="form-group">
                                    <label for="tare_weight">Tare Weight <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="tare_weight" name="tare_weight" placeholder="Enter Tare Weight">
                                </div>

                                <div class="form-group">
                                    <label for="vessel_name">Vessel Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="vessel_name" name="vessel_name"  placeholder="Enter Vessel Name">
                                </div>

                                <div class="form-group">
                                    <label for="grade">Grade <span style="color:red;">*</span></label>
                                    <select name="grade" id="grade" class="form-control">
                                        <option value="">Select Grade</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sub_lease_unity">Sub-Lease Unity <span style="color:red;">*</span></label>
                                    <select name="sub_lease_unity" id="sub_lease_unity" class="form-control">
                                        <option value="">select an option</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="voyage">Voyage <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="voyage" name="voyage" placeholder="Enter Voyage">
                                </div>

                                <div class="form-group">
                                    <label for="consignee">Consignee / Tranport <span style="color:red;">*</span></label>
                                    <select name="consignee" id="consignee" class="form-control">
                                        <option value="">please Select An Option</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="region">Region <span style="color:red;">*</span></label>
                                    <select name="region" id="region" class="form-control">
                                        <option value="">Select Region</option>
                                        <option value="DOMESTIC">DOMESTIC</option>
                                        <option value="INTERNATIONAL">INTERNATIONAL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="destuffung">Destuffung <span style="color:red;">*</span></label>
                                    <select name="destuffung" id="destuffung" class="form-control">
                                        <option value="">Select destuffung</option>
                                        <option value="FD">FD</option>
                                        <option value="OD">OD</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="rftype">RF Type <span style="color:red;">*</span></label>
                                    <select class="form-control" name="rftype" id="rftype">
                                        <option value="">select an option</option>
                                        <option value="HUMANITY-NO">HUMANITY-NO</option>
                                        <option value="HUMANITY-YES">HUMANITY-YES</option>
                                        <option value="HUMANITY-NO">HUMANITY-NO</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="empty_repositioning">Empty Repositioning <span style="color:red;">*</span></label>
                                    <select name="empty_repositioning" id="empty_repositioning" class="form-control">
                                        <option value="">Select Empty Repositioning</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="er_no">ER Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="er_no" name="er_no"  placeholder="Enter ER Number">
                                </div>

                                <div class="form-group">
                                    <label for="remarks">Remarks <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
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
            getline(data.line_id);
            getTranport(data.transport_id);
            $("#container_no").val(data.container_no)
            $("#container_type").val(data.container_type)
            $("#container_size").val(data.container_size)
            $("#inward_date").val(data.inward_date)
            $("#inward_time").val(data.inward_time)
            $("#driver_name").val(data.driver_name)
            $("#vehicle_number").val(data.vehicle_number)
            $("#contact_number").val(data.contact_number)
            $("#third_party").val(data.third_party)
            $("#arrive_from").val(data.arrive_from)
            $("#port_name").val(data.port_name)
            $('#driver_photo').attr('src',`/uploads/gatein/${data.driver_photo}`)
            $('#challan').attr('src',`/uploads/gatein/${data.challan}`)
            $('#driver_license').attr('src',`/uploads/gatein/${data.driver_license}`)
            $('#do_copy').attr('src',`/uploads/gatein/${data.do_copy}`)
            $('#aadhar').attr('src',`/uploads/gatein/${data.aadhar}`)
            $('#pan').attr('src',`/uploads/gatein/${data.pan}`)
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "get",
        url: "/api/transport/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('consignee');
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
            console.log(data);
            $("#line_id").val(data.name);
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
            console.log(data);
            $("#transport_id").val(data.name);
            getverifydata();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getverifydata(){
    var containerid = <?= $getid[1]?>;
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
        },
        error: function (error) {
            console.log(error);
        }
    });
}



$(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var containerid = <?= $getid[1]?>;
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

        data = {
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
        post('containerverify/create',data)
        window.location = `/surveyor/masterserveyor?id=${containerid}`

    }
  });

    $('#gateinForm').validate({
    rules: {
        job_work_no: {
            required: true,
        },
        status_name: {
            required: true,
        },
        gross_weight: {
            required: true,
        },
        tare_weight: {
            required: true,
        },
        vessel_name: {
            required: true,
        },
        grade: {
            required: true,
        },
        sub_lease_unity: {
            required: true,
        },
        voyage: {
            required: true,
        },
        consignee: {
            required: true,
        },
        region: {
            required: true,
        },
        destuffung: {
            required: true,
        },
        rftype: {
            required: true,
        },

        empty_repositioning: {
            required: true,
        },
        er_no: {
            required: true,
        },
        remarks: {
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