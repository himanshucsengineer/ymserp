@extends('common.layout')

@section('content')

<style>
.img_prv_box{
    margin-top:.5rem;
    /* border:1px solid #cdcdcd; */
    width:400px;
    /* height:200px; */
}
.img_prv_box img{
    width:100%;
}
#pagination{
    /* width:100%; */
    margin-top:1rem;
    float:right;
}
.pagination-btn{
    border:1px solid #cdcdcd;
    outline:none;
    background:white;
    color:#000;
    padding:.3rem .7rem;
}
.active-btn{
    background:#63bf84;
    color:white;
}
#search{
    float: right;
    padding: 0.5rem 1rem;
    outline: none;
    border: 1px solid #cdcdcd;
    border-radius: 4px;
    margin-bottom: 1rem;
    margin-top:1.7rem;
}
.flex_date_range{
    width:100%;
    height:auto;
    display:flex;
    margin-bottom:1rem;
}
.flex_date_range .left{
    width:50%;
}
.flex_date_range .right{
    width:50%;
}
.btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle{
    background-color:#63bf84;
    border-color:#63bf84;
    border-radius:2px;
}
.container_flex{
    width:100%;
    height:auto;
    display:flex;
}
.container_flex .right{
    width: 90%;
}
.container_flex .left{
    width: 10%;
}
.add_more button{
    width:10%;
    float:right;
    margin-top:2rem;
}
</style>
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
                        <form id="gateinForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vehicle_number">Vehicle Number <span style="color:red;">*</span></label>
                                    <input type="text" class="" style="font-size:50px; width:100%; text-transform:uppercase;" id="vehicle_number" name="vehicle_number" placeholder="">
                                </div>
                                <h3 style="text-align:center">OR</h3>
                                <div class="form-group">
                                    <label for="vehicle_img">Vehicle Image</label>
                                    <input type="file" class="form-control" id="vehicle_img" name="vehicle_img" placeholder="Enter Vehicle Number">
                                    <div class="img_prv_box">
                                        <img id="vehicle_img_prev" src="" />
                                    </div>
                                </div>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active mr-2" style="border-radius:2px;">
                                    <input type="radio" name="options" id="option_b1" autocomplete="off" checked="" value="with">With Container
                                    </label>
                                    <label class="btn btn-secondary mr-2" style="border-radius:2px;">
                                    <input type="radio" name="options" id="option_b2" autocomplete="off"  value="without"> Without Container
                                    </label>
                                </div>
                                <div class="container_div">
                                    <div class="add_more">
                                        <button type="button" onclick="addContainer()" class="btn btn-block btn-outline-success"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <div class="inputRow">
                                        <div class="form-group">
                                            <div class="container_flex mt-2">
                                                <div class="right">
                                                    <label for="container_no">Container Number <span style="color:red;">*</span></label>
                                                    <input type="text" class="" oninput="validateInput(this)"  maxlength="11" style="font-size:50px; width:100%; text-transform:uppercase;" id="1" name="container_no[]" placeholder="">
                                                    <span id="errorText1" style="color:red; font-size:15px; margin-top: .5rem"></span>
                                                </div>
                                                <div class="left ml-2">
                                                    <button type="button" style="margin-top:3.3rem" class="deleteInput btn btn-block btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 style="text-align:center">OR</h3>
                                        <div class="form-group">
                                            <label for="container_img">Container Image</label>
                                            <input type="file" class="form-control" onchange="showPreview(this)" id="containerimg_1" name="container_img[]" placeholder="Enter Vehicle Number">
                                            <div class="img_prv_box">
                                                <img id="container_img_prev1" src="" />
                                            </div>
                                        </div>
                                    </div>
                                    
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
    let containerCounter = 2;

$(document).ready(function () {
    $(".container_div").on("click", ".deleteInput", function () {
        $(this).closest('.inputRow').remove();
        containerCounter--;

    });


});

function addContainer() {
    $(".container_div").append(
        '<div class="inputRow">' +
            '<div class="form-group">' +
                '<div class="container_flex mt-2">' +
                    '<div class="right">' +
                        '<label for="container_no">Container Number ' + containerCounter +'<span style="color:red;">*</span></label>' +
                        '<input type="text" class="" oninput="validateInput(this)"  maxlength="11" style="font-size:50px; width:100%; text-transform:uppercase;" id="'+ containerCounter +'" name="container_no[]" placeholder="">' +
                        '<span id="errorText'+ containerCounter +'" style="color:red; font-size:15px; margin-top: .5rem"></span>' +
                    '</div>' +
                    '<div class="left ml-2">' +
                        '<button type="button" style="margin-top:3.3rem" class="deleteInput btn btn-block btn-outline-danger"><i class="fas fa-trash-alt"></i></button>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<h3 style="text-align:center">OR</h3>' +
            '<div class="form-group">' +
                '<label for="container_img">Container Image '+ containerCounter +'</label>' +
                '<input type="file" class="form-control" onchange="showPreview(this)" id="containerimg_'+ containerCounter +'" name="container_img[]" placeholder="Enter Vehicle Number">' +
                '<div class="img_prv_box">' +
                    '<img id="container_img_prev'+ containerCounter +'" src="" />' +
                '</div>' +
            '</div>' +
        '</div>'
    );
    containerCounter++;
}


</script>


<script>
$(document).ready(function () {

    $('input[name="options"]').on('change', function () {
    // Get the value of the selected radio button
    var selectedValue = $('input[name="options"]:checked').val();

    if (selectedValue == "without") {
        $('.container_div').hide();
        $('.2_container_div').hide();
    } else if (selectedValue == "2nd_with") {
        $('.container_div').show();
        $('.2_container_div').show();
    } else {
        $('.2_container_div').hide();
        $('.container_div').show();
    }
});

$('#vehicle_img').on('change', function (e) {
    var fileInput = $(this)[0];
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#vehicle_img_prev').attr('src', e.target.result);
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
});

});


function showPreview(input){
    const containerId = input.id;
    const main_id = containerId.split("_");
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#container_img_prev'+main_id[1]).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}


function checkContainers(container_no, charToDigit) {
    var ul = [];

    $("#checkDigitResult").empty();

    var containers = container_no;

    if (containers.length == 0) {
        return false;
    }

    containers = containers.replace(/(?:\r\n|\r|\n)/g, ',').split(/[\s,|:]+/);

    containers.forEach(function (container) {
        container = container.trim().toUpperCase().substr(0, 11);

        var li = '';

        if (container.length == 11 && isNaN(container.substr(-1, 1))) {
            container = container.substr(0, 10);
        }

        if (container.length > 0) {
            var finalvalue = 0;
            var checkdigit = 0;

            if (container.length == 10 || container.length == 11) {
                for (var i = 0; i < 10; i++) {
                    chr = container[i];

                    if (!isNaN(chr)) {
                        if (i < 4) {
                            checkdigit = -1;
                            break;
                        }

                        finalvalue += parseInt(chr) * Math.pow(2, i);
                    } else if (chr >= "A" && chr <= "Z") {
                        if (i > 3) {
                            checkdigit = -1;
                            break;
                        }

                        finalvalue += charToDigit[chr] * Math.pow(2, i);
                    } else {
                        checkdigit = -1;
                        break;
                    }
                }
            } else {
                checkdigit = -1;
            }

            if (checkdigit == -1) {
                var callout = document.createElement('div');
                callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">${container} Is Incorrect</p></div>`;
                document.getElementById('apiMessages').appendChild(callout);
                setTimeout(function() {
                    callout.remove();
                }, 2000);

            } else {
                checkdigit = finalvalue - (parseInt(finalvalue / 11) * 11);

                if (checkdigit == 10) {
                    checkdigit = 0;
                }

                if (container.length == 11) {
                    if (parseInt(container.substr(-1, 1)) == checkdigit) {
                        var callout = document.createElement('div');
                        callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">${container} Is Correct</p></div>`;
                        document.getElementById('apiMessages').appendChild(callout);
                        setTimeout(function() {
                            callout.remove();
                        }, 2000);
                    } else {
                        var callout = document.createElement('div');
                        callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">${container} Is Incorrect</p></div>`;
                        document.getElementById('apiMessages').appendChild(callout);
                        setTimeout(function() {
                            callout.remove();
                        }, 2000);
                    }
                } else {
                    var callout = document.createElement('div');
                    callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">${container} Is Incorrect</p></div>`;
                    document.getElementById('apiMessages').appendChild(callout);
                    setTimeout(function() {
                        callout.remove();
                    }, 2000);
                }
            }
        }

        // ul.push(li);
    });

    // return ul.join('');
}



function validateInput(input) {
    input.style.color = 'black';
    const containerId = input.id;

    document.getElementById('errorText'+containerId).textContent = "";
    const inputField = document.getElementById(containerId);
    inputField.setAttribute('maxlength', '11');
    const inputValue = input.value;

    if(inputValue.length == 11){
        var listResults = checkContainers(inputValue, {
            "A": 10, "B": 12, "C": 13, "D": 14,
            "E": 15, "F": 16, "G": 17, "H": 18,
            "I": 19, "J": 20, "K": 21, "L": 23,
            "M": 24, "N": 25, "O": 26, "P": 27,
            "Q": 28, "R": 29, "S": 30, "T": 31,
            "U": 32, "V": 34, "W": 35, "X": 36,
            "Y": 37, "Z": 38
        });
    }

    let checkFirstChar = isNaN(inputValue);
    if(checkFirstChar == false){
    document.getElementById('errorText'+containerId).textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
    inputField.setAttribute('maxlength', '1');
    input.style.color = 'red';
    }

    if(inputValue.length <= 4){
    const checkNumber = /\d/; // This regex matches any digit (0-9)
    let chechkNumberforstart =  checkNumber.test(inputValue);
    if(chechkNumberforstart){
        document.getElementById('errorText'+containerId).textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
        inputField.setAttribute('maxlength', inputValue.length);
        input.style.color = 'red';
    }
    }

    if(inputValue.length > 4){
        const part2 = inputValue.substring(4);
        let checkNumber = isNaN(part2);
        if(checkNumber == true){
            document.getElementById('errorText'+containerId).textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
            inputField.setAttribute('maxlength', inputValue.length);
            input.style.color = 'red';
        }
    }
}




$(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {

        var container_no = [];
        $("input[name='container_no[]']").each(function () {
            container_no.push($(this).val().toUpperCase());
        });

        var container_img = [];
        $("input[name='container_img[]']").each(function () {
            container_img.push($(this)[0].files[0]);
        });

        console.log(container_img);

        var vehicle_number = $("#vehicle_number").val();
        var type = $('input[name="options"]:checked').val();
        var vehicle_number_finel = vehicle_number.toUpperCase();

            var formData = new FormData();
            formData.append('container_no', container_no);
            formData.append('vehicle_number', vehicle_number_finel);
            formData.append('type', type);
            formData.append('user_id', user_id);
            formData.append('depo_id', depo_id);
            formData.append('container_img', container_img);

            // $.each(container_img, function (index, value) {
            // });
            formData.append('vehicle_img', $('#vehicle_img')[0].files[0]);

            for (var pair of formData.entries()) {
    console.log(pair[0] + ', ' + pair[1]);
}

            // Now, you can send formData in an AJAX request
            $.ajax({
                url: '/api/gatein/create',
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
                    // location.reload();
                    $("#gateinForm")[0].reset();
                },
                error: function(error) {
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
  });

    $('#gateinForm').validate({
    rules: {
        vehicle_number: {
            required: true,
        },
        
    },
    messages: {
        container_no: {
            required: "This Field Is Required!",
        },
        vehicle_number: {
            required: "This Field Is Required!",
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