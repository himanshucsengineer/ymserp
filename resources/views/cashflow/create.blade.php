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
                    <h1 class="m-0 text">Create Cashflow</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Cashflow</li>
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
                                    </select>
                                </div>
                                <div id="account" style="display:none">
                                    <div class="form-group">
                                        <label for="bank_id">Bank <span style="color:red;">*</span></label>
                                        <select name="bank_id" class="form-control" id="bank_id">
                                            <option value="">Select Bank</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="person" style="display:none">
                                    <div class="form-group" >
                                        <label for="user_id">Person <span style="color:red;">*</span></label>
                                        <select name="user_id" class="form-control" id="user_id">
                                            <option value="">Select Person</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label for="amount">Amount <span style="color:red;">*</span></label>
                                        <input type="text" name="amount"  class="form-control" id="amount" placeholder="Enter Amount">
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
    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');

    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.ajax({
        type: "post",
        url: "/api/cashflow/calculateamount",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            $('#amount').val(data.amount);
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#type').on('change', function(){
        var type = $('#type').val()

        if(type == "account"){
            $('#account').show();
            $('#person').hide();
            $.ajax({
                type: "post",
                url: "/api/account/get",
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data:{
                    'user_id':user_id,
                    'depo_id':depo_id
                },
                success: function (data) {
                    var select = document.getElementById('bank_id');
                    data.forEach(function(item) {
                        var bank_name = `${item.bank_name} ( ${item.branch_name} )`;
                        var option = document.createElement('option');
                        option.value = item.id;
                        option.text = bank_name;
                        select.appendChild(option);
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }else if(type == "person"){
            $('#person').show();
            $('#account').hide();
            $.ajax({
                type: "post",
                url: "/api/user/getUserList",
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data:{
                    'user_id':user_id,
                    'depo_id':depo_id
                },
                success: function (data) {
                    var select = document.getElementById('user_id');
                    data.forEach(function(item) {
                        var user_name = `${item.employee_code} - ${item.employee_name}`;
                        var option = document.createElement('option');
                        option.value = item.id;
                        option.text = user_name;
                        select.appendChild(option);
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }else{
            $('#person').hide();
            $('#account').hide();
        }
    })


    if(getCateId[1]){

        $.ajax({
            type: "post",
            url: "/api/user/getUserList",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id
            },
            success: function (data) {
                var select = document.getElementById('user_id');
                data.forEach(function(item) {
                    var user_name = `${item.employee_code} - ${item.employee_name}`;
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.text = user_name;
                    select.appendChild(option);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });

        $.ajax({
            type: "post",
            url: "/api/account/get",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id
            },
            success: function (data) {
                var select = document.getElementById('bank_id');
                data.forEach(function(item) {
                    var bank_name = `${item.bank_name} ( ${item.branch_name} )`;
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.text = bank_name;
                    select.appendChild(option);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });

        $.ajax({
            type: "post",
            url: "/api/cashflow/getbyid",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'id':getCateId[1]
            },
            success: function(response) {
                $('#type').val(response.type);
                if(response.type == "person"){
                    $('#person').show();
                    $('#account').hide();
                    $('#user_id').val(response.transfer_to);
                }else if(response.type == "account"){
                    $('#person').hide();
                    $('#account').show();
                    
                    $('#bank_id').val(response.account_id);
                }else{
                    $('#person').hide();
                    $('#account').hide();
                }
                $('#amount').val(response.amount);
                $('.text').text('Update Cash Flow');
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

});

function gateOutForm(){
    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');
    
    var type = $('#type').val();
    var bank_id = $('#bank_id').val();
    var transfer_to = $('#user_id').val();
    var amount = $('#amount').val();
    var checkToken = localStorage.getItem('token');
    var transfer_from = localStorage.getItem('user_id');

    if(type == "person" && transfer_to == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Person</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }else if(type == "account" && bank_id == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Account</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }


    if(amount != '' && type != '' && bank_id != ''){
        if(getCateId[1]){
            var data = {
                'type':type,
                'bank_id':bank_id,
                'transfer_to':transfer_to,
                'amount':amount,
                'transfer_from':transfer_from,
                'id':getCateId[1]
            }
            post('cashflow/update',data);
            
        }else{
            var data = {
                'type':type,
                'bank_id':bank_id,
                'transfer_to':transfer_to,
                'amount':amount,
                'transfer_from':transfer_from,
            }
            post('cashflow/create',data);
        }
        window.location = `/cashflow/all`
    }

    if(amount != '' && type != '' && transfer_to != ''){
        if(getCateId[1]){
            var data = {
                'type':type,
                'bank_id':bank_id,
                'transfer_to':transfer_to,
                'amount':amount,
                'transfer_from':transfer_from,
                'id':getCateId[1]
            }
            post('cashflow/update',data);
            
        }else{
            var data = {
                'type':type,
                'bank_id':bank_id,
                'transfer_to':transfer_to,
                'amount':amount,
                'transfer_from':transfer_from,
            }
            post('cashflow/create',data);
        }
        window.location = `/cashflow/all`
    }

    if(amount == '' && type == '' && transfer_to == '' && bank_id == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Invalid Request</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

}





</script>

@endsection