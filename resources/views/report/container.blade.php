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
                                    <div class="form-group">
                                        <label>Container Size <span style="color:red;">*</span></label>
                                        <select class="form-control" id="containerSize" name="containerSize" >
                                        <option value="">Select Container Size</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Container Type <span style="color:red;">*</span></label>
                                        <select class="form-control" id="containerType" name="containerType">
                                        <option value="">Select Container Type</option>
                                        <option value="DRY">DRY</option>
                                        <option value="REEFER">REEFER</option>
                                        </select>
                                    </div>
                                </div>
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
                            <button class="btn btn-primary" onclick="genrateInvoice()">Genrate Invoice</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content" id="genrateInvoice" style="display:none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="padding:1rem .5rem;">
                            <div class="top_flex">
                                <div class="col_1"></div>
                                <div class="col_2">INVOICE SUMMARY : Toatl Containers - 0</div>
                                <div class="col_3"></div>
                                <div class="col_4">Invoice No. : MUM/1/23-24</div>
                                <div class="col_5">Invoice Date : 17/11/2023</div>
                                <div class="col_6"></div>
                                <div class="col_7"></div>
                                <div class="col_8"></div>
                            </div>

                            <button class="btn btn-primary" onclick="saveInvoice()">Save and Print Invoice</button>
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
        type: "get",
        url: "/api/depo/getall",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
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

    $.ajax({
        type: "get",
        url: "/api/line/getall",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('lines');
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
        type: "get",
        url: "/api/transport/getall",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('party');
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



function genrateInvoice(){
    var third_party = $('#third_party').val();
    var container_no = $('#container_no').val();
    var depos = $('#depos').val();
    var lines = $('#lines').val();
    var party = $('#party').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var invoice_type = $('#invoice_type').val();

    if(third_party == "yes"){
        if(container_no == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Container No</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        if(start_date == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Start Date</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }

        if(end_date == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select End Date</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        if(invoice_type == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Invoice Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        if(container_no != '' && start_date != '' && end_date != '' && invoice_type != ''){
            $('#genrateInvoice').show();
        }
    }else{
        if(depos == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Depo</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }

        if(lines == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Line</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }

        if(party == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Party</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        if(start_date == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Start Date</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }

        if(end_date == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select End Date</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        if(invoice_type == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Invoice Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        $('#genrateInvoice').show();
    }

}

function saveInvoice(){
    var third_party = $('#third_party').val();
    var container_no = $('#container_no').val();
    var depos = $('#depos').val();
    var lines = $('#lines').val();
    var party = $('#party').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var invoice_type = $('#invoice_type').val();

    if(third_party == "yes"){
        location.href= `/print/thirdparty?gatein=${container_no}&from=${start_date}&to=${end_date}&type=${invoice_type}`
    }else{
        location.href= "/print/line"
    }
    
}

  
</script>

@endsection