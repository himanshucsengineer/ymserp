@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Gate In</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Gate In</li>
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
                        <form id="lineForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Container Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Container Number ">
                                </div>
                                <div class="form-group">
                                    <label for="alise">Container Size <span style="color:red;">*</span></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Please Select Container Size</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="80">80</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="free_days">Free Days <span style="color:red;">*</span></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Please Select Container Type</option>
                                        <option value="FR">FR</option>
                                        <option value="HC">HC</option>
                                        <option value="DV">DV</option>
                                        <option value="TK">TK</option>
                                        <option value="SR">SR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="labour_rate">Labour Rate <span style="color:red;">*</span></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Please Select Transport</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="line_address">Inward Date <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="line_address" name="line_address" value="<?= date('Y-m-d')?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Inward Time  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= date('H:i:s')?>">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Driver Name  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Driver Name">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Vehicle Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Vehicle Number">
                                </div>

                                <div class="form-group">
                                    <label for="gst">Contact Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter Contact Number">
                                </div>
                                <div class="form-group">
                                    <label for="pan">Third Party <span style="color:red;">*</span></label>
                                    <select name="" id=""  class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="gst_state">Line Name <span style="color:red;">*</span></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Line</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="state_code">Arrive From <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state_code" name="state_code" placeholder="Enter Arrive From">
                                </div>

                                <div class="form-group">
                                    <label for="state_code">Port Name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="state_code" name="state_code" placeholder="Enter Port Name">
                                </div>

                                <div class="form-group">
                                    <label for="top_img">Driver Photo <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="top_img" id="top_img">
                                </div>

                                <div class="form-group">
                                    <label for="bottom_img">Bottom Image <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="bottom_img" id="bottom_img">
                                </div>

                                <div class="form-group">
                                    <label for="right_img">Right Image <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="right_img" id="right_img">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="left_img">Left Image <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="left_img" id="left_img">
                                </div>

                                <div class="form-group">
                                    <label for="front_img">Front Image <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="front_img" id="front_img">
                                </div>

                                <div class="form-group">
                                    <label for="door_img">Door Image <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="door_img" id="door_img">
                                </div>

                                <div class="form-group">
                                    <label for="interior_img">Interior Image <span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="interior_img" id="interior_img">
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
    var checkToken = localStorage.getItem('token');
    $.validator.setDefaults({
    submitHandler: function () {
        var name = $("#name").val();
        var alise = $("#alise").val();
        var free_days = $("#free_days").val();
        var labour_rate = $("#labour_rate").val();
        var line_address = $("#line_address").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var mobile = $("#mobile").val();
        var gst = $("#gst").val();
        var pan = $("#pan").val();
        var gst_state = $("#gst_state").val();
        var state_code = $("#state_code").val();


            var formData = new FormData();

            formData.append('name', name);
            formData.append('alise', alise);
            formData.append('free_days', free_days);
            formData.append('labour_rate', labour_rate);
            formData.append('line_address', line_address);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('mobile', mobile);
            formData.append('gst', gst);
            formData.append('pan', pan);
            formData.append('gst_state', gst_state);
            formData.append('state_code', state_code);
            formData.append('top_img', $('#top_img')[0].files[0]);
            formData.append('bottom_img', $('#bottom_img')[0].files[0]);
            formData.append('right_img', $('#right_img')[0].files[0]);
            formData.append('left_img', $('#left_img')[0].files[0]);
            formData.append('front_img', $('#front_img')[0].files[0]);
            formData.append('door_img', $('#door_img')[0].files[0]);
            formData.append('interior_img', $('#interior_img')[0].files[0]);

            // Now, you can send formData in an AJAX request
            $.ajax({
                url: '/api/line/create',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + checkToken
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">${data.message}</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                },
                error: function(error) {
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">${error.responseJSON.message}</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                }
            });

    }
  });

    $('#lineForm').validate({
    rules: {
        name: {
            required: true,
        },
        alise: {
            required: true,
        },
        free_days: {
            required: true,
        },
        labour_rate: {
            required: true,
        },

        line_address: {
            required: true,
        },
        email: {
            required: true,
            email:true
        },
        phone: {
            required: true,
        },
        mobile: {
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

        top_img: {
            required: true,
        },
        bottom_img: {
            required: true,
        },
        right_img: {
            required: true,
        },
        left_img: {
            required: true,
        },

        front_img: {
            required: true,
        },
        door_img: {
            required: true,
        },
        interior_img: {
            required: true,
        }

    },
    messages: {
        name: {
            required: "Name Is required",
        },
        alise: {
            required: "Alise Is required",
        },
        free_days: {
            required: "Free Days Is required",
        },
        labour_rate: {
            required: "Lanour rate Is required",
        },

        line_address: {
            required: "Line Address Is required",
        },
        email: {
            required: "Email Is required",
            email: "Enter Valid Email"
        },
        phone: {
            required: "Phone Is required",
        },
        mobile: {
            required: "Mobile Is required",
        },

        gst: {
            required: "Gst Is required",
        },
        pan: {
            required: "Pan Is required",
        },
        gst_state: {
            required: "Gst State Is required",
        },
        state_code: {
            required: "State Code Is required",
        },

        top_img: {
            required: "Top image Is required",
        },
        bottom_img: {
            required: "Bottom Image Is required",
        },
        right_img: {
            required: "Right Image Is required",
        },
        left_img: {
            required: "Left Image Is required",
        },

        front_img: {
            required: "Front Image Is required",
        },
        door_img: {
            required: "Door Image Is required",
        },
        interior_img: {
            required: "Interior Image Is required",
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