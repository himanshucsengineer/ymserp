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
                        <form id="transportForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"> Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter  Name">
                                </div>

                                <div class="form-group">
                                    <label for="address"> Address <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter  Address">
                                </div>

                                <div class="form-group">
                                    <label for="address"> Phone No. <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter  Address">
                                </div>

                                <div class="form-group">
                                    <label for="address"> Email <span style="color:red;">*</span></label>
                                    <input type="email" class="form-control" id="address" name="address" placeholder="Enter  Address">
                                </div>
                                <div class="form-group">
                                    <label for="gst">TIN <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="gst">GSTIN <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="city">Payment Term  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City ">
                                </div>

                                <div class="form-group">
                                    <label for="gst">Payment Method <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="gst">Bank Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="gst">Bank IFSC <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="gst">Branch Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="gst">Account Holder name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="state">Currency  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State ">
                                </div>

                                <div class="form-group">
                                    <label for="gst">Vendor Type <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GSTIN">
                                </div>

                                <div class="form-group">
                                    <label for="pincode">Credit Limit <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter PIN Code">
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
// $(function () {


//     var currentURL = window.location.href;
//     var getCateId = currentURL.split('=');
//     var checkToken = localStorage.getItem('token');

//     if(getCateId[1]){
//         $.ajax({
//         type: "post",
//         url: "/api/transport/getbyid",
//         headers: {
//             'Authorization': 'Bearer ' + checkToken
//         },
//         data:{
//             'id':getCateId[1]
//         },
//         success: function(response) {
//             $('.text').text('Update Transport');
//             $("#name").val(response.name);
//             $("#address").val(response.address);
//             $("#city").val(response.city);
//             $("#state").val(response.state);
//             $("#pincode").val(response.pincode);
//             $("#gst").val(response.gst);
//             $("#pan").val(response.pan);
//             $("#gst_state").val(response.gst_state);
//             $("#state_code").val(response.state_code);
//             $("#is_transport").val(response.is_transport);
//         },
//         error: function(error) {
//             console.log(error);
//         }
//     });
//     }

//     var user_id = localStorage.getItem('user_id');
//     var depo_id = localStorage.getItem('depo_id');

//     $.validator.setDefaults({
//     submitHandler: function () {
//         var name = $("#name").val();
//         var address = $("#address").val();
//         var city = $("#city").val();
//         var state = $("#state").val();
//         var pincode = $("#pincode").val();
//         var gst = $("#gst").val();
//         var pan = $("#pan").val();
//         var gst_state = $("#gst_state").val();
//         var state_code = $("#state_code").val();
//         var is_transport = $("#is_transport").val();

//         if(getCateId[1]){
//             const data = {
//                 'name':name,
//                 'address':address,
//                 'city':city,
//                 'state':state,
//                 'pincode':pincode,
//                 'gst':gst,
//                 'pan':pan,
//                 'gst_state':gst_state,
//                 'state_code':state_code,
//                 'is_transport':is_transport,
//                 'user_id':user_id,
//                 'depo_id':depo_id,
//                 'id' : getCateId[1]
//             }
//             post('transport/update',data);

//         }else{
//             const data = {
//                 'name':name,
//                 'address':address,
//                 'city':city,
//                 'state':state,
//                 'pincode':pincode,
//                 'gst':gst,
//                 'pan':pan,
//                 'gst_state':gst_state,
//                 'state_code':state_code,
//                 'is_transport':is_transport,
//                 'user_id':user_id,
//                 'depo_id':depo_id,
//             }
//             post('transport/create',data);
//         }

//         window.location = `/transport/all`
            
//     }
//   });

//     $('#transportForm').validate({
//     rules: {
//         name: {
//             required: true,
//         },
//         is_transport: {
//             required: true,
//         }
//     },
//     messages: {

//         name: {
//             required: "This field is required",
//         },
//         address: {
//             required: "This field is required",
//         },
//         city: {
//             required: "This field is required",
//         },
//         state: {
//             required: "This field is required",
//         },
//         pincode: {
//             required: "This field is required",
//         },
//         gst: {
//             required: "This field is required",
//         },
//         pan: {
//             required: "This field is required",
//         },
//         gst_state: {
//             required: "This field is required",
//         },
//         state_code: {
//             required: "This field is required",
//         },
//         is_transport: {
//             required: "This field is required",
//         }
//     },
//     errorElement: 'span',
//     errorPlacement: function (error, element) {
//       error.addClass('invalid-feedback');
//       element.closest('.form-group').append(error);
//     },
//     highlight: function (element, errorClass, validClass) {
//       $(element).addClass('is-invalid');
//     },
//     unhighlight: function (element, errorClass, validClass) {
//       $(element).removeClass('is-invalid');
//     }
//   });
// });
</script>

@endsection