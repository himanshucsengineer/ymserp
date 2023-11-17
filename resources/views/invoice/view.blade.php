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
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="">Select Depot</label>
                                    <select name="depos" id="depos" class="form-control">
                                        <option value="">Select Depot</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Select Line</label>
                                    <select name="lines" id="lines" class="form-control">
                                        <option value="">Select Line</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Select Party</label>
                                    <select name="party" id="party" class="form-control">
                                        <option value="">Select Party</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="">From</label>
                                    <input type="date" name="start_date" id="start_date" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">To</label>
                                    <input type="date" name="end_date" id="end_date" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Invoice Type</label>
                                    <select name="invoice_type" id="invoice_type" class="form-control">
                                        <option value="">Select Invoice Type</option>
                                        <option value="repair">Repair</option>
                                        <option value="washing">Washing</option>
                                        <option value="lolo">LOLO</option>
                                        <option value="parking">Parking</option>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
    console.log('hiii');

}

  
</script>

@endsection