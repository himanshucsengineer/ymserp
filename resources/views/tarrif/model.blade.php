<style>
#image-container {
    position: relative;
}

.hotspot {
position: absolute;
background-color: red;
width: 10px;
height: 10px;
border-radius: 50%;
cursor: pointer;
}
.select2-container .select2-selection--single{
    height:38px !important;
}
.select2-container{
    z-index:1601;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form id="tarrifForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Container Type <span style="color:red;">*</span></label>
                                            <select class="form-control" id="containerType" name="containerType">
                                            <option value="">Select Container Type</option>
                                            <option value="DRY">DRY</option>
                                            <option value="REEFER">REEFER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Container Size <span style="color:red;">*</span></label>
                                            <select class="form-control" id="containerSize" name="containerSize" >
                                            <option value="">Select Container Size</option>
                                            <option value="20">20</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="line_id">Line <span style="color:red;">*</span></label>
                                            <select name="line_id" id="line_id" class="form-control">
                                                <option value="">Select Line</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="component_code">Component Code <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="component_code" name="component_code" placeholder="Enter Component Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="repai_location_code">Location Code <span style="color:red;">*</span></label>
                                            <select name="repai_location_code" id="repai_location_code" class="form-control select2">
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="container_side">Container Side <span style="color:red;">*</span></label>
                                            <select name="container_side" id="container_side" class="form-control">
                                                <option value="">Select Container Side</option>
                                                <option value="right">Right</option>
                                                <option value="left">Left</option>
                                                <option value="top">Top</option>
                                                <option value="bottom">Bottom</option>
                                                <option value="front">Front</option>
                                                <option value="door">Door</option>
                                                <option value="interior">Interior</option>
                                                <option value="under">Under</option>
                                                <option value="roof">Roof</option>
                                                <option value="floor">Floor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="damade_id">Demage Code <span style="color:red;">*</span></label>
                                            <select name="damade_id" id="damade_id" class="form-control">
                                                <option value="">Select Demage Code</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="repair_id">Repair Code  <span style="color:red;">*</span></label>
                                            <select name="repair_id" id="repair_id" class="form-control">
                                                <option value="">Select Repair Code</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="material_id">Material Code <span style="color:red;">*</span></label>
                                            <select name="material_id" class="form-control" id="material_id">
                                                <option value="">Select Material Code</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desc">Description <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter Description">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unit_of_measure">Unit Of Measurement <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="unit_of_measure" name="unit_of_measure" placeholder="Enter Unit Of Measurement">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dimension_l">Dimension L <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="dimension_l" name="dimension_l" placeholder="Enter Dimension L">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dimension_w">Dimension W  <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="dimension_w" name="dimension_w" placeholder="Enter Dimension W">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dimension_h">Dimension H <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="dimension_h" name="dimension_h" placeholder="Enter Dimension H">
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="qty">Quantity <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="repair_type">Repair Type <span style="color:red;">*</span></label>
                                            <select name="repair_type" id="repair_type" class="form-control">
                                                <option value="">Please Select Repair Type</option>
                                                <option value="repair">Repair</option>
                                                <option value="pti">PTI</option>
                                                <option value="washing">Washing</option>
                                                <option value="decabling">decabling</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="labour_hour">Labour Hour <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="labour_hour" name="labour_hour" placeholder="Enter Labour Hour">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="labour_cost">Labour Cost <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="labour_cost" name="labour_cost" placeholder="Enter Labour Cost">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="material_cost">Material Cost <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="material_cost" name="material_cost" placeholder="Enter Material Cost">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_total">Sub Total  <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="sub_total" name="sub_total" readonly placeholder="">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="tax">Tax (in percentage without %)  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="tax" name="tax" placeholder="Enter Tax Percentage">
                                </div>
                                <div class="form-group">
                                    <label for="tax_cost">Tax Cost <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="tax_cost" name="tax_cost" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="total_cost">Total Cost <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" readonly id="total_cost" name="total_cost" placeholder="Enter Total Cost">
                                </div>
                                <input type="hidden" id="hotspot_coor_x">
                                <input type="hidden" id="hotspot_coor_y">

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

$(document).ready(function () {
    refreshLocation()
});

$('#containerSize').on('change',function(){
    var containerType = $('#containerType').val();
    var containerSize = $(this).val();
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    if(containerType == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Container Type</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    if(containerType != '' && containerSize != ''){
        $.ajax({
            type: "post",
            url: "/api/line/getbysizetype",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
                'containerType':containerType,
                'containerSize':containerSize
            },
            success: function (data) {
                $('#line_id').empty();

                var select = document.getElementById('line_id');
                data.forEach(function(item) {
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.text = item.name;
                    select.appendChild(option);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
})


function refreshLocation(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var location_codes  = "";

    $.ajax({
        type: "post",
        url: "/api/location/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            console.log(data);
            location_codes = data;
            processLocationCodes(location_codes);
        },
        error: function (error) {
            console.log(error);
        }
    });
}


function processLocationCodes(location_codes){

    var transformedData = location_codes.map(function(item) {
        return {
            id: item.id,
            text: item.code
        };
    });

    var blankOption = { id: '', text: '' };
    transformedData.unshift(blankOption);

    $('#repai_location_code').select2({
        placeholder: 'Select Location Code',
        data: transformedData,
        escapeMarkup: function (markup) {
            return markup;
        },
        language: {
            noResults: function () {
                return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="locationCode()">Add New</button></center>';
            }
        }
    });
}

function locationCode(){
    var select2Instance = $('#repai_location_code').data('select2');
    if (select2Instance) {
        select2Instance.destroy();
    }
    $('#modal-location').modal('show');
}

$(document).ready(function () {
    const imageContainer = document.getElementById('image-container');
    const image = document.getElementById('image');
    imageContainer.addEventListener('click', (e) => {
        const x = e.clientX - image.getBoundingClientRect().left;
        const y = e.clientY - image.getBoundingClientRect().top;
        createHotspot(x, y);
    });

    function createHotspot(x, y) {
        const hotspotDiv = document.createElement('div');
        hotspotDiv.className = 'hotspot';

        const containerRect = imageContainer.getBoundingClientRect();
        const topPercent = ((y - containerRect.top) / containerRect.height) * 100;
        const leftPercent = ((x - containerRect.left) / containerRect.width) * 100;


        hotspotDiv.style.top = topPercent + '%';
        hotspotDiv.style.left = leftPercent + '%';
        
        imageContainer.appendChild(hotspotDiv);

        $('#hotspot_coor_x').val(leftPercent);
        $('#hotspot_coor_y').val(topPercent);
        $('#container_side').attr('disabled', true);
        $('#modal-hotspot').modal('hide');
    }


});

$('#container_side').on('change', function (){

    var side = $(this).val();
    var line_id = $('#line_id').val();

    if(!line_id){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Select Line Name First</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }else{
        $.ajax({
        type: "post",
        url: "/api/line/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':line_id
        },
        success: function (data) {
            var imageUrl = '';
            if(side == "right"){
                imageUrl = '/uploads/line/' + data.right_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "left"){
                imageUrl = '/uploads/line/' + data.left_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "top"){
                imageUrl = '/uploads/line/' + data.top_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "bottom"){
                imageUrl = '/uploads/line/' + data.bottom_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "front"){
                imageUrl = '/uploads/line/' + data.front_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "door"){
                imageUrl = '/uploads/line/' + data.door_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "interior"){
                imageUrl = '/uploads/line/' + data.interior_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "under"){
                imageUrl = '/uploads/line/' + data.under_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "roof"){
                imageUrl = '/uploads/line/' + data.roof_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else if(side == "floor"){
                imageUrl = '/uploads/line/' + data.floor_img;
                $('#image').attr('src', imageUrl);
                $('#modal-hotspot').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }else{
                var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Please Choose Correct Option</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
    }

});

$(document).ready(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');


    $('#labour_cost, #material_cost,#tax').on('keyup', function() {
        var material_cost = $('#material_cost').val();
        var labour_cost = $('#labour_cost').val();
        var tax = $('#tax').val();
        var sub_total = parseInt(labour_cost) + parseInt(material_cost);

        $('#sub_total').val(parseFloat(sub_total.toFixed(2)));
        var tax_cost =  (parseInt(tax) / 100 ) * sub_total;
        $('#tax_cost').val(parseFloat(tax_cost.toFixed(2)));
        var total = tax_cost + sub_total;
        $('#total_cost').val(parseFloat(total.toFixed(2)));
    });


    

    $.ajax({
        type: "post",
        url: "/api/damage/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            var select = document.getElementById('damade_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.code;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#damade_id').change(function() {
        var inputValue = $(this).val();

        $.ajax({
        type: "POST",
        url: "/api/repair/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':inputValue
        },
        success: function (data) {
            $("#repair_id").empty();
            var select1 = document.getElementById('repair_id');
            var option1 = document.createElement('option');
            option1.value = "";
            option1.text = "Please Select Repair Code";
            select1.appendChild(option1);
            var select = document.getElementById('repair_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.repair_code;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    });

    $('#repair_id').change(function() {
        var repair_id = $(this).val();
        var damage_id = $('#damade_id').val();

        $.ajax({
        type: "POST",
        url: "/api/material/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'repair_id':repair_id,
            'damage_id':damage_id
        },
        success: function (data) {
            $("#material_id").empty(); 

            var select1 = document.getElementById('material_id');
            var option1 = document.createElement('option');
            option1.value = "";
            option1.text = "Please Select Material Code";
            select1.appendChild(option1);
      

            var select = document.getElementById('material_id');
            data.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.id;
                option.text = item.material_code;
                select.appendChild(option);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

    });
});

$(function () {
    var checkToken = localStorage.getItem('token');

    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var line_id = $("#line_id").val();
        var damade_id = $("#damade_id").val();
        var repair_id = $("#repair_id").val();
        var material_id = $("#material_id").val();
        var container_side = $("#container_side").val();
        var hotspot_coor_x = $("#hotspot_coor_x").val();
        var hotspot_coor_y = $("#hotspot_coor_y").val();
        var repai_location_code = $("#repai_location_code").val();
        var unit_of_measure = $("#unit_of_measure").val();
        var dimension_l = $("#dimension_l").val();
        var dimension_w = $("#dimension_w").val();
        var dimension_h = $("#dimension_h").val();
        var labour_hour = $("#labour_hour").val();
        var labour_cost = $("#labour_cost").val();
        var material_cost = $("#material_cost").val();
        var tax = $("#tax").val();
        var sub_total = $("#sub_total").val();
        var tax_cost = $('#tax_cost').val();
        var total_cost = $("#total_cost").val();
        var component_code = $("#component_code").val();
        var desc = $("#desc").val();
        var qty = $("#qty").val();
        var repair_type = $('#repair_type').val();

        const data = {
            'line_id':line_id,
            'damade_id':damade_id,
            'repair_id':repair_id,
            'material_id':material_id,
            'repai_location_code':repai_location_code,
            'unit_of_measure':unit_of_measure,
            'dimension_l':dimension_l,
            'dimension_w':dimension_w,
            'dimension_h':dimension_h,
            'labour_hour':labour_hour,
            'labour_cost':labour_cost,
            'material_cost':material_cost,
            'tax':tax,
            'sub_total':sub_total,
            'tax_cost':tax_cost,
            'total_cost':total_cost,
            'user_id':user_id,
            'depo_id':depo_id,
            'component_code':component_code,
            'desc':desc,
            'qty':qty,
            'repair_type':repair_type,
            'hotspot_coor_y':hotspot_coor_y,
            'hotspot_coor_x':hotspot_coor_x,
            'container_side':container_side

        }
        post('tarrif/create',data);
        
        window.reload();
            
    }
  });

    $('#tarrifForm').validate({
    rules: {
        line_id: {
            required: true,
        },
        damade_id: {
            required: true,
        },
        repair_id: {
            required: true,
        },
        material_id: {
            required: true,
        },

        repai_location_code: {
            required: true,
        },
        unit_of_measure: {
            required: true,
        },
        dimension_l: {
            required: true,
        },
        dimension_w: {
            required: true,
        },

        dimension_h: {
            required: true,
        },
        labour_hour: {
            required: true,
        },
        labour_cost: {
            required: true,
        },
        material_cost: {
            required: true,
        },
        tax_cost:{
            required:true,
        },

        tax: {
            required: true,
        },
        tax_cost: {
            required: true,
        },
        sub_total: {
            required: true,
        },
        component_code: {
            required: true,
        },
        desc: {
            required: true,
        },
        qty: {
            required: true,
        },
        repair_type: {
            required: true,
        },
        container_side:{
            required: true,
        }
    },
    messages: {
        tax_cost:{
            required:"This Field Is Required",
        },
        line_id: {
            required: "This Field is required",
        },
        damade_id: {
            required: "This Field is required",
        },
        repair_id: {
            required: "This Field is required",
        },
        material_id: {
            required: "This Field is required",
        },

        repai_location_code: {
            required: "This Field is required",
        },
        unit_of_measure: {
            required: "This Field is required",
        },
        dimension_l: {
            required: "This Field is required",
        },
        dimension_w: {
            required: "This Field is required",
        },

        dimension_h: {
            required: "This Field is required",
        },
        labour_hour: {
            required: "This Field is required",
        },
        labour_cost: {
            required: "This Field is required",
        },
        material_cost: {
            required: "This Field is required",
        },

        tax: {
            required: "This Field is required",
        },
        sub_total: {
            required: "This Field is required",
        },
        total_cost: {
            required: "This Field is required",
        },
        component_code: {
            required: "This Field is required",
        },
        desc: {
            required: "This Field is required",
        },
        qty: {
            required: "This Field is required",
        },
        repair_type: {
            required: "This Field is required",
        },
        container_side:{
            required: "This Field is required",
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

function createLocation(e){
    // e.preventDefault();
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var code   = $('#lo_code').val();
    var desc   = $('#desc').val();

    if(code == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Location Code Is Required</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    const data = {
                'code':code,
                'desc':desc,
                'user_id':user_id,
                'depo_id':depo_id,
        }
    post('location/create',data);
    refreshLocation()
    $('#modal-location').modal('hide');
}
</script>




<div class="modal fade" id="modal-hotspot">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Hotspot</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div id="image-container">
                            <center><img id="image" src="" style="width:100%" alt="Image" /></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-location">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Location Code</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Location Code <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="lo_code" name="code" placeholder="Enter Location Code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" class="form-control" id="lo_desc" name="desc" placeholder="Enter Description">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="createLocation()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>