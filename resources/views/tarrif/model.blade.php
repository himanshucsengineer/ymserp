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
                                            <label for="component_codee">Component Code <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="component_codee" name="component_codee" placeholder="Enter Component Code">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="damade_ide">Demage Code <span style="color:red;">*</span></label>
                                            <select name="damade_ide" id="damade_ide" class="form-control">
                                                <option value="">Select Demage Code</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="repair_ide">Repair Code  <span style="color:red;">*</span></label>
                                            <select name="repair_ide" id="repair_ide" class="form-control">
                                                <option value="">Select Repair Code</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="material_ide">Material Code <span style="color:red;">*</span></label>
                                            <select name="material_ide" class="form-control" id="material_ide">
                                                <option value="">Select Material Code</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desce">Description <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="desce" name="desce" placeholder="Enter Description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unit_of_measuree">Unit Of Measurement <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="unit_of_measuree" name="unit_of_measuree" placeholder="Enter Unit Of Measurement">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dimension_le">Dimension L <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="dimension_le" name="dimension_le" placeholder="Enter Dimension L">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dimension_we">Dimension W  <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="dimension_we" name="dimension_we" placeholder="Enter Dimension W">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dimension_he">Dimension H <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="dimension_he" name="dimension_he" placeholder="Enter Dimension H">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="qtye">Quantity <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="qtye" name="qtye" placeholder="Enter Quantity">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="repair_typee">Repair Type <span style="color:red;">*</span></label>
                                            <select name="repair_typee" id="repair_typee" class="form-control">
                                                <option value="">Please Select Repair Type</option>
                                                <option value="repair">Repair</option>
                                                <option value="pti">PTI</option>
                                                <option value="washing">Washing</option>
                                                <option value="decabling">decabling</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="labour_houre">Labour Hour <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="labour_houre" name="labour_houre" placeholder="Enter Labour Hour">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="labour_coste">Labour Cost <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="labour_coste" name="labour_coste" placeholder="Enter Labour Cost">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="material_coste">Material Cost <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="material_coste" name="material_coste" placeholder="Enter Material Cost">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_totale">Sub Total  <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="sub_totale" name="sub_totale" readonly placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="taxe">Tax (in percentage without %)  <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="taxe" name="taxe" placeholder="Enter Tax Percentage">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tax_coste">Tax Cost <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" readonly id="tax_coste" name="tax_coste" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_coste">Total Cost <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" readonly id="total_coste" name="total_coste" placeholder="Enter Total Cost">
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

$(document).ready(function () {
    refreshDamage()
});




function refreshDamage(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var location_codes  = "";

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
            processDamageCodes(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}


function processDamageCodes(data){

    var transformedData = data.map(function(item) {
        return {
            id: item.id,
            text: item.code
        };
    });

    var blankOption = { id: '', text: '' };
    transformedData.unshift(blankOption);

    $('#damade_ide').select2({
        placeholder: 'Select Damage Code',
        data: transformedData,
        escapeMarkup: function (markup) {
            return markup;
        },
        language: {
            noResults: function () {
                return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="damageCode()">Add New</button></center>';
            }
        }
    });
}

function damageCode(){
    var select2Instance = $('#damade_ide').data('select2');
    if (select2Instance) {
        select2Instance.destroy();
    }
    $('#modal-damage').modal('show');
}


function refreshRepair(inputValue){
    var checkToken = localStorage.getItem('token');
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
            processRepairCodes(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function processRepairCodes(data){

    var transformedData = data.map(function(item) {
        return {
            id: item.id,
            text: item.repair_code
        };
    });

    var blankOption = { id: '', text: '' };
    transformedData.unshift(blankOption);

    $('#repair_ide').select2({
        placeholder: 'Select Repair Code',
        data: transformedData,
        escapeMarkup: function (markup) {
            return markup;
        },
        language: {
            noResults: function () {
                return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="repairsCode()">Add New</button></center>';
            }
        }
    });
}
function repairsCode(){
    var select2Instance = $('#repair_ide').data('select2');
    if (select2Instance) {
        select2Instance.destroy();
    }
    $('#modal-repair').modal('show');
}


function refreshMaterial(repair_id,damage_id){
    var checkToken = localStorage.getItem('token');

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
            processMaterialCodes(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function processMaterialCodes(data){

    var transformedData = data.map(function(item) {
        return {
            id: item.id,
            text: item.material_code
        };
    });

    var blankOption = { id: '', text: '' };
    transformedData.unshift(blankOption);

    $('#material_ide').select2({
        placeholder: 'Select Material Code',
        data: transformedData,
        escapeMarkup: function (markup) {
            return markup;
        },
        language: {
            noResults: function () {
                return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="repairsMaterial()">Add New</button></center>';
            }
        }
    });
}
function repairsMaterial(){
    var select2Instance = $('#material_ide').data('select2');
    if (select2Instance) {
        select2Instance.destroy();
    }
    $('#modal-material').modal('show');
}

$(document).ready(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $('#labour_coste, #material_coste,#taxe').on('keyup', function() {
        var material_cost = $('#material_coste').val();
        var labour_cost = $('#labour_coste').val();
        var tax = $('#taxe').val();
        var sub_total = parseInt(labour_cost) + parseInt(material_cost);

        $('#sub_totale').val(parseFloat(sub_total.toFixed(2)));
        var tax_cost =  (parseInt(tax) / 100 ) * sub_total;
        $('#tax_coste').val(parseFloat(tax_cost.toFixed(2)));
        var total = tax_cost + sub_total;
        $('#total_coste').val(parseFloat(total.toFixed(2)));
    });

    $('#damade_ide').change(function() {
        var inputValue = $(this).val();
        refreshRepair(inputValue);

    });

    $('#repair_ide').change(function() {
        var repair_id = $(this).val();
        var damage_id = $('#damade_ide').val();
        refreshMaterial(repair_id, damage_id);

    });
});

$(function () {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var line_id = $('#line_id_no').val();
        var damade_id = $("#damade_ide").val();
        var repair_id = $("#repair_ide").val();
        var material_id = $("#material_ide").val();

        var container_side = $("#container_side").val();
        var hotspot_coor_x = $("#hotspot_coor_x").val();
        var hotspot_coor_y = $("#hotspot_coor_y").val();
        var repai_location_code = $("#location_code_id").val();

        var unit_of_measure = $("#unit_of_measuree").val();
        var dimension_l = $("#dimension_le").val();
        var dimension_w = $("#dimension_we").val();
        var dimension_h = $("#dimension_he").val();
        var labour_hour = $("#labour_houre").val();
        var labour_cost = $("#labour_coste").val();
        var material_cost = $("#material_coste").val();
        var tax = $("#taxe").val();
        var sub_total = $("#sub_totale").val();
        var tax_cost = $('#tax_coste').val();
        var total_cost = $("#total_coste").val();
        var component_code = $("#component_codee").val();
        var desc = $("#desce").val();
        var qty = $("#qtye").val();
        var repair_type = $('#repair_typee').val();

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
            'custom_check':1,
        }

        post('tarrif/create',data);
        
        location.reload();
            
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

function createDamage(e){
    // e.preventDefault();
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var code   = $('#damage_codee').val();
    var desc   = $('#damage_desc').val();

    if(code == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Damage Code Is Required</p></div>`;
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
    post('damage/create',data);
    refreshDamage()
    $('#modal-damage').modal('hide');
}

function createRepair(e) {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var repair_code   = $('#repair_codee').val();
    var damage_id   = $('#damade_ide').val();
    var desc   = $('#repair_desc').val();

    if(repair_code == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Repair Code Is Required</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    const data = {
                'repair_code':repair_code,
                'damage_id':damage_id,
                'desc':desc,
                'user_id':user_id,
                'depo_id':depo_id,
        }
    post('repair/create',data);
    refreshRepair(damage_id)
    $('#modal-repair').modal('hide');
}

function createMaterial(e) {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var material_code   = $('#material_codee').val();
    var repair_id   = $('#repair_ide').val();
    var damage_id   = $('#damade_ide').val();
    var desc   = $('#material_desc').val();

    if(material_code == ''){
        var callout = document.createElement('div');
            callout.innerHTML = `<div class="callout callout-danger"><p style="font-size:13px;">Material Code Is Required</p></div>`;
            document.getElementById('apiMessages').appendChild(callout);
            setTimeout(function() {
                callout.remove();
            }, 2000);
    }

    const data = {
                'material_code':material_code,
                'damage_id':damage_id,
                'repiar_id':repair_id,
                'desc':desc,
                'user_id':user_id,
                'depo_id':depo_id,
        }
    post('material/create',data);
    refreshMaterial(repair_id,damage_id)
    $('#modal-material').modal('hide');
}
</script>



<div class="modal fade" id="modal-damage">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Damage Code</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="damage_codee">Damage Code <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="damage_codee" name="damage_codee" placeholder="Enter Damage Code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="damage_desc">Description</label>
                            <input type="text" class="form-control" id="damage_desc" name="damage_desc" placeholder="Enter Description">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="createDamage()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-repair">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Repair Code</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="repair_codee">Repair Code <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="repair_codee" name="repair_codee" placeholder="Enter Repair Code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="repair_desc">Description</label>
                            <input type="text" class="form-control" id="repair_desc" name="repair_desc" placeholder="Enter Description">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="createRepair()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-material">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Material Code</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="material_codee">Material Code <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="material_codee" name="material_codee" placeholder="Enter Material Code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="material_desc">Description</label>
                            <input type="text" class="form-control" id="material_desc" name="material_desc" placeholder="Enter Description">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="createMaterial()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>