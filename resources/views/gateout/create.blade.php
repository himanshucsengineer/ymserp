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
                    <h1 class="m-0">Create Gate Out</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Gate Out</li>
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
                                    <label for="gate_pass_no">Gate Pass No. <span style="color:red;">*</span></label>
                                    <select name="gate_pass_no" class="form-control" id="gate_pass_no"></select>
                                </div>

                                <div class="gate_out_div" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-6"><h3>Container No:</h3></div>
                                        <div class="col-md-6" id="container_no"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><h3>Vehicle No:</h3></div>
                                        <div class="col-md-6" id="vehicle_no"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><h3>Driver Name:</h3></div>
                                        <div class="col-md-6" id="driver_name"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><h3>Driver Contact</h3></div>
                                        <div class="col-md-6" id="driver_contact"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><h3>Driver Photo</h3></div>
                                        <div class="col-md-6" id="driver_photo"></div>
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="gate_out_chcked" required>
                                    <label for="gate_out_chcked" class="custom-control-label">I Have Checked Everything is correct!</label>
                                </div>
                                <input type="hidden" id="container_no_id">
                                <input type="hidden" id="vhichle_id">
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
    $('#gate_pass_no').select2({
        ajax: {
            url: '/api/outward/getGatePass',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.final_gate_pass_no,
                            id: item.id
                        };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 2 // Minimum number of characters before making the request
    });

    $('#gate_pass_no').on('change', function(){
        var gate_pass_no = $(this).val();

        $.ajax({
            type: "post",
            url: "/api/outward/gateoutdata",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'gate_pass_no':gate_pass_no,
            },
            success: function (data) {
                var driver_photo = `/uploads/outward/${data.driver_copy}`;
                $('#container_no').html(`<h3>${data.container_no}</h3>`);
                $('#vehicle_no').html(`<h3>${data.vhicleNo}</h3>`);
                $('#driver_name').html(`<h3>${data.driver_name}</h3>`);
                $('#driver_contact').html(`<h3>${data.driver_contact}</h3>`);
                $('#driver_photo').html(`<img src="${driver_photo}" width="200px">`);
                $('.gate_out_div').show();

                $('#vhichle_id').val(data.vhicleNo_id);
                $('#container_no_id').val(data.container_no_id);
            },
            error: function (error) {
                console.log(error);
            }
        });
    })

});

function gateOutForm(){
    if ($('#gate_out_chcked').prop('checked')) {
        var vhichle_id = $('#vhichle_id').val(data.vhicleNo_id);
        var container_no_id = $('#container_no_id').val(data.container_no_id);
        var is_gate_out_checked = 1;
        var check_by = localStorage.getItem('user_id');

        var data = {
            'vhichle_id':vhichle_id,
            'container_no_id':container_no_id,
            'is_gate_out_checked':is_gate_out_checked,
            'check_by':vhichle_id,
            'is_gate_out':1,
        }

        post('gatein/update',data);
        window.reload();


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