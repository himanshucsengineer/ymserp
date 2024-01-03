<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YMSERP | Lockscreen</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css?v=3.2.0">
    <style>
        .callout{
            position: absolute;
            width:300px;
            right:10px;
            top:10px;
        }
    </style>
    <script nonce="6a2f1895-3519-4e28-8998-ad01dec88a19">
    (function(w, d) {
        ! function(dp, dq, dr, ds) {
            dp[dr] = dp[dr] || {};
            dp[dr].executed = [];
            dp.zaraz = {
                deferred: [],
                listeners: []
            };
            dp.zaraz.q = [];
            dp.zaraz._f = function(dt) {
                return async function() {
                    var du = Array.prototype.slice.call(arguments);
                    dp.zaraz.q.push({
                        m: dt,
                        a: du
                    })
                }
            };
            for (const dv of ["track", "set", "debug"]) dp.zaraz[dv] = dp.zaraz._f(dv);
            dp.zaraz.init = () => {
                var dw = dq.getElementsByTagName(ds)[0],
                    dx = dq.createElement(ds),
                    dy = dq.getElementsByTagName("title")[0];
                dy && (dp[dr].t = dq.getElementsByTagName("title")[0].text);
                dp[dr].x = Math.random();
                dp[dr].w = dp.screen.width;
                dp[dr].h = dp.screen.height;
                dp[dr].j = dp.innerHeight;
                dp[dr].e = dp.innerWidth;
                dp[dr].l = dp.location.href;
                dp[dr].r = dq.referrer;
                dp[dr].k = dp.screen.colorDepth;
                dp[dr].n = dq.characterSet;
                dp[dr].o = (new Date).getTimezoneOffset();
                if (dp.dataLayer)
                    for (const dC of Object.entries(Object.entries(dataLayer).reduce(((dD, dE) => ({
                            ...dD[1],
                            ...dE[1]
                        })), {}))) zaraz.set(dC[0], dC[1], {
                        scope: "page"
                    });
                dp[dr].q = [];
                for (; dp.zaraz.q.length;) {
                    const dF = dp.zaraz.q.shift();
                    dp[dr].q.push(dF)
                }
                dx.defer = !0;
                for (const dG of [localStorage, sessionStorage]) Object.keys(dG || {}).filter((dI => dI
                    .startsWith("_zaraz_"))).forEach((dH => {
                    try {
                        dp[dr]["z_" + dH.slice(7)] = JSON.parse(dG.getItem(dH))
                    } catch {
                        dp[dr]["z_" + dH.slice(7)] = dG.getItem(dH)
                    }
                }));
                dx.referrerPolicy = "origin";
                dx.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(dp[dr])));
                dw.parentNode.insertBefore(dx, dw)
            };
            ["complete", "interactive"].includes(dq.readyState) ? zaraz.init() : dp.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, "zarazData", "script");
    })(window, document);
    </script>
</head>

<body class="hold-transition lockscreen">
<div id="apiMessages"> </div>

    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <img src="/assets/img/logo-trans.png" alt="logo" width="300px">
        </div>

        <div class="lockscreen-name" id="user"></div>

        <div class="lockscreen-item">
                <div class="input-group">
                    <input type="hidden" id="username">
                    <input type="password" id="password" class="form-control" placeholder="password">
                    <div class="input-group-append">
                        <button type="button" class="btn" onclick="unlockscreen()">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
        </div>

        <div class="help-block text-center">
            Enter your password to retrieve your session
        </div>
        <div class="text-center">
            <a href="/">Or Sign In Again</a>
        </div>
       
    </div>


    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        // var checkToken = localStorage.getItem('token');
        var user_id = localStorage.getItem('user_id');
        $.ajax({
            type: "post",
            url: "/api/auth/getuserbyid",
            data:{
                'id':user_id
            },
            success: function(response) {
                $('#user').html(`<h4 style="text-transform:uppercase;">${response.username}</h4>`)
                $('#username').val(response.username);
            },
            error: function(error) {
                console.log(error);
            }
        });

        function unlockscreen(){
            var password = $('#password').val();
            var username = $('#username').val();
            var depo = localStorage.getItem('depo_id');
            
            if(password == ''){
                var callout = document.createElement('div');
                callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Enter Password</p></div>`;
                document.getElementById('apiMessages').appendChild(callout);
                setTimeout(function() {
                    callout.remove();
                }, 2000);
            }

            if(password != '' && username != ''){
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
        }
    </script>
</body>

</html>