<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login || YMSERP</title>
    <link href="/assets/img/logo_icon.png" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <style>
        .callout{
            position: absolute;
            width:300px;
            right:10px;
            top:10px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div id="apiMessages"> </div>
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><img src="/assets/img/logo-trans.png" alt="logo" width="300px"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Welcome To Bhavani Group</p>

                <form id="loginForm" method="post" novalidate="novalidate">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Next</button>
                        </div>
                    </div>
                </form>

                <form id="loginForm1" method="post" novalidate="novalidate" style="display:none;">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username1" placeholder="Enter Username" readonly>
                    </div>
                    <div class="form-group">
                        <select class="form-control " id="depo">
                            <option value="">Select Depo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                

                <p class="mb-1">
                    <a href="/forgot-password">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="/forgot-username" class="text-center">I forgot my Username</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>

    <script>

    $(document).ready(function () {
        // $("#loginForm1").hide();
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            var username = $("#username").val();

            if(username){
                $.ajax({
                    type: "POST",
                    url: "/api/auth/checkUser",
                    data: {
                        username: username
                    },
                    success: function (data) {
                        $.each(data.data, function(index, item) {
                            $('#depo').append($("<option>", {
                                value: item.id,
                                text: item.name
                            }));
                        });
                        $('#username1').val(username);
                        $("#loginForm1").show();
                        $("#loginForm").hide();
                    },
                    error: function (error) {
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

        $("#loginForm1").submit(function (e) {
            e.preventDefault();
            var username = $("#username1").val();
            var depo = $("#depo").val();
            var password = $("#password").val();
            if(depo == ''){
                $('#depo').addClass('is-invalid');
            }

            if(username && password && depo){
                $.ajax({
                type: "POST",
                url: "/api/auth/login",
                data: {
                    username: username,
                    password: password
                },
                success: function (data) {
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">Login Successfully</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                    localStorage.setItem('token', data.token.original.access_token)
                    localStorage.setItem('user_id', data.currentUser.user_id)
                    localStorage.setItem('depo_id', depo)
                    localStorage.setItem('role', data.currentUser.role_id)
                    window.location.href = '/dashboard';
                },
                error: function (error) {
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
    });


    $(function () {
    $('#loginForm').validate({
    rules: {
      username: {
        required: true,
      },
      
    },
    messages: {
        username: {
        required: "Please enter a Username",
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

$(function () {
    $('#loginForm1').validate({
    rules: {
      username1: {
        required: true,
      },
      password: {
        required: true,
      },
      depo: {
        required: true,
      },
    },
    messages: {
        username1: {
        required: "Please enter a Username",
      },
      password: {
        required: "Please enter a Password",
      },
      depo: {
        required: "Please enter Depo",
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

<script src="assets/plugins/jquery/jquery.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="assets/dist/js/adminlte.min.js"></script>



</body>

</html>