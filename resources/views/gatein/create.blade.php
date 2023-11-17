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
                                    <label for="container_no">Container Number</label>
                                    <input type="text" class="" oninput="validateInput(this)"  maxlength="11" style="font-size:50px; width:100%; text-transform:uppercase;" id="container_no" name="container_no" placeholder="">
                                    <span id="errorText" style="color:red; font-size:15px; margin-top: .5rem"></span>
                                </div>
                                <h3 style="text-align:center">OR</h3>
                                <div class="form-group">
                                    <label for="container_img">Container Image</label>
                                    <input type="file" class="form-control" id="container_img" name="container_img" placeholder="Enter Vehicle Number">
                                    <div class="img_prv_box">
                                        <img id="container_img_prev" src="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_number">Vehicle Number</label>
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

                                <div class="form-group">
                                    <label for="container_size">Container Size <span style="color:red;">*</span></label>
                                    <select name="container_size" id="container_size" style="font-size:30px; height:50px" class="form-control">
                                        <option value="">Select Container Size</option>
                                        <option value="20">20</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="container_type">Container Type <span style="color:red;">*</span></label>
                                    <select name="container_type" id="container_type" style="font-size:30px; height:50px" class="form-control">
                                        <option value="">Select Container Type</option>
                                        <option value="DRY">DRY</option>
                                        <option value="REEFER">REEFER</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="driver_name">Driver Name  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="driver_name" name="driver_name" style="font-size:30px; height:50px" placeholder="Enter Driver Name">
                                </div>
                                

                                <div class="form-group">
                                    <label for="contact_number">Driver Contact Number <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" style="font-size:30px; height:50px" placeholder="Enter Contact Number">
                                </div>

                                

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h3 class="mt-2 ml-2">Inward Entry</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="search" placeholder="search Here..." onkeyup="refreshTable('',this.value)">
                                </div>
                            </div>
                            <table id="inspectionData" class="table table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Container No.</th>
                                        <th>Container Image</th>
                                        <th>Container Size</th>
                                        <th>Container Type</th>
                                        <th>Vehicle No.</th>
                                        <th>Vehicle image</th>
                                        <th>Driver Name</th>
                                        <th>Driver Contact</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                   
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6"><div id="pagination"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function () {
 
    refreshTable();
// Listen for changes in the file input
$('#container_img').on('change', function (e) {
    var fileInput = $(this)[0];
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#container_img_prev').attr('src', e.target.result);
        };
        reader.readAsDataURL(fileInput.files[0]);
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
function clearTableBody() {
    $('#table-body').empty();
}

function refreshTable(page,search){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    if(page){
        url = `/api/gatein/getInspectionData?page=${page}`;
    }else if(search){
        url = `/api/gatein/getInspectionData?search=${search}`;
    }else{
        url= `/api/gatein/getInspectionData`;
    }

    $.ajax({
        type: "post",
        url: url,
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function(response) {
            clearTableBody()

            var tbody = $('#table-body');

            var i =1;
            response.data.forEach(function(item) {
                var container_img = '';
                if(item.container_img){
                    container_img = $('<a>').attr({'href':'/uploads/gatein/'+item.container_img, 'target':'_blank'}).text("View Image");
                }else{
                    container_img = "No Imgae Available";
                }
                var vehicle_img = '';
                if(item.vehicle_img){
                    vehicle_img = $('<a>').attr({'href':'/uploads/gatein/'+item.vehicle_img, 'target':'_blank'}).text("View Image");
                }else{
                    vehicle_img = "No Imgae Available";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.container_no));
                row.append($('<td>').append(container_img));
                row.append($('<td>').append(item.container_size));
                row.append($('<td>').append(item.container_type));
                row.append($('<td>').append(item.vehicle_number));
                row.append($('<td>').append(vehicle_img));
                row.append($('<td>').append(item.driver_name));
                row.append($('<td>').append(item.contact_number));

                tbody.append(row);
                i++;
            });

            const paginationDiv = document.getElementById("pagination");
            paginationDiv.innerHTML = "";

            if (response.pagination.last_page > 1) {
                const startPage = Math.max(response.pagination.current_page - Math.floor(5 / 2), 1);
                const endPage = Math.min(startPage + 5 - 1, response.pagination.last_page);

                // Create the "Previous" button
                if (response.pagination.links.prev) {
                    var splitPrev = response.pagination.links.prev.split('=');
                    const prevLink = document.createElement("button");
                    prevLink.textContent = "Previous";
                    prevLink.className  = "pagination-btn prev";
                    prevLink.setAttribute("data-id", splitPrev[1]);
                    prevLink.href = response.pagination.links.prev;
                    prevLink.addEventListener("click", function() {
                        refreshTable(prevLink.getAttribute("data-id"))
                    });
                    paginationDiv.appendChild(prevLink);
                }

                // Create page links within the sliding window
                for (let page = startPage; page <= endPage; page++) {
                    var splitPage = response.pagination.links.all_pages[page].split('=');
                    if(splitPage[1] == response.pagination.current_page){
                        const pageLink = document.createElement("button");
                        pageLink.textContent = page;
                        pageLink.className  = "pagination-btn page active-btn";
                        pageLink.setAttribute("data-id", splitPage[1]);
                        pageLink.addEventListener("click", function() {
                            refreshTable(pageLink.getAttribute("data-id"))
                        });
                        paginationDiv.appendChild(pageLink);
                    }else{
                        const pageLink = document.createElement("button");
                        pageLink.textContent = page;
                        pageLink.className  = "pagination-btn page";
                        pageLink.setAttribute("data-id", splitPage[1]);
                        pageLink.addEventListener("click", function() {
                            refreshTable(pageLink.getAttribute("data-id"))
                        });
                        paginationDiv.appendChild(pageLink);
                    }
                    
                }

                // Create the "Next" button
                if (response.pagination.links.next) {
                    var splitNext = response.pagination.links.next.split('=');
                    const nextLink = document.createElement("button");
                    nextLink.textContent = "Next";
                    nextLink.className  = "pagination-btn next";
                    nextLink.setAttribute("data-id", splitNext[1]);

                    nextLink.addEventListener("click", function() {
                        refreshTable(nextLink.getAttribute("data-id"))
                    });
                    paginationDiv.appendChild(nextLink);
                }
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function validateInput(input) {
    input.style.color = 'black';
    document.getElementById('errorText').textContent = "";
    const inputField = document.getElementById('container_no');
    inputField.setAttribute('maxlength', '11');
    const inputValue = input.value;

    let checkFirstChar = isNaN(inputValue);
    if(checkFirstChar == false){
    document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
    inputField.setAttribute('maxlength', '1');
    input.style.color = 'red';
    }

    if(inputValue.length <= 4){
    const checkNumber = /\d/; // This regex matches any digit (0-9)
    let chechkNumberforstart =  checkNumber.test(inputValue);
    if(chechkNumberforstart){
        document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
        inputField.setAttribute('maxlength', inputValue.length);
        input.style.color = 'red';
    }
    }

    if(inputValue.length > 4){
        const part2 = inputValue.substring(4);
        let checkNumber = isNaN(part2);
        if(checkNumber == true){
            document.getElementById('errorText').textContent = 'Please Enter Valid Container Number ex: ABCD1234567';
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
        var container_no = $("#container_no").val();
        var container_type = $("#container_type").val();
        var container_size = $("#container_size").val();
        var driver_name = $("#driver_name").val();
        var vehicle_number = $("#vehicle_number").val();
        var contact_number   = $("#contact_number").val();



            var formData = new FormData();

            formData.append('container_no', container_no);
            formData.append('container_type', container_type);
            formData.append('container_size', container_size);
            formData.append('driver_name', driver_name);
            formData.append('vehicle_number', vehicle_number);
            formData.append('contact_number', contact_number);
     
            formData.append('user_id', user_id);
            formData.append('depo_id', depo_id);

            formData.append('container_img', $('#container_img')[0].files[0]);
            formData.append('vehicle_img', $('#vehicle_img')[0].files[0]);

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
                    refreshTable();
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
        container_type: {
            required: true,
        },
        container_size: {
            required: true,
        },
        driver_name: {
            required: true,
        },
        contact_number: {
            required: true,
        },

    },
    messages: {
        container_type: {
            required: "This Field Is Required!",
        },
        container_size: {
            required: "This Field Is Required!",
        },
        driver_name: {
            required: "This Field Is Required!",
        },
        contact_number: {
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