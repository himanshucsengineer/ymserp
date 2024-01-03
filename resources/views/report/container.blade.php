@extends('common.layout')

@section('content')
<style>
.eye{
    cursor: pointer;
}
.unactive{
    border:none;
    outline:none;
}
.top_flex{
    width:100%;
    height:auto;
    display:flex;
    text-align:center;
}
.top_flex .col_1{
    width:5%;
    border:1px solid #cdcdcd;
}
.top_flex .col_2{
    width:33%;
    border:1px solid #cdcdcd;
    padding:.5rem 0;
    font-weight:800;
}
.top_flex .col_3{
    width:8%;
    border:1px solid #cdcdcd;

}
.top_flex .col_4{
    width:14%;
    border:1px solid #cdcdcd;

}
.top_flex .col_5{
    width:14%;
    border:1px solid #cdcdcd;

}
.top_flex .col_6{
    width:8%;
    border:1px solid #cdcdcd;

}
.top_flex .col_7{
    width:8%;
    border:1px solid #cdcdcd;

}
.top_flex .col_8{
    width:10%;
    border:1px solid #cdcdcd;
}

.eye{
    cursor: pointer;
}
#pagination{
    /* width:100%; */
    margin-top:1rem;
    float:right;
}
.pagination-btn{
    border:1px solid #cdcdcd;
    outline:none;
    background:white;
    color:#000;
    padding:.3rem .7rem;
}
.active-btn{
    background:#63bf84;
    color:white;
}
#search{
    float: right;
    padding: 0.5rem 1rem;
    outline: none;
    border: 1px solid #cdcdcd;
    border-radius: 4px;
    margin-bottom: 1rem;
    margin-top:1.7rem;
}
.flex_date_range{
    width:100%;
    height:auto;
    display:flex;
    margin-bottom:1rem;
}
.flex_date_range .left{
    width:50%;
}
.flex_date_range .right{
    width:50%;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Container Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Container Report</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-4">
                                <div class="col-md-6" >
                                    <label for="">Line</label>
                                    <select name="lines" id="lines" class="form-control">
                                        <option value="">Select Line</option>
                                    </select>
                                </div>
                                <div class="col-md-6" >
                                    <label for="">Report Type</label>
                                    <select name="report_type" id="report_type" class="form-control">
                                        <option value="">Select Report Type</option>
                                        <option value="available">Available</option>
                                        <option value="pending">Pending</option>
                                        <option value="done_repair">Repair Done</option>
                                        <option value="pending_repair">Repair Pending</option>
                                        <option value="pending_survey">Survey Pending</option>
                                        <option value="done_survey">Survey Done</option>
                                    </select>
                                </div>
                                
                            </div>
                            <button class="btn btn-primary" onclick="genrateReport()">Genrate Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content" id="container_report" style="display:none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                
                    <div class="card">
                        <div class="card-body">
    
                            <table id="inspectionData" class="table table-bordered table-hover table-responsive text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Container No.</th>
                                        <th>Container Image</th>
                                        <th>Vehicle No.</th>
                                        <th>Vehicle image</th>
                                        <th>Inward Date</th>
                                        <th>Inward Time</th>
                                        <th>Surveyor Date</th>
                                        <th>Surveyor Time</th>
                                        <th>Container Type</th>
                                        <th>Container Size</th>
                                        <th>Sub Type</th>
                                        <th>Gross Weight</th>
                                        <th>Tare Weight</th>
                                        <th>Mfg Date</th>
                                        <th>Csc Details</th>
                                        <th>Line</th>
                                        <th>Grade</th>
                                        <th>Status Name</th>
                                        <th>RF Type</th>
                                        <th>Make</th>
                                        <th>Model No.</th>
                                        <th>Serial No.</th>
                                        <th>Machine Mfg. Date</th>
                                        <th>Device Status</th>
                                        <th>Third Party</th>
                                        <th>Consignee</th>
                                        <th>Transaction Mode</th>
                                        <th>Transaction Ref. No.</th>
                                        <th>Transporter</th>
                                        <th>Driver Name</th>
                                        <th>Contact No.</th>
                                        <th>Vessel Name</th>
                                        <th>Voyage</th>
                                        <th>Port Name</th>
                                        <th>Er No.</th>
                                        <th>Empty Latter</th>
                                        <th>Challan</th>
                                        <th>Empty Repositioning</th>
                                        <th>Return</th>
                                        <th>Tracking Device</th>
                                        <th>Remark</th>
                                        <th>Inward No.</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                   
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6"><div id="pagination"></div></div>
                            </div>
                            
                        </div>
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
            url: "/api/line/getbyname",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
            },
            success: function (data) {
                $('#lines').empty();
                var select = document.getElementById('lines');
                data.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item.name;
                    option.text = item.name;
                    select.appendChild(option);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
});
function genrateReport(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var line_name = $('#lines').val();
    var report_type = $('#report_type').val();

    if(line_name == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Line</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    if(report_type == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Report Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }


    if( line_name != '' && report_type != ''){
        $.ajax({
            type: "post",
            url: "/api/gatein/getContainerReport",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
                'line_name':line_name,
                'report_type':report_type
            },
            success: function (response) {
                $('#table-body').empty();

                var tbody = $('#table-body');
                var i =1;
                response.data.forEach(function(item) {
                    var container_img = '';
                    if(item.container_img){
                        container_img = $('<a>').attr({'href':'/uploads/gatein/'+item.container_img, 'target':'_blank'}).text("View Image");
                    }else{
                        container_img = "No Image Available";
                    }
                    var vehicle_img = '';
                    if(item.vehicle_img){
                        vehicle_img = $('<a>').attr({'href':'/uploads/gatein/'+item.vehicle_img, 'target':'_blank'}).text("View Image");
                    }else{
                        vehicle_img = "No Image Available";
                    }

                    var challan = '';
                    if(item.challan){
                        challan = $('<a>').attr({'href':'/uploads/gatein/'+item.challan, 'target':'_blank'}).text("View Image");
                    }else{
                        challan = "No Image Available";
                    }

                    var empty_latter = '';
                    if(item.empty_latter){
                        empty_latter = $('<a>').attr({'href':'/uploads/gatein/'+item.empty_latter, 'target':'_blank'}).text("View Image");
                    }else{
                        empty_latter = "No Image Available";
                    }

                    var row = $('<tr>');
                    row.append($('<td>').text(i));
                   

                    row.append($('<td  style="text-transform:uppercase;">').append(item.container_no));
                    row.append($('<td>').append(container_img));
                    row.append($('<td  style="text-transform:uppercase;">').append(item.vehicle_number));
                    row.append($('<td>').append(vehicle_img));
                    row.append($('<td>').append(item.inward_date));
                    row.append($('<td>').append(item.inward_time));
                    row.append($('<td>').append(item.survayor_date));
                    row.append($('<td>').append(item.survayor_time));
                    row.append($('<td>').append(item.container_size));
                    row.append($('<td>').append(item.container_type));
                    
                    row.append($('<td>').append(item.sub_type));
                    row.append($('<td>').append(item.gross_weight));
                    row.append($('<td>').append(item.tare_weight));
                    row.append($('<td>').append(item.mfg_date));
                    row.append($('<td>').append(item.csc_details));

                    row.append($('<td>').append(item.line_name));
                    row.append($('<td>').append(item.grade));
                    row.append($('<td>').append(item.status_name));
                    row.append($('<td>').append(item.rftype));
                    row.append($('<td>').append(item.make));
                    row.append($('<td>').append(item.model_no));
                    row.append($('<td>').append(item.serial_no));
                    row.append($('<td>').append(item.machine_mfg_date));
                    row.append($('<td>').append(item.device_status));
                    row.append($('<td>').append(item.third_party));
                    row.append($('<td>').append(item.consinee_name));
                    row.append($('<td>').append(item.transaction_mode));
                    row.append($('<td>').append(item.transaction_ref_no));
                    row.append($('<td>').append(item.transporter_name));
                    row.append($('<td>').append(item.driver_name));
                    row.append($('<td>').append(item.contact_number));
                    row.append($('<td>').append(item.vessel_name));
                    row.append($('<td>').append(item.voyage));
                    row.append($('<td>').append(item.port_name));
                    row.append($('<td>').append(item.er_no));
                    row.append($('<td>').append(empty_latter));
                    row.append($('<td>').append(challan));
                    row.append($('<td>').append(item.empty_repositioning));
                    row.append($('<td>').append(item.return));
                    row.append($('<td>').append(item.tracking_device));
                    row.append($('<td>').append(item.remarks));
                    row.append($('<td>').append(item.inward_no));

                    tbody.append(row);
                    i++;
                });
                $('#container_report').show();
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

}
</script>

@endsection