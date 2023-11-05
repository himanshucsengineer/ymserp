@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create Depo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Depo</li>
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
                        <form id="depoForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Depot Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Depot Name">
                                </div>
                                <div class="form-group">
                                    <label for="address">Depot Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Depot Address">
                                </div>
                                <div class="form-group">
                                    <label for="status">Depot Active <span style="color:red;">*</span></label>
                                    <select name="status" class="form-control"  id="status">
                                        <option value="">Please Select Depot Active Status</option>
                                        <option value="1">yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Depot Phone <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Depot Phone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Depot Email <span style="color:red;">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Depot Email">
                                </div>
                                <div class="form-group">
                                    <label for="tan">Depot TAN Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="tan" name="tan" placeholder="Enter Depot TAN Number">
                                </div>
                                <div class="form-group">
                                    <label for="pan">Depot PAN Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter Depot PAN Number">
                                </div>
                                <div class="form-group">
                                    <label for="service_tax">Depot ServiceTax Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="service_tax" name="service_tax" placeholder="Enter Depot ServiceTax Number">
                                </div>
                                <div class="form-group">
                                    <label for="vattin">Depot VatTin  Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="vattin" name="vattin" placeholder="Enter Depot VatTin  Number">
                                </div>
                                <div class="form-group">
                                    <label for="gst">Depot GST  Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter Depot GST Number">
                                </div>
                                <div class="form-group">
                                    <label for="state">Depot State Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter Depot State Name">
                                </div>
                                <div class="form-group">
                                    <label for="state_code">Depot State Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state_code" name="state_code" placeholder="Enter Depot State Code">
                                </div>
                                <div class="form-group">
                                    <label for="billing_name">Depot Billing Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="billing_name" name="billing_name" placeholder="Enter Depot Billing Name">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name">
                                </div>
                                <div class="form-group">
                                    <label for="company_address">Company Address</label>
                                    <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Enter Company Address">
                                </div>
                                <div class="form-group">
                                    <label for="company_phone">Company Phone</label>
                                    <input type="text" class="form-control" id="company_phone" name="company_phone" placeholder="Enter Company Phone">
                                </div>
                                <div class="form-group">
                                    <label for="company_email">Company Email</label>
                                    <input type="email" class="form-control" id="company_email" name="company_email" placeholder="Enter Company Email">
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
        url: "/api/depo/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            console.log(response);
            $('.text').text('Update Depo');
            $("#name").val(response.name);
            $("#address").val(response.address);
            $("#status").val(response.status);
            $("#phone").val(response.phone);
            $("#email").val(response.email);
            $("#tan").val(response.tan);
            $("#pan").val(response.pan);
            $("#service_tax").val(response.service_tax);
            $("#vattin").val(response.vattin);
            $("#gst").val(response.gst);
            $("#state").val(response.state);
            $("#state_code").val(response.state_code);
            $("#billing_name").val(response.billing_name);
            $("#company_email").val(response.company_email);
            $("#company_name").val(response.company_name);
            $("#company_address").val(response.company_address);
            $("#company_phone").val(response.company_phone);
            
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    $.validator.setDefaults({
    submitHandler: function () {
        var user_id = localStorage.getItem('user_id');
        var depo_id = localStorage.getItem('depo_id');

        var name = $("#name").val();
        var address = $("#address").val();
        var status = $("#status").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var tan = $("#tan").val();
        var pan = $("#pan").val();
        var service_tax = $("#service_tax").val();
        var vattin = $("#vattin").val();
        var gst = $("#gst").val();
        var state = $("#state").val();
        var state_code = $("#state_code").val();
        var billing_name = $("#billing_name").val();

        var company_email = $("#company_email").val();
        var company_name = $("#company_name").val();
        var company_address = $("#company_address").val();
        var company_phone = $("#company_phone").val();


        if(getCateId[1]){
            const data = {
                'name':name,
                'address':address,
                'status':status,
                'phone':phone,
                'email':email,
                'tan':tan,
                'pan':pan,
                'service_tax':service_tax,
                'vattin':vattin,
                'gst':gst,
                'state_code':state_code,
                'state':state,
                'billing_name':billing_name,
                'company_email':company_email,
                'company_name':company_name,
                'company_address':company_address,
                'company_phone':company_phone,
                'created_by' : user_id,
                'depo_id':depo_id,
                'id':getCateId[1]

            }
            post('depo/update',data);

        }else{
            const data = {
                'name':name,
                'address':address,
                'status':status,
                'phone':phone,
                'email':email,
                'tan':tan,
                'pan':pan,
                'service_tax':service_tax,
                'vattin':vattin,
                'gst':gst,
                'state_code':state_code,
                'state':state,
                'billing_name':billing_name,
                'company_email':company_email,
                'company_name':company_name,
                'company_address':company_address,
                'company_phone':company_phone,
                'created_by' : user_id,
                'depo_id':depo_id,

            }
            post('depo/create',data);
        }
        window.location = `/depo/all`

        
    }
  });
    $('#depoForm').validate({
    rules: {
        name: {
            required: true,
        },
        address: {
            required: true,
        },
        status: {
            required: true,
        },
        phone: {
            required: true,
        },
        email: {
            required: true,
            email:true
        },
        tan: {
            required: true,
        },
        pan: {
            required: true,
        },
        service_tax: {
            required: true,
        },
        vattin: {
            required: true,
        },
        gst: {
            required: true,
        },
        state: {
            required: true,
        },
        state_code: {
            required: true,
        },
        billing_name: {
            required: true,
        },
        company_email: {
            email:true
        },
    },
    messages: {
        name: {
            required: "Name Is Required!",
        },
        address: {
            required: "Address Is Required!",
        },
        status: {
            required: "Status Is Required!",
        },
        phone: {
            required: "Phone Is Required!",
        },
        email: {
            required: "Email Is Required!",
            email:"Please Enter Valid Email"
        },
        tan: {
            required: "Tan Is Required!",
        },
        pan: {
            required: "Pan Is Required!",
        },
        service_tax: {
            required: "Service Tax Is Required!",
        },
        vattin: {
            required: "Vat in Is Required!",
        },
        gst: {
            required: "Gst Is Required!",
        },
        state: {
            required: "State Is Required!",
        },
        state_code: {
            required: "State Code Is Required!",
        },
        billing_name: {
            required: "Billing Name Is Required!",
        },
        company_email: {
            email:"Enter valid Email"
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