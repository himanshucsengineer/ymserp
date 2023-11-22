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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="do_no">D.O. Number</label>
                                            <input type="text"   class="form-control"    id="do_no" name="do_no" placeholder="Enter D.O. Number ">
                                        </div>
                                        <div class="form-group">
                                            <label for="do_copy">D.O. Photo</label>
                                            <input type="file"   class="form-control"    id="do_copy" name="do_copy" placeholder="Enter Container Number ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="challan_no">Challan Number</label>
                                            <input type="text" class="form-control"    id="challan_no" name="challan_no" placeholder="Enter Challan Number ">
                                        </div>
                                        <div class="form-group">
                                            <label for="challan_copy">Challan Photo</label>
                                            <input type="file"   class="form-control"    id="challan_copy" name="challan_copy" placeholder="Enter Container Number ">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="line_id">Line Name</label>
                                            <select name="line_id" id="line_id" class="form-control">
                                                <option value="">Select Line</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transport_id">Transporters</label>
                                            <select name="transport_id" id="transport_id" class="form-control">
                                                <option value="">Select Transporters</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="container_type">Container Type</label>
                                            <select class="form-control" id="container_type" name="container_type">
                                                <option value="">Select Container Type</option>
                                                <option value="DRY">DRY</option>
                                                <option value="REEFER">REEFER</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="sub_type">Sub Type</label>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="container_size">Container Size</label>
                                            <select class="form-control" id="container_size" name="container_size" >
                                                <option value="">Select Container Size</option>
                                                <option value="20">20</option>
                                                <option value="40">40</option>
                                                <option value="45">45</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                </div>
                                <div class="row">
                                    
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driver_name">Driver Name</label>
                                            <input type="text"  class="form-control"    id="driver_name" name="driver_name" placeholder="Enter Driver Name ">
                                        </div>
                                    </div>
                                    
                                </div>

                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driver_copy">Driver Photo</label>
                                            <input type="file"   class="form-control"    id="driver_copy" name="driver_copy" placeholder="Enter Container Number ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="vehicle_no">Vehicle Number</label>
                                            <input type="text" style="text-transform:uppercase;"  class="form-control"    id="vehicle_no" name="vehicle_no" placeholder="Enter Vehicle Number ">
                                        </div>
                                    </div>
                                </div>
                                
                                

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_no">Container Number</label>
                                            <select name="container_no" id="container_no" class="form-control">
                                                <option value="">Please Select Container No.</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    </div>
                                   
                                </div>
                                <button type="submit" class="btn btn-primary">Print Out_Receipt</button>

                                </form>

                                <hr>

                                <form id="gatePassForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="receipt_no">Select Receipt No.</label>
                                                <select name="receipt_no" id="receipt_no" class="form-control">
                                                    <option value="">Select Receipt No.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="consignee_id">Consignee</label>
                                                <select name="consignee_id" id="consignee_id" class="form-control">
                                                    <option value="">Select Consignee</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shippers">Shippers</label>
                                                <input type="text"   class="form-control"    id="shippers" name="shippers" placeholder="Enter shippers ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="licence_no">Licence Number</label>
                                                <input type="text" class="form-control"    id="licence_no" name="licence_no" placeholder="Enter Licence Number ">
                                            </div>
                                            <div class="form-group">
                                                <label for="licence_copy">Licence Photo</label>
                                                <input type="file"   class="form-control"    id="licence_copy" name="licence_copy" placeholder="Enter Container Number ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="aadhar_no">Aadhar Number</label>
                                                <input type="text" class="form-control"    id="aadhar_no" name="aadhar_no" placeholder="Enter Aadhar Number ">
                                            </div>
                                            <div class="form-group">
                                                <label for="aadhar_copy">Aadhar Photo</label>
                                                <input type="file"   class="form-control"    id="aadhar_copy" name="aadhar_copy" placeholder="Enter Container Number ">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pan_no">Pan Number</label>
                                                <input type="text" class="form-control"    id="pan_no" name="pan_no" placeholder="Enter Pan Number ">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pan_copy">Pan Photo</label>
                                                <input type="file"   class="form-control"    id="pan_copy" name="pan_copy" placeholder="Enter Container Number ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="line_id_2">Line Name</label>
                                                <select name="line_id_2" id="line_id_2" class="form-control">
                                                    <option value="">Select Line</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="seal_no">Seal Number</label>
                                                <input type="text" class="form-control"    id="seal_no" name="seal_no" placeholder="Enter Seal Number ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Print Gate Pass</button>
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

            var select_2 = document.getElementById('consignee_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                select_2.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

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

            var select_2 = document.getElementById('line_id_2');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.name;
                select_2.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    $.ajax({
        type: "post",
        url: "/api/outward/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            var select = document.getElementById('receipt_no');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.id;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });


});

$('#status_name').on('change',function(){
    var line_id = $('#line_id').val();
    var container_type = $('#container_type').val();
    var sub_type = $('#sub_type').val();
    var container_size = $('#container_size').val();
    var grade = $('#grade').val();
    var status_name = $(this).val();
    
    if(line_id == ''){
        
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Line</p></div>`;
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

    if(container_size == ''){
        
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select container Size</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

    if(grade == ''){
        
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Grade</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

    if(status_name == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Valid Status</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

    if(status_name != '' && grade != '' && container_size != '' && sub_type != '' && container_type != '' && line_id != ''){
       
        var checkToken = localStorage.getItem('token');
        var user_id = localStorage.getItem('user_id');
        var depo_id = localStorage.getItem('depo_id');

        $.ajax({
            type: "post",
            url: "/api/gatein/getContainerList",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
                'status_name' :status_name,
                'grade' :grade,
                'container_size' :container_size,
                'sub_type' :sub_type,
                'container_type' :container_type,
                'line_id' :line_id,
            },
            success: function (data) {
                var select = document.getElementById('container_no');
                data.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item.container_no;
                    option.text = item.container_no;
                    select.appendChild(option);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

})

 


$('#gatePassForm').on('submit',function(e){
    event.preventDefault();

    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var receipt_no = $('#receipt_no').val();
    var consignee_id = $('#consignee_id').val();
    var shippers = $('#shippers').val();
    var licence_no = $('#licence_no').val();
    var aadhar_no = $('#aadhar_no').val();
    var pan_no = $('#pan_no').val();
    var line_id_2 = $('#line_id_2').val();
    var seal_no = $('#seal_no').val();

    if(receipt_no == ''){
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Receipt No</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }

    var formData = new FormData();

        formData.append('receipt_no', receipt_no);
        formData.append('consignee_id', consignee_id);
        formData.append('shippers', shippers);
        formData.append('licence_no', licence_no);
        formData.append('aadhar_no', aadhar_no);
        formData.append('pan_no', pan_no);
        formData.append('line_id_2', line_id_2);
        formData.append('seal_no', seal_no);
        formData.append('user_id', user_id);
        formData.append('depo_id', depo_id);

        if ($('#licence_copy')[0].files && $('#licence_copy')[0].files.length > 0) {
            formData.append('licence_copy', $('#licence_copy')[0].files[0]);
        }else{
            formData.append('licence_copy', '');
        }

        if ($('#aadhar_copy')[0].files && $('#aadhar_copy')[0].files.length > 0) {
            formData.append('aadhar_copy', $('#aadhar_copy')[0].files[0]);
        }else{
            formData.append('aadhar_copy', '');
        }

        if ($('#pan_copy')[0].files && $('#pan_copy')[0].files.length > 0) {
            formData.append('pan_copy', $('#pan_copy')[0].files[0]);
        }else{
            formData.append('pan_copy', '');
        }


        $.ajax({
                url: '/api/outward/genrateGatePass',
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

                    window.open(`/print/gatepass?id=${receipt_no}`, '_blank');
                    location.reload();
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



$('#outwardForm').on('submit',function(e){
    event.preventDefault();
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

        var do_no = $('#do_no').val();
        var challan_no =  $('#challan_no').val();
        var line_id =  $('#line_id').val();
        var transport_id =  $('#transport_id').val();
        var container_type =  $('#container_type').val();
        var container_size =  $('#container_size').val();
        var sub_type =  $('#sub_type').val();
        var grade =  $('#grade').val();
        var status_name =  $('#status_name').val();
        var driver_name =  $('#driver_name').val();
        var vehicle_no =  $('#vehicle_no').val();
        var container_no =  $('#container_no').val();



        var formData = new FormData();

        formData.append('do_no', do_no);
        formData.append('challan_no', challan_no);
        formData.append('line_id', line_id);
        formData.append('transport_id', transport_id);
        formData.append('container_type', container_type);
        formData.append('container_size', container_size);
        formData.append('sub_type', sub_type);
        formData.append('grade', grade);
        formData.append('status_name', status_name);
        formData.append('driver_name', driver_name);
        formData.append('vehicle_no', vehicle_no);
        formData.append('container_no', container_no);
        formData.append('user_id', user_id);
        formData.append('depo_id', depo_id);



        if ($('#do_copy')[0].files && $('#do_copy')[0].files.length > 0) {
            formData.append('do_copy', $('#do_copy')[0].files[0]);
        }else{
            formData.append('do_copy', '');
        }

        if ($('#challan_copy')[0].files && $('#challan_copy')[0].files.length > 0) {
            formData.append('challan_copy', $('#challan_copy')[0].files[0]);
        }else{
            formData.append('challan_copy', '');
        }

        if ($('#driver_copy')[0].files && $('#driver_copy')[0].files.length > 0) {
            formData.append('driver_copy', $('#driver_copy')[0].files[0]);
        }else{
            formData.append('driver_copy', '');
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

                    window.open(`/print/outward?id=${data.data.id}`, '_blank');
                    location.reload();
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