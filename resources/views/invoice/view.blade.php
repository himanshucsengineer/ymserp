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
                    <h1 class="m-0">Depot Billing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Depot Billing</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <a href="create"><button type="button" class="btn btn-block btn-outline-success">Add New</button></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="">Third Party</label>
                                    <select name="third_party" id="third_party" class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="container_div" style="display:none">
                                    <label for="">Container No</label>
                                    <select name="container_no" id="container_no" class="form-control">
                                        <option value="">Select Container</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="amount_div" style="display:none">
                                    <label for="">Amount</label>
                                    <input type="text" name="amount" id="amount" class="form-control">
                                    
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4" id="depo_div" style="display:none">
                                    <label for="">Select Depot</label>
                                    <select name="depos" id="depos" class="form-control">
                                        <option value="">Select Depot</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="line_div" style="display:none">
                                    <label for="">Select Line</label>
                                    <select name="lines" id="lines" class="form-control">
                                        <option value="">Select Line</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="party_div" style="display:none">
                                    <label for="">Select Party</label>
                                    <select name="party" id="party" class="form-control">
                                        <option value="">Select Party</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="">Invoice Type</label>
                                    <select name="invoice_type" id="invoice_type" class="form-control">
                                        <option value="">Select Invoice Type</option>
                                        <option value="repair">Repair</option>
                                        <option value="washing">Washing</option>
                                        <option value="lolo">LOLO</option>
                                        <option value="parking">Parking</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Payment Type</label>
                                    <select name="payment_type" id="payment_type" class="form-control">
                                        <option value="">Select Payment Type</option>
                                        <option value="cash">Cash</option>
                                        <option value="upi">Upi</option>
                                        <option value="netbanking">Netbanking</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" onclick="genrateInvoice()">Generate Invoice</button>
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

    $.ajax({
        type: "get",
        url: "/api/gatein/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var select = document.getElementById('container_no');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.container_no;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
});

$('#third_party').on('change',function(){
    var checkThirdParty = $(this).val();
    if(checkThirdParty == 'yes'){
        $('#container_div').show();
        $('#amount_div').show();
        $('#depo_div').hide();
        $('#line_div').hide();
        $('#party_div').hide();
    }else if(checkThirdParty == 'no'){
        $('#container_div').hide();
        $('#depo_div').show();
        $('#line_div').show();
        $('#party_div').show();
        $('#amount_div').hide();
    }else{
        $('#container_div').hide();
        $('#depo_div').hide();
        $('#line_div').hide();
        $('#party_div').hide();
        $('#amount_div').hide();
    }
})

function genrateInvoice(){
    var third_party = $('#third_party').val();
    var container_no = $('#container_no').val();
    var amount = $('#amount').val();
    var depos = $('#depos').val();
    var lines = $('#lines').val();
    var party = $('#party').val();
    var invoice_type = $('#invoice_type').val();
    var payment_type = $('#payment_type').val();
    if(third_party == "yes"){
        if(container_no == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Container No</p></div>`;
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

        if(payment_type == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Payment Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        if(amount == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Payment Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }

        if(container_no != '' && invoice_type != '' && amount != '' && payment_type != ''){
            location.href= `/print/thirdparty?gatein=${container_no}&type=${invoice_type}&p_type=${payment_type}&amt=${amount}`
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
       
        if(invoice_type == ''){
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Invoice Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
        $('#genrateInvoice').show();
        location.href= "/print/line"
    }

}

  
</script>

@endsection