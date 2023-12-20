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
.btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle{
    background-color:#63bf84;
    border-color:#63bf84;
    border-radius:2px;
}
.select2-container .select2-selection--single{
    height:38px !important;
}
.select2-container{
    z-index:100;
}
.gate_out_div{
    width:100%;
    height:auto;
    padding:1.5rem;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Cashflow</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Cashflow</li>
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
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type">Select An Option <span style="color:red;">*</span></label>
                                    <select name="type" class="form-control" id="type">
                                        <option value="">Select An Option</option>
                                        <option value="account">Account</option>
                                        <option value="person">Person</option>
                                        <option value="office">Office</option>
                                    </select>
                                </div>
                                <div id="account">
                                    <div class="form-group">
                                        <label for="type">Account <span style="color:red;">*</span></label>
                                        <select name="type" class="form-control" id="type">
                                            <option value="">Select An Option</option>
                                            <option value="account">Account</option>
                                            <option value="person">Person</option>
                                            <option value="office">Office</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" onclick="gateOutForm()">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

$(document).ready(function() {
    var checkToken = localStorage.getItem('token');
    

    $('#type').on('change', function(){
        var type = $('#type').val()

        if(type="account"){

        }else if(type = "person"){

        }else if(type="office"){

        }else{

        }
    })

});

function gateOutForm(){
    if ($('#gate_out_chcked').prop('checked')) {
                console.log('Checkbox is checked');
    } else {
        var callout = document.createElement('div');
        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Click On checkbox</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }
}


</script>

@endsection