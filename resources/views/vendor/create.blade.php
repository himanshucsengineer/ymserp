@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create Vendor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Vendor</li>
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
                        <form id="vendorForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"> Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>

                                <div class="form-group">
                                    <label for="address"> Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                </div>

                                <div class="form-group">
                                    <label for="city"> City <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                                </div>

                                <div class="form-group">
                                    <label for="state"> State <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                                </div>

                                <div class="form-group">
                                    <label for="country"> Country <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                                </div>

                                <div class="form-group">
                                    <label for="pincode"> Pincode <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode">
                                </div>

                                <div class="form-group">
                                    <label for="mob_no"> Mobile No. <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="mob_no" name="mob_no" placeholder="Enter Mobile No">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Email <span style="color:red;">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="tin_no">TIN No <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="tin_no" name="tin_no" placeholder="Enter TIN No">
                                </div>

                                <div class="form-group">
                                    <label for="gst_no">GSTIN No <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="payment_terms">Payment Terms <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="payment_terms" name="payment_terms" placeholder="Enter Payment Terms">
                                </div>

                                <div class="form-group">
                                    <label for="payment_method">Payment Method <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="payment_method" name="payment_method" placeholder="Enter Payment Method">
                                </div>

                                <div class="form-group">
                                    <label for="account_no">Account Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Enter Account Number">
                                </div>

                                <div class="form-group">
                                    <label for="ifsc_code">IFSC Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="branch">Branch Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter Branch Name">
                                </div>

                                <div class="form-group">
                                    <label for="account_holder_name">Account Holder Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="Enter Account Holder Name">
                                </div>

                                <div class="form-group">
                                    <label for="currency">Currency  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="currency" name="currency" placeholder="Enter Currency ">
                                </div>

                                <div class="form-group">
                                    <label for="vendor_type">Vendor Type <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="vendor_type" name="vendor_type" placeholder="Enter Vendor Type">
                                </div>

                                <div class="form-group">
                                    <label for="credit_limit">Credit Limit <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="credit_limit" name="credit_limit" placeholder="Enter Credit Limit">
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


    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');
    var checkToken = localStorage.getItem('token');

    if(getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/vendor/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('.text').text('Update Vendor');
            $("#name").val(response.name);
            $("#address").val(response.address);
            $("#city").val(response.city);
            $("#state").val(response.state);
            $("#country").val(response.country);
            $("#pincode").val(response.pincode);
            $("#email").val(response.email);
            $("#mob_no").val(response.mob_no);
            $("#tin_no").val(response.tin_no);
            $("#gst_no").val(response.gst_no);
            $("#payment_terms").val(response.payment_terms);
            $("#payment_method").val(response.payment_method);
            $("#account_no").val(response.account_no);
            $("#ifsc_code").val(response.ifsc_code);
            $("#branch").val(response.branch);
            $("#account_holder_name").val(response.account_holder_name);
            $("#currency").val(response.currency);
            $("#vendor_type").val(response.vendor_type);
            $("#credit_limit").val(response.credit_limit);
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    $.validator.setDefaults({
    submitHandler: function () {
        var name = $("#name").val();
        var address = $("#address").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var country = $("#country").val();
        var pincode = $("#pincode").val();
        var email = $("#email").val();
        var mob_no = $("#mob_no").val();
        var tin_no = $("#tin_no").val();
        var gst_no = $("#gst_no").val();
        var payment_terms = $("#payment_terms").val();
        var payment_method = $("#payment_method").val();
        var account_no = $("#account_no").val();
        var ifsc_code = $("#ifsc_code").val();
        var branch = $("#branch").val();
        var account_holder_name = $("#account_holder_name").val();
        var currency = $("#currency").val();
        var vendor_type = $("#vendor_type").val();
        var credit_limit = $("#credit_limit").val();

        if(getCateId[1]){
            const data = {
                'name':name,
                'address':address,
                'city':city,
                'state':state,
                'country':country,
                'pincode':pincode,
                'email':email,
                'mob_no':mob_no,
                'tin_no':tin_no,
                'gst_no':gst_no,
                'payment_terms':payment_terms,
                'payment_method':payment_method,
                'account_no':account_no,
                'ifsc_code':ifsc_code,
                'branch':branch,
                'account_holder_name':account_holder_name,
                'currency':currency,
                'vendor_type':vendor_type,
                'credit_limit':credit_limit,
                'id' : getCateId[1]
            }
            post('vendor/update',data);

        }else{
            const data = {
                'name':name,
                'address':address,
                'city':city,
                'state':state,
                'country':country,
                'pincode':pincode,
                'email':email,
                'mob_no':mob_no,
                'tin_no':tin_no,
                'gst_no':gst_no,
                'payment_terms':payment_terms,
                'payment_method':payment_method,
                'account_no':account_no,
                'ifsc_code':ifsc_code,
                'branch':branch,
                'account_holder_name':account_holder_name,
                'currency':currency,
                'vendor_type':vendor_type,
                'credit_limit':credit_limit,
            }
            post('vendor/create',data);
        }

        window.location = `/vendor/all`
            
    }
  });

    $('#vendorForm').validate({
    rules: {
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
        country: {
            required: true,
        },
        pincode: {
            required: true,
        },
        email: {
            required: true,
        },
        mob_no: {
            required: true,
        },
        tin_no: {
            required: true,
        },
        gst_no: {
            required: true,
        },
        payment_terms: {
            required: true,
        },
        payment_method: {
            required: true,
        },
        account_no: {
            required: true,
        },
        ifsc_code: {
            required: true,
        },
        branch: {
            required: true,
        },
        account_holder_name: {
            required: true,
        },
        currency: {
            required: true,
        },
        vendor_type: {
            required: true,
        },
        credit_limit: {
            required: true,
        },
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
        country: {
            required: "This field is required",
        },
        pincode: {
            required: "This field is required",
        },
        email: {
            required: "This field is required",
        },
        mob_no: {
            required: "This field is required",
        },
        tin_no: {
            required: "This field is required",
        },
        gst_no: {
            required: "This field is required",
        },
        payment_terms: {
            required: "This field is required",
        },
        payment_method: {
            required: "This field is required",
        },
        account_no: {
            required: "This field is required",
        },
        ifsc_code: {
            required: "This field is required",
        },
        branch: {
            required: "This field is required",
        },
        account_holder_name: {
            required: "This field is required",
        },
        currency: {
            required: "This field is required",
        },
        vendor_type: {
            required: "This field is required",
        },
        credit_limit: {
            required: "This field is required",
        },
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