var checkToken = localStorage.getItem('token');
var user_id = localStorage.getItem('user_id');
if(!checkToken){
    window.location.href = '/';
}

function logout(){
    $.ajax({
        type: "POST",
        url: "/api/auth/logout",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">Logout Successfully</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
            localStorage.removeItem('token');
            localStorage.removeItem('user_id');
            window.location.href = '/';
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


function get(url){
    $.ajax({
        type: "GET",
        url: "/api/"+url,
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            console.log(data);
            return data;
        },
        error: function (error) {
            console.log(error);
        }
    });
}


function post(url,data){
    $.ajax({
        type: "POST",
        url: "/api/"+url,
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data,
        success: function (data) {
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">${data.message}</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        },
        error: function (error) {
            var finalValue = '';
            if(Array.isArray(error.responseJSON.message)){
                finalValue = Object.values(error.responseJSON.message[0]).join(', ');
            }else{
                finalValue = error.responseJSON.message;
            }
            var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">${finalValue}</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
        }
    });
}