@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create Employer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create Employer</li>
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
                        <form id="contractorForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="contractorcode">Employer Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="contractorcode" id="contractorcode" placeholder="Enter Contractor Code">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Employer Full Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="company">Employer Company <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="company" id="company" placeholder="Enter Company">
                                </div>
                                <div class="form-group">
                                    <label for="address">Employer Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter Address">
                                </div>
                                <div class="form-group">
                                    <label for="pincode">Employer Pincode</label>
                                    <input type="text" class="form-control" id="pincode" placeholder="Enter Contractor pincode">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Employer Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contractor contact">
                                </div>
                                <div class="form-group">
                                    <label for="license">Employer License</label>
                                    <input type="text" class="form-control" id="license" placeholder="Enter License">
                                </div>
                                <div class="form-group">
                                    <label for="gst">Employer GST Number</label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter Contractor GST Number">
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
        url: "/api/contractor/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('.text').text('Update Contractor');
            $("#contractorcode").val(response.contractor_code);
            $("#fullname").val(response.fullname);
            $("#company").val(response.company);
            $("#address").val(response.address);
            $("#pincode").val(response.pincode);
            $("#license").val(response.license);
            $("#gst").val(response.gst);
            $("#contact").val(response.contact);
            
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
            var contractorcode = $("#contractorcode").val();
            var fullname = $("#fullname").val();
            var company = $("#company").val();
            var address = $("#address").val();
            var pincode = $("#pincode").val();
            var license = $("#license").val();
            var gst = $("#gst").val();
            var contact = $("#contact").val();

            if(getCateId[1]){
                const data = {
                    'contractor_code':contractorcode,
                    'fullname':fullname,
                    'company':company,
                    'address':address,
                    'pincode':pincode,
                    'license':license,
                    'gst':gst,
                    'contact':contact,
                    'user_id':user_id,
                    'depo_id':depo_id,
                    'id':getCateId[1]
                }
                post('contractor/update',data); 
            }else{
                const data = {
                    'contractorcode':contractorcode,
                    'fullname':fullname,
                    'company':company,
                    'address':address,
                    'pincode':pincode,
                    'license':license,
                    'gst':gst,
                    'contact':contact,
                    'user_id':user_id,
                    'depo_id':depo_id,
                }
                post('contractor/create',data); 
            }
        window.location = `/contractor/all`
            
    }
  });

    $('#contractorForm').validate({
    rules: {
        contractorcode: {
            required: true,
        },
        fullname: {
            required: true,
        },
        company: {
            required: true,
        },
        contact: {
            required: true,
        },
        gst: {
            required: true,
        },
    },
    messages: {
        contractorcode: {
            required: "Please enter a Contractor Code",
        },
        fullname: {
            required: "Please enter a Full Name",
        },
        company: {
            required: "Please enter a Company",
        },
        contact: {
            required: "Please enter a Company",
        },
        gst: {
            required: "Please enter a Company",
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