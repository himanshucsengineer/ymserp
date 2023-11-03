@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Transport</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Transport</li>
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
                                    <label for="transport_id">Transport ID <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="transport_id" name="transport_id" placeholder="Enter Transport ID">
                                </div>
                                <div class="form-group">
                                    <label for="name">Transport Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Transport Name">
                                </div>

                                <div class="form-group">
                                    <label for="address">Transport Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Transport Address">
                                </div>

                                <div class="form-group">
                                    <label for="city">City  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City ">
                                </div>

                                <div class="form-group">
                                    <label for="state">State  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State ">
                                </div>

                                <div class="form-group">
                                    <label for="pincode">PIN Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter PIN Code">
                                </div>

                                <div class="form-group">
                                    <label for="gst">GSTIN <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="pan">PAN NO <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter Pan No.">
                                </div>
                                <div class="form-group">
                                    <label for="gst_state">GST State <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst_state" name="gst_state" placeholder="Enter GST State">
                                </div>

                                <div class="form-group">
                                    <label for="state_code">State Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state_code" name="state_code" placeholder="Enter State Code">
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
$(function () {
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var transport_id = $("#transport_id").val();
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

            const data = {
                'transport_id':transport_id,
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
  });

    $('#transportForm').validate({
    rules: {
        transport_id: {
            required: true,
        },
        name: {
            required: true,
        },
        address: {
            required: true,
        },
        city: {
            required: true,
        },
        state: {
            required: true,
        },
        pincode: {
            required: true,
        },
        gst: {
            required: true,
        },
        pan: {
            required: true,
        },
        gst_state: {
            required: true,
        },
        state_code: {
            required: true,
        },
        is_transport: {
            required: true,
        }
    },
    messages: {
        transport_id: {
            required: "This field is required",
        },
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