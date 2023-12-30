@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create Transport</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Transport</li>
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
                        <form id="transportForm" novalidate="novalidate">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="is_transport">Transport Type <span style="color:red;">*</span></label>
                                    <select name="is_transport" id="is_transport" class="form-control">
                                        <option value="">Select Transport Type</option>
                                        <option value="transport">Transport</option>
                                        <option value="consignee">Consignee</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="gst">GSTIN <span style="color:red;">*</span></label>
                                    <input type="text" onkeyup="getTransporter()" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>
                                
                                <div class="form-group">
                                    <label for="name"> Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="name" name="name" placeholder="Enter  Name">
                                </div>

                                <div class="form-group">
                                    <label for="address"> Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="address" name="address" placeholder="Enter  Address">
                                </div>

                                <div class="form-group">
                                    <label for="city">City  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="city" name="city" placeholder="Enter City ">
                                </div>

                                <div class="form-group">
                                    <label for="state">State  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="state" name="state" placeholder="Enter State ">
                                </div>

                                <div class="form-group">
                                    <label for="pincode">PIN Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control"  readonly id="pincode" name="pincode" placeholder="Enter PIN Code">
                                </div>

                                <div class="form-group">
                                    <label for="gst_state">GST State <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="gst_state" name="gst_state" placeholder="Enter GST State">
                                </div>

                                <div class="form-group">
                                    <label for="state_code">State Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="state_code" name="state_code" placeholder="Enter State Code">
                                </div>
                                <div class="form-group">
                                    <label for="pan">PAN NO <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter Pan No.">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

    function getTransporter(){
        var gst = $('#gst').val();
        if(gst.length ==  15){
            var stateCode = gst.slice(0, 2);;
            var payload = {
                    "AppSCommonSearchTPItem":[{
                        "GSTIN":gst
                    }]
                } 

            $.ajax({
                type: "post",
                url: "https://www.ewaybills.com/MVEWBAuthenticate/MVAppSCommonSearchTP",
                headers: {
                    'MVApiKey': 'AbK438CB5t5EAOv',
                    'MVSecretKey': '6d1YZNP9IqFt3XE7t6UUuA==',
                    'GSTIN': '07AAHCT3019Q2ZV',
                    'Content-Type': 'application/json',
                },
                data:JSON.stringify(payload),
                success: function(response) {
                    var parjson = JSON.parse(response);
                    if(parjson.Status == 1){
                        fetch('/state.json')
                            .then(response => {
                                if (!response.ok) {
                                throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                var state_data = data.find(function(state) {
                                    return state.state_code === stateCode;
                                });
                                $("#state").val(state_data.state);
                                $("#state_code").val(state_data.state_code);

                            })
                            .catch(error => {
                                console.error('Error loading JSON:', error);
                            });
                            var final_addr = parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.bno + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.flno + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.bnm + ', ' + parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.st ;
                            $("#gst_state").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.stcd);
                            $("#name").val(parjson.lstAppSCommonSearchTPResponse[0].lgnm);
                            $("#address").val(final_addr);
                            $("#city").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.loc);
                            $("#pincode").val(parjson.lstAppSCommonSearchTPResponse[0].pradr.addr.pncd);
                    }else{
                        var callout = document.createElement('div');
                            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Invalid Gst No.</p></div>`;
                            document.getElementById('apiMessages').appendChild(callout);
                            setTimeout(function() {
                                callout.remove();
                            }, 2000);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    }
$(function () {
    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');
    var checkToken = localStorage.getItem('token');

    if(getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/transport/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('.text').text('Update Transport');
            $("#name").val(response.name);
            $("#address").val(response.address);
            $("#city").val(response.city);
            $("#state").val(response.state);
            $("#pincode").val(response.pincode);
            $("#gst").val(response.gst);
            $("#pan").val(response.pan);
            $("#gst_state").val(response.gst_state);
            $("#state_code").val(response.state_code);
            $("#is_transport").val(response.is_transport);
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var name = $("#name").val();
        var address = $("#address").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var pincode = $("#pincode").val();
        var gst = $("#gst").val();
        var pan = $("#pan").val();
        var gst_state = $("#gst_state").val();
        var state_code = $("#state_code").val();
        var is_transport = $("#is_transport").val();

        if(getCateId[1]){
            const data = {
                'name':name,
                'address':address,
                'city':city,
                'state':state,
                'pincode':pincode,
                'gst':gst,
                'pan':pan,
                'gst_state':gst_state,
                'state_code':state_code,
                'is_transport':is_transport,
                'user_id':user_id,
                'depo_id':depo_id,
                'id' : getCateId[1]
            }
            post('transport/update',data);

        }else{
            const data = {
                'name':name,
                'address':address,
                'city':city,
                'state':state,
                'pincode':pincode,
                'gst':gst,
                'pan':pan,
                'gst_state':gst_state,
                'state_code':state_code,
                'is_transport':is_transport,
                'user_id':user_id,
                'depo_id':depo_id,
            }
            post('transport/create',data);
        }

        window.location = `/transport/all`
            
    }
  });

    $('#transportForm').validate({
    rules: {
        name: {
            required: true,
        },
        is_transport: {
            required: true,
        }
    },
    messages: {

        name: {
            required: "This field is required",
        },
        address: {
            required: "This field is required",
        },
        city: {
            required: "This field is required",
        },
        state: {
            required: "This field is required",
        },
        pincode: {
            required: "This field is required",
        },
        gst: {
            required: "This field is required",
        },
        pan: {
            required: "This field is required",
        },
        gst_state: {
            required: "This field is required",
        },
        state_code: {
            required: "This field is required",
        },
        is_transport: {
            required: "This field is required",
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