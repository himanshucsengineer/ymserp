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

.card-primary.card-outline {
    border-top: 3px solid #63bf84;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    color: #63bf84;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DMR Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">DMR Report</li>
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
                                        <option value="ALL">ALL</option>
                                        <option value="DRY">DRY</option>
                                        <option value="REEFER">REEFER</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mt-2" >
                                    <label for="">From</label>
                                    <input type="date" name="from" id="from" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-md-6 mt-2" >
                                    <label for="">To</label>
                                    <input type="date" name="to" id="to" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-md-4" >
                                    <label for="">Depo</label>
                                    <select multiple="" name="depos" id="depos" class="form-control">
                                        
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
                        <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                        aria-selected="true">IN MOVEMENT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-three-profile" role="tab"
                                        aria-controls="custom-tabs-three-profile" aria-selected="false">OUT MOVEMENT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-inventory-tab" data-toggle="pill"
                                        href="#custom-tabs-three-inventory" role="tab"
                                        aria-controls="custom-tabs-three-inventory" aria-selected="false">INVENTORY</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-home-tab">
                                    <table id="inmovmentData" class="table table-bordered table-hover table-responsive text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Container No.</th>
                                                <th>Size/Type</th>
                                                <th>In Date</th>
                                                <th>Consignee</th>
                                                <th>Transporter</th>
                                                <th>VehicalNo.</th>
                                                <th>In Source</th>
                                                <th>In Time</th>
                                                <th>Receipt No.</th>
                                                <th>Cash Amount</th>
                                                <th>Status</th>
                                                <th>Gross Weight</th>
                                                <th>Tare Weight</th>
                                                <th>Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody id="inmovement-table-body">
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-profile-tab">
                                    <table id="outmovementData" class="table table-bordered table-hover table-responsive text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Container No.</th>
                                                <th>Size/Type</th>
                                                <th>In Date</th>
                                                <th>Out Date Time </th>
                                                <th>Shipper</th>
                                                <th>Bkg/Do</th>
                                                <th>Destination</th>
                                                <th>Transporter</th>
                                                <th>Vehical No.</th>
                                                <th>Seal No.</th>
                                                <th>Remarks</th>
                                                <th>Vessel</th>
                                                <th>Voyage</th>
                                                <th>POD</th>
                                            </tr>
                                        </thead>
                                        <tbody id="outmovement-table-body">
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-inventory" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-inventory-tab">
                                    <table id="inventoryData" class="table table-bordered table-hover table-responsive text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Container No.</th>
                                                <th>Size</th>
                                                <th>Type</th>
                                                <th>In Date</th>
                                                <th>Transporter</th>
                                                <th>Vehical No.</th>
                                                <th>Status</th>
                                                <th>Consignee</th>
                                                <th>Remarks</th>
                                                <th>Days</th>
                                            </tr>
                                        </thead>
                                        <tbody id="inventory-table-body">
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

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

        $.ajax({
            type: "post",
            url: "/api/depo/get",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
            },
            success: function (data) {
                $('#depos').empty();
                var select = document.getElementById('depos');
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

function genrateReport(){
    var checkToken = localStorage.getItem('token');

    var line_name = $('#lines').val();
    var depo_id = $('#depos').val();
    var from = $('#from').val();
    var to = $('#to').val();
    var report_type = $('#report_type').val();

    if(line_name == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Line</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    if(depo_id == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Depot</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    if(from == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Choose Start Date</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }
    if(to == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Choose End Date</p></div>`;
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


    if(from != '' && to != '' && line_name != '' && report_type != '' && depo_id != ''){
        $.ajax({
            type: "post",
            url: "/api/report/getDmrReport",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'line_name':line_name,
                'to':to,
                'from':from,
                'depo_id':depo_id,
                'report_type':report_type
            },
            success: function (response) {

                $('#inmovement-table-body').empty();
                $('#outmovement-table-body').empty();
                $('#inventory-table-body').empty();

                var outmovement_table_body = $('#outmovement-table-body');
                var outmovment =1;
                response.out_movment.forEach(function(item) {
                    var sizeType = item.container_size + ' / ' + item.sub_type;
                    var row = $('<tr>');
                    row.append($('<td>').text(outmovment));
                    row.append($('<td>').append(item.container_no));
                    row.append($('<td>').append(sizeType));
                    row.append($('<td>').append(item.inward_date));
                    row.append($('<td>').append(item.out_date_time));
                    row.append($('<td>').append(item.shipper_name));
                    row.append($('<td>').append(item.do_no));
                    row.append($('<td>').append(item.destination));
                    row.append($('<td>').append(item.transporter_name));
                    row.append($('<td>').append(item.vhicle_no));
                    row.append($('<td>').append(item.seal_no));
                    row.append($('<td>').append(item.remarks));
                    row.append($('<td>').append(item.vessel));
                    row.append($('<td>').append(item.voyage));
                    row.append($('<td>').append(item.pod));

                    outmovement_table_body.append(row);
                    outmovment++;
                });



                var inmovement_table_body = $('#inmovement-table-body');
                var inmovment =1;
                response.in_movment.forEach(function(item) {
                    var sizeType = item.container_size + ' / ' + item.sub_type;
                    var row = $('<tr>');
                    row.append($('<td>').text(inmovment));
                    row.append($('<td>').append(item.container_no));
                    row.append($('<td>').append(sizeType));
                    row.append($('<td>').append(item.inward_date));
                    row.append($('<td>').append(item.consignee_name));
                    row.append($('<td>').append(item.transporter_name));
                    row.append($('<td>').append(item.vehicle_number));
                    row.append($('<td>').append(item.arrive_from));
                    row.append($('<td>').append(item.inward_time));
                    row.append($('<td>').append(item.receipt_no));
                    row.append($('<td>').append(item.amount));
                    row.append($('<td>').append(item.status_name));
                    row.append($('<td>').append(item.gross_weight));
                    row.append($('<td>').append(item.tare_weight));
                    row.append($('<td>').append(item.remarks));

                    inmovement_table_body.append(row);
                    inmovment++;
                });

                var inventory_table_body = $('#inventory-table-body');
                var inventory =1;
                response.inventory.forEach(function(item) {
                    var row = $('<tr>');
                    row.append($('<td>').text(inventory));
                    row.append($('<td>').append(item.container_no));
                    row.append($('<td>').append(item.container_size));
                    row.append($('<td>').append(item.sub_type));
                    row.append($('<td>').append(item.inward_date));
                    row.append($('<td>').append(item.transporter_name));
                    row.append($('<td>').append(item.vehicle_number));
                    row.append($('<td>').append(item.status_name));
                    row.append($('<td>').append(item.consignee_name));
                    row.append($('<td>').append(item.remarks));
                    row.append($('<td>').append(item.no_of_day));
                    inventory_table_body.append(row);
                    inventory++;
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