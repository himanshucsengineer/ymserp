@extends('common.layout')

@section('content')

<style>
.select2-container .select2-selection--single{
    height:38px !important;
}
.select2-container{
    z-index:100;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text">Create PTI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active text">Create PTI</li>
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
                        <form id="damageForm" novalidate="novalidate">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="party_name">Name Of The Party <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="party_name" name="party_name" placeholder="Enter Name Of The Party">
                                </div>
                                <div class="form-group">
                                    <label for="container_no">Container No <span style="color:red;">*</span></label>
                                    <select name="container_no" id="container_no" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="size_type">SIZE / TYPE <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="size_type" id="size_type" readonly placeholder="Enter Size / Type">
                                </div>

                                <div class="form-group">
                                    <label for="transporter_name">Name Of Transporter <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="transporter_name" id="transporter_name"  placeholder="Enter Name Of Transporter">
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_no">Vehicle No <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="vehicle_no" id="vehicle_no"  placeholder="Enter Vehicle No">
                                </div>
                                <div class="form-group">
                                    <label for="survey_place">Survey Place <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="survey_place" id="survey_place"  placeholder="Enter Survey Place">
                                </div>

                                <div class="form-group">
                                    <label for="survey_date">Survey Date <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="survey_date" value="<?php echo date('Y/m/d');?>" id="survey_date" readonly  placeholder="Enter Survey Date">
                                </div>

                                <div class="form-group">
                                    <label for="pti_date">PTI Date <span style="color:red;">*</span></label>
                                    <input type="date" class="form-control" name="pti_date" id="pti_date"  placeholder="Enter Survey Date">
                                </div>

                                <div class="form-group">
                                    <label for="set_temprature">Set Temprature <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="set_temprature" id="set_temprature"  placeholder="Enter Set Temprature">
                                </div>

                                <div class="form-group">
                                    <label for="partlow">Partlow Chart Present <span style="color:red;">*</span></label>
                                    <select name="partlow" id="partlow" class="form-control">
                                        <option value="">Select An Option</option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="length_460_cable">Length Of 460 Voltage Cable <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="length_460_cable" id="length_460_cable"  placeholder="Enter Length Of 460 Voltage Cable">
                                </div>

                                <div class="form-group">
                                    <label for="machine_checking">Machinery Checking Done <span style="color:red;">*</span></label>
                                    <select name="machine_checking" id="machine_checking" class="form-control">
                                        <option value="">Select An Option</option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
                                </div> 

                                <div class="form-group">
                                    <label for="supply_temp">Supply Temprature <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="supply_temp" id="supply_temp"  placeholder="Enter Supply Temprature">
                                </div>

                                <div class="form-group">
                                    <label for="return_temp">Return Temprature <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="return_temp" id="return_temp"  placeholder="Enter Return Temprature">
                                </div>

                                <div class="form-group">
                                    <label for="iso_plug">460 Volt + ISO Plug Safety Pin Cut<span style="color:red;">*</span></label>
                                    <select name="iso_plug" id="iso_plug" class="form-control">
                                        <option value="">Select An Option</option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
                                </div> 

                                <div class="form-group">
                                    <label for="container_fit">Container Is Fit For Loading<span style="color:red;">*</span></label>
                                    <select name="container_fit" id="container_fit" class="form-control">
                                        <option value="">Select An Option</option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
                                </div> 

                                <div class="form-group">
                                    <label for="washing_carrid">Washing Carried Out<span style="color:red;">*</span></label>
                                    <select name="washing_carrid" id="washing_carrid" class="form-control">
                                        <option value="">Select An Option</option>
                                        <option value="yes">YES</option>
                                        <option value="no">NO</option>
                                    </select>
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
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    refreshContainer()
    $('#container_no').on('change', function() {
        var checkToken = localStorage.getItem('token');
        var user_id = localStorage.getItem('user_id');
        var depo_id = localStorage.getItem('depo_id');
        var id = $(this).val();
        $.ajax({
            type: "post",
            url: "/api/gatein/getDataById",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data:{
                'user_id':user_id,
                'depo_id':depo_id,
                'id' : id
            },
            success: function (data) {
                var size_type = data.container_size + ' / ' + data.container_type
                $('#size_type').val(size_type);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

});
function refreshContainer(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.ajax({
        type: "post",
        url: "/api/gatein/getRefferContainer",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function (data) {
            processContainer(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function processContainer(transporters){
    var transformedData = transporters.map(function(item) {
        return {
            id: item.id,
            text: item.container_no
        };
    });

    var blankOption = { id: '', text: '' };
    transformedData.unshift(blankOption);

    $('#container_no').select2({
        placeholder: 'Select Container No',
        data: transformedData,
        escapeMarkup: function (markup) {
            return markup;
        },
        language: {
            noResults: function () {
                return '<center>No Result Found</center>';
            }
        }
    });
}



$(function () {

    var currentURL = window.location.href;
    var getCateId = currentURL.split('=');
    var checkToken = localStorage.getItem('token');

    if(getCateId[1]){
        $.ajax({
        type: "post",
        url: "/api/pti/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':getCateId[1]
        },
        success: function(response) {
            $('.text').text('Update PTI');
            $('#party_name').val(response.party_name);
            $('#container_no').val(response.container_no).trigger('change');
            $('#size_type').val(response.size_type);
            $('#transporter_name').val(response.transporter_name);
            $('#vehicle_no').val(response.vehicle_no);
            $('#survey_place').val(response.survey_place);
            $('#survey_date').val(response.survey_date);
            $('#pti_date').val(response.pti_date);
            $('#set_temprature').val(response.set_temprature);
            $('#partlow').val(response.partlow);
            $('#length_460_cable').val(response.length_460_cable);
            $('#machine_checking').val(response.machine_checking);
            $('#supply_temp').val(response.supply_temp);
            $('#return_temp').val(response.return_temp);
            $('#iso_plug').val(response.iso_plug);
            $('#container_fit').val(response.container_fit);
            $('#washing_carrid').val(response.washing_carrid);
        },
        error: function(error) {
            console.log(error);
        }
    });
    }

    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    $.validator.setDefaults({
    submitHandler: function () {
        var party_name = $('#party_name').val();
        var container_no = $('#container_no').val();
        var size_type = $('#size_type').val();
        var transporter_name =  $('#transporter_name').val();
        var vehicle_no = $('#vehicle_no').val();
        var survey_place = $('#survey_place').val();
        var survey_date = $('#survey_date').val();
        var pti_date = $('#pti_date').val();
        var set_temprature = $('#set_temprature').val();
        var partlow = $('#partlow').val();
        var length_460_cable = $('#length_460_cable').val();
        var machine_checking = $('#machine_checking').val();
        var supply_temp = $('#supply_temp').val();
        var return_temp = $('#return_temp').val();
        var iso_plug = $('#iso_plug').val();
        var container_fit = $('#container_fit').val();
        var washing_carrid = $('#washing_carrid').val();

        if(getCateId[1]){
            const data = {
                'party_name':party_name,
                'container_no':container_no,
                'size_type':size_type,
                'transporter_name':transporter_name,
                'vehicle_no':vehicle_no,
                'survey_place':survey_place,
                'survey_date':survey_date,
                'pti_date':pti_date,
                'set_temprature':set_temprature,
                'partlow':partlow,
                'length_460_cable':length_460_cable,
                'machine_checking':machine_checking,
                'supply_temp':supply_temp,
                'return_temp':return_temp,
                'iso_plug':iso_plug,
                'container_fit':container_fit,
                'washing_carrid':washing_carrid,
                'user_id':user_id,
                'depo_id':depo_id,
                'id':getCateId[1]
            }
            post('pti/update',data);
        }else{
            const data = {
                'party_name':party_name,
                'container_no':container_no,
                'size_type':size_type,
                'transporter_name':transporter_name,
                'vehicle_no':vehicle_no,
                'survey_place':survey_place,
                'survey_date':survey_date,
                'pti_date':pti_date,
                'set_temprature':set_temprature,
                'partlow':partlow,
                'length_460_cable':length_460_cable,
                'machine_checking':machine_checking,
                'supply_temp':supply_temp,
                'return_temp':return_temp,
                'iso_plug':iso_plug,
                'container_fit':container_fit,
                'washing_carrid':washing_carrid,
                'user_id':user_id,
                'depo_id':depo_id,
            }
            post('pti/create',data);
        }
        window.location = `/pti/all`
    }
  }); 

    $('#damageForm').validate({
    rules: {
        party_name: {
            required: true,
        },
        container_no: {
            required: true,
        },
        size_type: {
            required: true,
        },
        transporter_name: {
            required: true,
        },
        vehicle_no: {
            required: true,
        },
        survey_place: {
            required: true,
        },
        survey_date: {
            required: true,
        },
        pti_date: {
            required: true,
        },
        set_temprature: {
            required: true,
        },
        partlow: {
            required: true,
        },
        length_460_cable: {
            required: true,
        },
        machine_checking: {
            required: true,
        },
        supply_temp: {
            required: true,
        },
        return_temp: {
            required: true,
        },
        iso_plug: {
            required: true,
        },
        container_fit: {
            required: true,
        },
        washing_carrid: {
            required: true,
        }
    },
    messages: {
        code: {
            required: "Please select employee",
        },
        desc: {
            required: "Please select Role",
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