@extends('common.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Tarrif</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Tarrif</li>
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
                        <form id="tarrifForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="line_id">Line <span style="color:red;">*</span></label>
                                    <select name="line_id" id="line_id" class="form-control">
                                        <option value="">Select Line</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="component_code">Component Code <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="component_code" name="component_code" placeholder="Enter Component Code">
                                </div>
                                <div class="form-group">
                                    <label for="repai_location_code">Location Code <span style="color:red;">*</span></label>
                                    <select name="repai_location_code" id="repai_location_code" class="form-control">
                                        <option value="">Select Location Code</option>
                                        <option value="RH1X">RH1X</option>
                                        <option value="RX1N">RX1N</option>
                                        <option value="RX6N">RX6N</option>
                                        <option value="RB1X">RB1X</option>
                                        <option value="RX2N">RX2N</option>
                                        <option value="RX7N">RX7N</option>
                                        <option value="RB2X">RB2X</option>
                                        <option value="RX3N">RX3N</option>
                                        <option value="RX8N">RX8N</option>
                                        <option value="RX4N">RX4N</option>
                                        <option value="RX9N">RX9N</option>
                                        <option value="RB3X">RB3X</option>
                                        <option value="RH2X">RH2X</option>
                                        <option value="RX5N">RX5N</option>
                                        <option value="RX0N">RX0N</option>
                                        <option value="RB4X">RB4X</option>
                                        <option value="LH1X">LH1X</option>
                                        <option value="LX1N">LX1N</option>
                                        <option value="LX6N">LX6N</option>
                                        <option value="LB1X">LB1X</option>
                                        <option value="LX2N">LX2N</option>
                                        <option value="LX7N">LX7N</option>
                                        <option value="LB2X">LB2X</option>
                                        <option value="LX3N">LX3N</option>
                                        <option value="LX8N">LX8N</option>
                                        <option value="LX4N">LX4N</option>
                                        <option value="LX9N">LX9N</option>
                                        <option value="LB3X">LB3X</option>
                                        <option value="LH2X">LH2X</option>
                                        <option value="LX5N">LX5N</option>
                                        <option value="LX0N">LX0N</option>
                                        <option value="LB4X">LB4X</option>

                                        <option value="TH1X">TH1X</option>
                                        <option value="TX1N">TX1N</option>
                                        <option value="TX6N">TX6N</option>
                                        <option value="TB1X">TB1X</option>
                                        <option value="TX2N">TX2N</option>
                                        <option value="TX7N">TX7N</option>
                                        <option value="TX3N">TX3N</option>
                                        <option value="TX8N">TX8N</option>
                                        <option value="TX4N">TX4N</option>
                                        <option value="TX9N">TX9N</option>
                                        <option value="TH2X">TH2X</option>
                                        <option value="TX5N">TX5N</option>
                                        <option value="TX0N">TX0N</option>
                                        <option value="TB2X">TB2X</option>
                                        <option value="BH1X">BH1X</option>
                                        <option value="BX1N">BX1N</option>
                                        <option value="BX6N">BX6N</option>
                                        <option value="BB1X">BB1X</option>
                                        <option value="BX2N">BX2N</option>
                                        <option value="BX7N">BX7N</option>
                                        <option value="BX3N">BX3N</option>
                                        <option value="BX8N">BX8N</option>
                                        <option value="BX4N">BX4N</option>
                                        <option value="BX9N">BX9N</option>
                                        <option value="BH2X">BH2X</option>
                                        <option value="BX5N">BX5N</option>
                                        <option value="BX0N">BX0N</option>
                                        <option value="BB2X">BB2X</option>
                                        <option value="FH1X">FH1X</option>
                                        <option value="FB1X">FB1X</option>
                                        <option value="FH2X">FH2X</option>
                                        <option value="FB2X">FB2X</option>
                                        <option value="FX1N">FX1N</option>
                                        <option value="FX3N">FX3N</option>
                                        <option value="FX2N">FX2N</option>
                                        <option value="FX4N">FX4N</option>
                                        <option value="DH1X">DH1X</option>
                                        <option value="DB1X">DB1X</option>
                                        <option value="DH2X">DH2X</option>
                                        <option value="DB2X">DB2X</option>
                                        <option value="DX1N">DX1N</option>
                                        <option value="DX3N">DX3N</option>
                                        <option value="DX2N">DX2N</option>
                                        <option value="DX4N">DX4N</option>
                                       
                                    </select>
                        
                                </div>
                                <div class="form-group">
                                    <label for="damade_id">Demage Code <span style="color:red;">*</span></label>
                                    <select name="damade_id" id="damade_id" class="form-control">
                                        <option value="">Select Demage Code</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="repair_id">Repair Code  <span style="color:red;">*</span></label>
                                    <select name="repair_id" id="repair_id" class="form-control">
                                        <option value="">Select Repair Code</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="material_id">Material Code <span style="color:red;">*</span></label>
                                    <select name="material_id" class="form-control" id="material_id">
                                        <option value="">Select Material Code</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="desc">Description <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter Description">
                                </div>

                                <div class="form-group">
                                    <label for="unit_of_measure">Unit Of Measurement <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="unit_of_measure" name="unit_of_measure" placeholder="Enter Unit Of Measurement">
                                </div>

                                <div class="form-group">
                                    <label for="dimension_l">Dimension L <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="dimension_l" name="dimension_l" placeholder="Enter Dimension L">
                                </div>

                                <div class="form-group">
                                    <label for="dimension_w">Dimension W  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="dimension_w" name="dimension_w" placeholder="Enter Dimension W">
                                </div>

                                <div class="form-group">
                                    <label for="dimension_h">Dimension H <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="dimension_h" name="dimension_h" placeholder="Enter Dimension H">
                                </div>

                                <div class="form-group">
                                    <label for="qty">Quantity <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Quantity">
                                </div>
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

                                <div class="form-group">
                                    <label for="labour_hour">Labour Hour <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="labour_hour" name="labour_hour" placeholder="Enter Labour Hour">
                                </div>

                                <div class="form-group">
                                    <label for="labour_cost">Labour Cost <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="labour_cost" name="labour_cost" placeholder="Enter Labour Cost">
                                </div>

                                <div class="form-group">
                                    <label for="material_cost">Material Cost <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="material_cost" name="material_cost" placeholder="Enter Material Cost">
                                </div>
                                <div class="form-group">
                                    <label for="tax">Tax  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="tax" name="tax" placeholder="Enter Tax">
                                </div>
                                <div class="form-group">
                                    <label for="tax_cost">Tax Cost  <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="tax_cost" name="tax_cost" placeholder="Enter Tax Cost ">
                                </div>
                                <div class="form-group">
                                    <label for="total_cost">Total Cost <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="total_cost" name="total_cost" placeholder="Enter Total Cost">
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
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "GET",
        url: "/api/line/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
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

    $.ajax({
        type: "GET",
        url: "/api/damage/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
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
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.validator.setDefaults({
    submitHandler: function () {
        var line_id = $("#line_id").val();
        var damade_id = $("#damade_id").val();
        var repair_id = $("#repair_id").val();
        var material_id = $("#material_id").val();

        var repai_location_code = $("#repai_location_code").val();
        var unit_of_measure = $("#unit_of_measure").val();
        var dimension_l = $("#dimension_l").val();
        var dimension_w = $("#dimension_w").val();

        var dimension_h = $("#dimension_h").val();
        var labour_hour = $("#labour_hour").val();
        var labour_cost = $("#labour_cost").val();
        var material_cost = $("#material_cost").val();

        var tax = $("#tax").val();
        var tax_cost = $("#tax_cost").val();
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
                'tax_cost':tax_cost,
                'total_cost':total_cost,
                'user_id':user_id,
                'depo_id':depo_id,
                'component_code':component_code,
                'desc':desc,
                'qty':qty,
                'repair_type':repair_type

            }

            post('tarrif/create',data);
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

        tax: {
            required: true,
        },
        tax_cost: {
            required: true,
        },
        total_cost: {
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
        }
    },
    messages: {
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
        tax_cost: {
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