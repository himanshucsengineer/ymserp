<?php $currentUrl = url()->full(); 
    $breakurl = explode('=',$currentUrl);
    $getid = explode('&',$breakurl[1]);
    if(isset($breakurl[2])){
        $checkSupervisor = 1;
    }else{
        $checkSupervisor = 0;
    }
?>

@extends('common.layout')

@section('content')

<style>
#right {
    position: relative;
}

.reportinput {
    width: 100px !important;
}

#transaction_total,
#transaction_sub_total,
#transaction_tax,
#transaction_tax_cost,
#transaction_material_cost,
#transaction_labour_hr,
#transaction_labour_cost {
    width: 100px !important;
}

.hidden {
    display: none;
}

.card-primary.card-outline {
    border-top: 3px solid #63bf84;
}

.nav-tabs .nav-item.show .nav-link,
.nav-tabs .nav-link.active {
    color: #63bf84;
}

.image-container {
    position: relative;
    display: inline-block;
    margin: 20px;
}

.hotspot {
    position: absolute;
    cursor: pointer;
    width: 10px;
    height: 10px;
}

.circle img,
.circle {
    width: 30px;
    height: 30px;
    border-radius: 320px;
    display: inline-block;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -ms-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear;
    background-color: #dc354594;
}



.icon .circle,
.icon .circle img {
    width: 80px;
    height: 80px;

}

.circle {
    background: #dc354594;
}

.circle.small {
    -webkit-transform: scale(.7);
    -moz-transform: scale(.7);
    transform: scale(.7);

}

@-moz-keyframes shake {
    0% {
        -moz-transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        -moz-transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        -moz-transform: translate(-3px, 0px) rotate(1deg);
    }

    30% {
        -moz-transform: translate(0px, 2px) rotate(0deg);
    }

    40% {
        -moz-transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        -moz-transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        -moz-transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        -moz-transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        -moz-transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        -moz-transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        -moz-transform: translate(1px, -2px) rotate(-1deg);
    }
}

@-webkit-keyframes shake {
    0% {
        -webkit-transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        -webkit-transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        -webkit-transform: translate(-3px, 0px) rotate(1deg);
    }

    30% {
        -webkit-transform: translate(0px, 2px) rotate(0deg);
    }

    40% {
        -webkit-transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        -webkit-transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        -webkit-transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        -webkit-transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        -webkit-transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        -webkit-transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        -webkit-transform: translate(1px, -2px) rotate(-1deg);
    }
}


@keyframes shake {
    0% {
        transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        transform: translate(-3px, 0px) rotate(1deg);
    }

    30% {
        transform: translate(0px, 2px) rotate(0deg);
    }

    40% {
        transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        transform: translate(1px, -2px) rotate(-1deg);
    }
}

a.open:hover .circle {
    -webkit-animation-name: shake;
    -webkit-animation-duration: 0.8s;
    -webkit-transform-origin: 50% 50%;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;

    -moz-animation-name: shake;
    -moz-animation-duration: 0.8s;
    -moz-transform-origin: 50% 50%;
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: linear;

}

a.open .circle img {
    opacity: 0;
}

.current a.open .circle img,
a.open:hover .circle img {
    opacity: 1;
}

.box {
    text-align: center;
    width: 19.9%;
    margin: 0;
    float: left;
    margin-bottom: 5px;
    box-sizing: content-box;
}

.flex_btn{
    width:100%;
    height:auto;
    display: flex;
    flex-wrap: wrap;
}
.flex_btn .card{
    width: 14.28%;
    padding: 0.2rem;
    background-color: transparent;
    border: none;
    box-shadow: none;
    margin: 0px;
}
.select2-container .select2-selection--single{
    height:38px !important;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Container Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Container Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="text-transform:uppercase; text-align:center">SIDE: <span
                            id="right_side">RIGHT</span><span id="left_side">LEFT</span><span
                            id="top_side">TOP</span><span id="bottom_side">BOTTOM</span><span
                            id="front_side">FRONT</span><span id="door_side">DOOR</span><span
                            id="internal_side">INTERNAL</span><span
                            id="under_side">UNDER STRUCTURE</span><span
                            id="roof_side">ROOF</span><span
                            id="floor_side">FLOOR</span> | Container Number: <span class="container_no"></span> |
                        MFG DATE: <span class="mfg_date"></span></h4>
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                        aria-selected="true">DAMAGE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-three-profile" role="tab"
                                        aria-controls="custom-tabs-three-profile" aria-selected="false">DETAILS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" 
                                        href="https://help18.mydurable.com/?pt=NjU3YjQ0ZTk0MWM1YzU5NjRlYmEyMzc5OjE3MDI1Nzg1NzEuOTI4OnByZXZpZXc=" target="_blank">HELP</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-home-tab">
                                    <div class="flex_btn">
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showDoor()">Door</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showLeft()">Left</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showFront()">Front</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showRight()">Right</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showInternal()">Internal</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showTop()">Top</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showBottom()">Bottom</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showUnder()">Under</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showRoof()">Roof</button>
                                        </div>
                                        <div class="card">
                                            <button type="button" class="btn btn-block btn-outline-success"
                                                onclick="showFloor()">Floor</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10" id="right">
                                            <img src="" id="right_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>

                                        <div class="col-md-10" id="left" style="display:none">
                                            <img src="" id="left_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>

                                        <div class="col-md-10" id="top" style="display:none">
                                            <img src="" id="top_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>

                                        <div class="col-md-10" id="bottom" style="display:none">
                                            <img src="" id="bottom_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>

                                        <div class="col-md-10" id="front" style="display:none">
                                            <img src="" id="front_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>

                                        <div class="col-md-10" id="door" style="display:none">
                                            <img src="" id="door_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>
                                        <div class="col-md-10" id="interior" style="display:none">
                                            <img src="" id="interior_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>
                                        <div class="col-md-10" id="under" style="display:none">
                                            <img src="" id="under_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>
                                        <div class="col-md-10" id="roof" style="display:none">
                                            <img src="" id="roof_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>
                                        <div class="col-md-10" id="floor" style="display:none">
                                            <img src="" id="floor_img" alt="Image with Hotspots" style="width:100%"
                                                id="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button data-toggle="modal" class="btn btn-block btn-outline-success"
                                                        data-target="#modal-default"><?php if($checkSupervisor == 0){echo "Save Estimate";}else{ echo "Approved & Ready For Repair";}?></button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-block btn-outline-success"
                                                        onclick="printAstimate()">Print</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6" id="line_budget"></div>
                                                <div class="col-md-6" id="total_spend"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-0">
                                            <table class="table table-striped table-responsive text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Container No.</th>
                                                        <th>Compoment Code</th>
                                                        <th>Location Code</th>
                                                        <th>Damage Code</th>
                                                        <th>Repair code</th>
                                                        <th>Material code</th>
                                                        <th>UOM</th>
                                                        <th>Width</th>
                                                        <th>Length</th>
                                                        <th>Height</th>
                                                        <th>Quantity</th>
                                                        <th>Labour Hr.</th>
                                                        <th>Labour Cost</th>
                                                        <th>Material Cost</th>
                                                        <th>Sub Total</th>
                                                        <th>GST</th>
                                                        <th>Tax Cost</th>
                                                        <th>Total Cost</th>
                                                        <th>Damage Image 1</th>
                                                        <th>Damage Image 2</th>
                                                        <th>Damage Image 3</th>
                                                        <th>Damage Image 4</th>
                                                        <th>Damage Image 5</th>
                                                        <th>Damage Image 6</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="reporting">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <input type="hidden" id="line_id_no">
            <input type="hidden" id="location_code_id">
        </div>
</div>
</div>
</section>
</div>



<script>
$('#right').hide();
$('#left').hide();
$('#top').hide();
$('#bottom').hide();
$('#under').hide();

$('#front').hide();
$('#door').show();
$('#interior').hide();
$('#door_side').show();
$('#right_side').hide();
$('#left_side').hide();
$('#top_side').hide();
$('#bottom_side').hide();
$('#front_side').hide();
$('#internal_side').hide();
$('#under_side').hide();
$('#roof_side').hide();
$('#floor_side').hide();



function showRight() {
    $('#right').show();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').show();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showLeft() {
    $('#right').hide();
    $('#left').show();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').show();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showTop() {
    $('#right').hide();
    $('#left').hide();
    $('#top').show();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').show();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showBottom() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').show();
    $('#front').hide();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').show();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showUnder() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').show();
    $('#under').show();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showFront() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').show();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').show();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showDoor() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').show();
    $('#interior').hide();
    $('#door_side').show();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showInternal() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
    $('#interior').show();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').show();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showRoof() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').show();
    $('#roof').show();
    $('#floor_side').hide();
    $('#floor').hide();
}

function showFloor() {
    $('#right').hide();
    $('#left').hide();
    $('#top').hide();
    $('#bottom').hide();
    $('#front').hide();
    $('#door').hide();
    $('#interior').hide();
    $('#door_side').hide();
    $('#right_side').hide();
    $('#left_side').hide();
    $('#top_side').hide();
    $('#bottom_side').hide();
    $('#front_side').hide();
    $('#internal_side').hide();
    $('#under_side').hide();
    $('#under').hide();
    $('#roof_side').hide();
    $('#roof').hide();
    $('#floor_side').show();
    $('#floor').show();
}

function printAstimate() {
    var gatein_id = $('#gateinid').val();
    printurl = `/print/printestimate?gatein_id=${gatein_id}`;
    window.open(printurl, '_blank');
}



$(document).ready(function() {

    
    var containerid = <?= $getid[0]?>;
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "POST",
        url: "/api/gatein/getDataById",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': containerid
        },
        success: function(data) {
            $('.container_no').text(data.container_no);
            $('.mfg_date').text(data.mfg_date);
            $('#modal_container_no').val(data.container_no);
            $('#gateinid').val(data.id);
            $('#line_id_no').val(data.line_id);
            getTarrifByLine(data.line_id);
            getLineData(data.line_id);

            getReportingData();
        },
        error: function(error) {
            console.log(error);
        }
    });

    $('#component_code').on('change', function() {
        var damage_code = $('#damage_code');
        damage_code.empty();
        var damage_code_create = document.getElementById('damage_code');
        var damage_code_create_option = document.createElement('option');
        damage_code_create_option.value = '';
        damage_code_create_option.text = "Select Damage Code";
        damage_code_create.appendChild(damage_code_create_option);
        
        var line_id = $('#line_id_no').val();
        var location_code_id = $('#location_code_id').val();
        var component_code = $(this).val();

        var data = {
            'line_id':line_id,
            'location_code_id':location_code_id,
            'component_code':component_code
        }

        getTarrifDamage(data);
    });

    $('#damage_code').on('change', function() {
        var repair_code = $('#repair_code');
        repair_code.empty();
        var repair_code_create = document.getElementById('repair_code');
        var repair_code_create_option = document.createElement('option');
        repair_code_create_option.value = '';
        repair_code_create_option.text = "Select Repair Code";
        repair_code_create.appendChild(repair_code_create_option);


        var line_id = $('#line_id_no').val();
        var location_code_id = $('#location_code_id').val();
        var component_code = $('#component_code').val();
        var damage_id = $(this).val();

        var data = {
            'line_id':line_id,
            'location_code_id':location_code_id,
            'component_code':component_code,
            'damage_id':damage_id,
        }

        getTarrifRepair(data);
    });

    $('#repair_code').on('change', function() {
        var material_code = $('#material_code');
        material_code.empty();
        var material_code_create = document.getElementById('material_code');
        var material_code_create_option = document.createElement('option');
        material_code_create_option.value = '';
        material_code_create_option.text = "Select Material Code";
        material_code_create.appendChild(material_code_create_option);
        var damage_id = $('#damage_code').val();
        var repair_id = $(this).val();

        var line_id = $('#line_id_no').val();
        var location_code_id = $('#location_code_id').val();
        var component_code = $('#component_code').val();

        var data = {
            'line_id':line_id,
            'location_code_id':location_code_id,
            'component_code':component_code,
            'damage_id':damage_id,
            'repair_id':repair_id
        }

        getTarrifMaterial(data);
    });

    $('#material_code').on('change', function() {
        var damageCode = $('#damage_code').val();
        var repairCode = $('#repair_code').val();
        var materialCode = $('#material_code').val();

        var master_length = $('#master_length');
        master_length.empty();
        var master_length_create = document.getElementById('master_length');
        var master_length_create_option = document.createElement('option');
        master_length_create_option.value = '';
        master_length_create_option.text = "Select Length";
        master_length_create.appendChild(master_length_create_option);

        var line_id = $('#line_id_no').val();
        var location_code_id = $('#location_code_id').val();
        var component_code = $('#component_code').val();

        var data = {
            'line_id':line_id,
            'location_code_id':location_code_id,
            'component_code':component_code,
            'damage_id':damageCode,
            'repair_id':repairCode,
            'material_id':materialCode
        }
        getTarriflength(data);
    });

    $('#master_length').on('change', function() {

        var damageCode = $('#damage_code').val();
        var repairCode = $('#repair_code').val();
        var materialCode = $('#material_code').val();

        var master_length = $('#master_width');
        master_length.empty();
        var master_length_create = document.getElementById('master_width');
        var master_length_create_option = document.createElement('option');
        master_length_create_option.value = '';
        master_length_create_option.text = "Select Width";
        master_length_create.appendChild(master_length_create_option);

        var line_id = $('#line_id_no').val();
        var location_code_id = $('#location_code_id').val();
        var component_code = $('#component_code').val();
        var length = $(this).val();

        var data = {
            'line_id':line_id,
            'location_code_id':location_code_id,
            'component_code':component_code,
            'damage_id':damageCode,
            'repair_id':repairCode,
            'material_id':materialCode,
            'length':length
        }
        getTarrifwidth(data);
    });

    $('#master_width').on('change', function() {
        var damageCode = $('#damage_code').val();
        var repairCode = $('#repair_code').val();
        var materialCode = $('#material_code').val();

        var master_length = $('#master_height');
        master_length.empty();
        var master_length_create = document.getElementById('master_height');
        var master_length_create_option = document.createElement('option');
        master_length_create_option.value = '';
        master_length_create_option.text = "Select Height";
        master_length_create.appendChild(master_length_create_option);

        var line_id = $('#line_id_no').val();
        var location_code_id = $('#location_code_id').val();
        var component_code = $('#component_code').val();
        var length = $('#master_length').val();
        var width = $(this).val();

        var data = {
            'line_id':line_id,
            'location_code_id':location_code_id,
            'component_code':component_code,
            'damage_id':damageCode,
            'repair_id':repairCode,
            'material_id':materialCode,
            'length':length,
            'width':width,
        }
        getTarrifheight(data);
    });

    

    $('#master_height').on('change', function() {
        var damageCode = $('#damage_code').val();
        var repairCode = $('#repair_code').val();
        var materialCode = $('#material_code').val();

        var master_length = $('#master_length').val();
        var master_width = $('#master_width').val();
        var master_height = $('#master_height').val();
        var component_code = $('#component_code').val();


        $.ajax({
            type: "POST",
            url: "/api/tarrif/checktarrifbydimention",
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: {
                'damageCode': damageCode,
                'repairCode': repairCode,
                'materialCode': materialCode,
                'master_length': master_length,
                'master_width': master_width,
                'master_height': master_height,
                'component_code':component_code,
            },
            success: function(data) {
                $("#tarrif_id").val(data[0].id);
                $("#labour_hr").val(data[0].labour_hour);
                $("#qty").val(data[0].qty);
                $("#labour_cost").val(data[0].labour_cost);
                $("#material_cost").val(data[0].material_cost);
                $("#sub_total").val(data[0].sub_total);
                $("#tax_cost").val(data[0].tax_cost);
                $("#gst").val(data[0].tax);
                $("#total").val(data[0].total_cost);
                $("#dimension_h").val(data[0].dimension_h);
                $("#dimension_w").val(data[0].dimension_w);
                $("#dimension_l").val(data[0].dimension_l);
                $('#addButton').removeAttr('disabled');
                $('#qty').removeAttr('readonly');
                $('#labour_cost').removeAttr('readonly');
                $('#material_cost').removeAttr('readonly');
                // $('#sub_total').removeAttr('readonly');
                // $('#tax_cost').removeAttr('readonly');
                $('#gst').removeAttr('readonly');
                // $('#total').removeAttr('readonly');
                $('#labour_hr').removeAttr('readonly');

            },
            error: function(error) {
                var finalValue = '';
                if (Array.isArray(error.responseJSON.message)) {
                    finalValue = Object.values(error.responseJSON.message[0]).join(', ');
                } else {
                    finalValue = error.responseJSON.message;
                }
                var callout = document.createElement('div');
                callout.innerHTML =
                    `<div class="callout callout-danger"><p style="font-size:13px;">${finalValue}</p></div>`;
                document.getElementById('apiMessages').appendChild(callout);
                setTimeout(function() {
                    callout.remove();
                }, 2000);
                $('#master_width').val('');
                $('#master_height').val('');
                $('#master_length').val('');
                $('#master_width').attr({
                    'readonly': 'readonly'
                });
                $('#master_height').attr({
                    'readonly': 'readonly'
                });
            }
        });
    });
});


function getTarriflength(data){
    $.ajax({
        type: "POST",
        url: "/api/tarrif/gettarriflength",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: data,
        success: function(response) {
            $('#master_length').removeAttr('readonly');
            var component_code = $('#master_length');
            component_code.empty();

            var component_code_create = document.getElementById('master_length');
            var component_code_create_option = document.createElement('option');
            component_code_create_option.value = '';
            component_code_create_option.text = "Select Length";
            component_code_create.appendChild(component_code_create_option);

            var transformedData = response.length.map(function(item) {
                return {
                    id: item.dimension_l,
                    text: item.dimension_l
                };
            });

            var blankOption = { id: '', text: '' };
            transformedData.unshift(blankOption);

            $('#master_length').select2({
                placeholder: 'Select An Option',
                data: transformedData,
                escapeMarkup: function (markup) {
                    return markup;
                },
                language: {
                    noResults: function () {
                        return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTarrif()">Add New</button></center>';
                    }
                }
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getTarrifheight(data){
    $.ajax({
        type: "POST",
        url: "/api/tarrif/gettarrifheight",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: data,
        success: function(response) {
            $('#master_height').removeAttr('readonly');
            var component_code = $('#master_height');
            component_code.empty();

            var component_code_create = document.getElementById('master_height');
            var component_code_create_option = document.createElement('option');
            component_code_create_option.value = '';
            component_code_create_option.text = "Select Height";
            component_code_create.appendChild(component_code_create_option);

            var transformedData = response.height.map(function(item) {
                return {
                    id: item.dimension_h,
                    text: item.dimension_h
                };
            });

            var blankOption = { id: '', text: '' };
            transformedData.unshift(blankOption);

            $('#master_height').select2({
                placeholder: 'Select An Option',
                data: transformedData,
                escapeMarkup: function (markup) {
                    return markup;
                },
                language: {
                    noResults: function () {
                        return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTarrif()">Add New</button></center>';
                    }
                }
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getTarrifwidth(data){
    $.ajax({
        type: "POST",
        url: "/api/tarrif/gettarrifwidth",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: data,
        success: function(response) {
            $('#master_width').removeAttr('readonly');

            var component_code = $('#master_width');
            component_code.empty();

            var component_code_create = document.getElementById('master_width');
            var component_code_create_option = document.createElement('option');
            component_code_create_option.value = '';
            component_code_create_option.text = "Select Width";
            component_code_create.appendChild(component_code_create_option);

            var transformedData = response.width.map(function(item) {
                return {
                    id: item.dimension_w,
                    text: item.dimension_w
                };
            });

            var blankOption = { id: '', text: '' };
            transformedData.unshift(blankOption);

            $('#master_width').select2({
                placeholder: 'Select An Option',
                data: transformedData,
                escapeMarkup: function (markup) {
                    return markup;
                },
                language: {
                    noResults: function () {
                        return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTarrif()">Add New</button></center>';
                    }
                }
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}


function getTarrifRepair(data){
    $.ajax({
        type: "POST",
        url: "/api/tarrif/gettarrifrepair",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: data,
        success: function(response) {
            response.repairData.forEach(function(item) {
                getRepair(item.repair_id);
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getTarrifMaterial(data){
    $.ajax({
        type: "POST",
        url: "/api/tarrif/gettarrifmaterial",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: data,
        success: function(response) {
            response.materialData.forEach(function(item) {
                getMaterial(item.material_id);
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getTarrifDamage(data){
    $.ajax({
        type: "POST",
        url: "/api/tarrif/gettarrifdamage",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: data,
        success: function(response) {
            response.damageData.forEach(function(item) {
                getDamage(item.damade_id);
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}


function getLineData(line_id) {
    $.ajax({
        type: "POST",
        url: "/api/line/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': line_id,
        },
        success: function(data) {
            $('#right_img').attr({
                'src': `/uploads/line/${data.right_img}`
            })
            $('#left_img').attr({
                'src': `/uploads/line/${data.left_img}`
            })
            $('#top_img').attr({
                'src': `/uploads/line/${data.top_img}`
            })
            $('#bottom_img').attr({
                'src': `/uploads/line/${data.bottom_img}`
            })
            $('#front_img').attr({
                'src': `/uploads/line/${data.front_img}`
            })
            $('#door_img').attr({
                'src': `/uploads/line/${data.door_img}`
            })
            $('#interior_img').attr({
                'src': `/uploads/line/${data.interior_img}`
            })
            $('#under_img').attr({
                'src': `/uploads/line/${data.under_img}`
            })
            $('#roof_img').attr({
                'src': `/uploads/line/${data.roof_img}`
            })
            $('#floor_img').attr({
                'src': `/uploads/line/${data.floor_img}`
            })


            $('#line_budget').html(`<h3>Line Budget : ${data.line_budget}</h3>`);
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function getTarrifByLine(line_id) {
    $.ajax({
        type: "POST",
        url: "/api/tarrif/getTarrifByLine",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'line_id': line_id,
        },
        success: function(data) {
            if (data.tarrifData.length > 0) {
                var uniqueEntries = {};
                $.each(data.tarrifData, function(index, entry) {
                    var locationCode = entry.repai_location_code;
                    if (!uniqueEntries[locationCode]) {
                        uniqueEntries[locationCode] = entry;
                    }
                });
                var resultArray = Object.values(uniqueEntries);
                resultArray.forEach(function(item) {
                    var locationData = data.LocationCode.find(x => x.id == item
                        .repai_location_code);
                        
                    var gettop = parseInt(item.hotspot_coor_y) + 32;
                    var getLeft = parseInt(item.hotspot_coor_x) + 9.5;
                    var newDiv = $('<div>');
                    newDiv.attr('style', `top:${gettop}%; left:${getLeft}%`);
                    newDiv.addClass('hotspot');
                    $(`#${item.container_side}`).append(newDiv);
                    var innerDiv = $('<a>');
                    innerDiv.addClass('open')
                    innerDiv.attr({
                        'data-id': locationData.id,
                        'data-value': locationData.code
                    })
                    newDiv.append(innerDiv);
                    innerDiv.html('<span class="circle small"></span>');
                })
            }

            $('.open').click(function() {
                var dataIdValue = $(this).data('id');
                var datacodeValue = $(this).data('value');
                $('#location_code_id').val(dataIdValue);
                var line_id = $('#line_id_no').val();
                gettarrif(dataIdValue, line_id);

                $('#side').val(datacodeValue);
                $('#modal-xl').modal('show');
            });
        }, 
        error: function(error) {
            console.log(error);
        }
    });
}


function gettarrif(location_code, line_id) {
    $.ajax({
        type: "POST",
        url: "/api/tarrif/getbylineid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'line_id': line_id,
            'location_code': location_code
        },
        success: function(data) {
            processTarrif(data);
            getTransactionData();

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function processTarrif(data){
    var component_code = $('#component_code');
    component_code.empty();

    var component_code_create = document.getElementById('component_code');
    var component_code_create_option = document.createElement('option');
    component_code_create_option.value = '';
    component_code_create_option.text = "Select Component Code";
    component_code_create.appendChild(component_code_create_option);

    var transformedData = data.componentData.map(function(item) {
        return {
            id: item.component_code,
            text: item.component_code
        };
    });

    var blankOption = { id: '', text: '' };
    transformedData.unshift(blankOption);

    $('#component_code').select2({
        placeholder: 'Select An Option',
        data: transformedData,
        escapeMarkup: function (markup) {
            return markup;
        },
        language: {
            noResults: function () {
                return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTarrif()">Add New</button></center>';
            }
        }
    });
}

function createTarrif(){
    var select2Instance = $('#component_code').data('select2');
    if (select2Instance) {
        select2Instance.destroy();
    }
    
    var damageCode = $('#damage_code').data('select2');
    if (damageCode) {
        damageCode.destroy();
    }
    
    var repair_code = $('#repair_code').data('select2');
    if (repair_code) {
        repair_code.destroy();
    }
    
    var material_code = $('#material_code').data('select2');
    if (material_code) {
        material_code.destroy();
    }
    var master_length = $('#master_length').data('select2');
    if (master_length) {
        master_length.destroy();
    }
    var master_height = $('#master_height').data('select2');
    if (master_height) {
        master_height.destroy();
    }
    var master_width = $('#master_width').data('select2');
    if (master_width) {
        master_width.destroy();
    }
    $('#modal-tarrif').modal('show');
}



function clearTable() {
    const tableBody = document.getElementById("table-body");
    tableBody.innerHTML = ""; // This will remove all rows inside the table body.
}

function clearreposrtingTable() {
    const tableBody = document.getElementById("reporting");
    tableBody.innerHTML = ""; // This will remove all rows inside the table body.
}

function getTransactionData() {
    var gatein_id = $('#gateinid').val();
    var location_code = $('#side').val();
    $.ajax({
        type: "POST",
        url: "/api/transcation/getbytarrif",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'location_code': location_code,
            'gatein_id': gatein_id
        },
        success: function(data) {
            clearTable();
            var tbody = $('#table-body');

            var i = 1;
            data.forEach(function(item) {
                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').text($('#modal_container_no').val()));
                row.append($('<td>').text(item.tarrifData.component_code));
                row.append($('<td>').text(item.tarrifData.repai_location_code));
                row.append($('<td>').text(item.damage_code));
                row.append($('<td>').text(item.repair_code));
                row.append($('<td>').text(item.material_code));
                row.append($('<td>').text(item.tarrifData.unit_of_measure));
                row.append($('<td>').text(item.dimension_w));
                row.append($('<td>').text(item.dimension_l));
                row.append($('<td>').text(item.dimension_h));

                var qty = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_qty',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.qty);
                row.append($('<td>').append(qty));
                var labour_hr = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_labour_hr',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.labour_hr);
                row.append($('<td>').append(labour_hr));
                var labour_cost = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_labour_cost',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.labour_cost);
                row.append($('<td>').append(labour_cost));
                var material_cost = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_material_cost',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.material_cost);
                row.append($('<td>').append(material_cost));
                var sab_total = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_sub_total',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.sab_total);
                row.append($('<td>').append(sab_total));
                var gst = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_tax',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.gst);
                row.append($('<td>').append(gst));
                var tax_cost = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_tax_cost',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.tax_cost);
                row.append($('<td>').append(tax_cost));
                var total = $('<input>').attr({
                    'type': 'text',
                    'id': 'transaction_total',
                    'readonly': 'readonly',
                    'class': 'form-control'
                }).val(item.total);
                row.append($('<td>').append(total));
                var file1 = `/uploads/transaction/${item.before_file1}`
                var before_file1 = $('<img style="width:100px">').attr({
                    'src': file1
                });
                row.append($('<td>').append(before_file1));

                if(item.before_file2){
                    var file2 = `/uploads/transaction/${item.before_file2}`
                    var before_file2 = $('<img style="width:100px">').attr({
                        'src': file2
                    });
                }else{
                    before_file2 = "No Image Available";
                }
                row.append($('<td>').append(before_file2));

                if(item.before_file3){
                    var file3 = `/uploads/transaction/${item.before_file3}`
                    var before_file3 = $('<img style="width:100px">').attr({
                        'src': file3
                    });
                }else{
                    before_file3 = "No Image Available";
                }
                row.append($('<td>').append(before_file3));

                if(item.before_file4){
                    var file4 = `/uploads/transaction/${item.before_file4}`
                    var before_file4 = $('<img style="width:100px">').attr({
                        'src': file4
                    });
                }else{
                    before_file4 = "No Image Available";
                }
                row.append($('<td>').append(before_file4));

                if(item.before_file5){
                    var file5 = `/uploads/transaction/${item.before_file5}`
                    var before_file5 = $('<img style="width:100px">').attr({
                        'src': file5
                    });
                }else{
                    before_file5 = "No Image Available";
                }
                row.append($('<td>').append(before_file5));

                if(item.before_file6){
                    var file6 = `/uploads/transaction/${item.before_file6}`
                    var before_file6 = $('<img style="width:100px">').attr({
                        'src': file6
                    });
                }else{
                    before_file6 = "No Image Available";
                }
                row.append($('<td>').append(before_file6));

                tbody.append(row);
                i++;
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}


function getReportingData() {
    var gatein_id = $('#gateinid').val();
    $.ajax({
        type: "POST",
        url: "/api/transcation/getbygatein",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'gatein_id': gatein_id
        },
        success: function(data) {
            clearreposrtingTable();
            var tbody = $('#reporting');
            var total_spend = 0;

            var i = 1;
            data.forEach(function(item) {
                var itemTotal = parseFloat(item.total);
                total_spend = parseFloat((total_spend + itemTotal).toFixed(2));
                
                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').text($('#modal_container_no').val()));
                row.append($('<td>').text(item.tarrifData.component_code));
                row.append($('<td>').text(item.repai_location_code));
                row.append($('<td>').text(item.damage.code));
                row.append($('<td>').text(item.repair.repair_code));
                row.append($('<td>').text(item.material.material_code));
                row.append($('<td>').text(item.tarrifData.unit_of_measure));

                var dimension_w = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_dimension_w_' + i,
                    'readonly': 'readonly',
                    'class': 'form-control reportinput'
                }).val(item.dimension_w);
                row.append($('<td>').append(dimension_w));

                var dimension_l = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_dimension_l_' + i,
                    'readonly': 'readonly',
                    'class': 'form-control reportinput'
                }).val(item.dimension_l);
                row.append($('<td>').append(dimension_l));

                var dimension_h = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_dimension_h_' + i,
                    'readonly': 'readonly',
                    'class': 'form-control reportinput'
                }).val(item.dimension_h);
                row.append($('<td>').append(dimension_h));

                var qty = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_qty_' + i,
                    'readonly': 'readonly',
                    'class': 'form-control reportinput'
                }).val(item.qty);
                row.append($('<td>').append(qty));
                var labour_hr = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_labour_hr_' + i,
                    'readonly': 'readonly',
                    'class': 'form-control reportinput'
                }).val(item.labour_hr);
                row.append($('<td>').append(labour_hr));
                var labour_cost = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_labour_cost_' + i,
                    'readonly': 'readonly',
                    'class': 'form-control reportinput'
                }).val(item.labour_cost);
                var labour_cost_text = $('<input>').attr({
                    'type': 'hidden',
                    'id': 'reporting_labour_cost_text_' + i,
                    'readonly': 'readonly',
                    'class': 'reportinput form-control'
                }).val(item.labour_cost);
                var labour_cost_td = $('<td>');
                labour_cost_td.append(labour_cost);
                labour_cost_td.append(labour_cost_text);

                row.append(labour_cost_td);
                var material_cost = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_material_cost_' + i,
                    'readonly': 'readonly',
                    'class': 'reportinput form-control'
                }).val(item.material_cost);
                var material_cost_text = $('<input>').attr({
                    'type': 'hidden',
                    'id': 'reporting_material_cost_text_' + i,
                    'readonly': 'readonly',
                    'class': 'reportinput form-control'
                }).val(item.material_cost);
                var material_cost_td = $('<td>');
                material_cost_td.append(material_cost);
                material_cost_td.append(material_cost_text);
                row.append(material_cost_td);
                var sab_total = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_sub_total_' + i,
                    'readonly': 'readonly',
                    'class': 'reportinput form-control'
                }).val(item.sab_total);
                row.append($('<td>').append(sab_total));
                var gst = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_tax_' + i,
                    'readonly': 'readonly',
                    'class': 'reportinput form-control'
                }).val(item.gst);
                row.append($('<td>').append(gst));
                var tax_cost = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_tax_cost_' + i,
                    'readonly': 'readonly',
                    'class': 'reportinput form-control'
                }).val(item.tax_cost);
                row.append($('<td>').append(tax_cost));
                var total = $('<input>').attr({
                    'type': 'text',
                    'id': 'reporting_total_' + i    ,
                    'readonly': 'readonly',
                    'class': 'reportinput form-control'
                }).val(item.total);
                row.append($('<td>').append(total));

                var file1 = `/uploads/transaction/${item.before_file1}`
                var before_file1 = $('<img style="width:100px">').attr({
                    'src': file1
                });
                row.append($('<td>').append(before_file1));

                if(item.before_file2){
                    var file2 = `/uploads/transaction/${item.before_file2}`
                    var before_file2 = $('<img style="width:100px">').attr({
                        'src': file2
                    });
                }else{
                    before_file2 = "No Image Available";
                }
                row.append($('<td>').append(before_file2));

                if(item.before_file3){
                    var file3 = `/uploads/transaction/${item.before_file3}`
                    var before_file3 = $('<img style="width:100px">').attr({
                        'src': file3
                    });
                }else{
                    before_file3 = "No Image Available";
                }
                row.append($('<td>').append(before_file3));

                if(item.before_file4){
                    var file4 = `/uploads/transaction/${item.before_file4}`
                    var before_file4 = $('<img style="width:100px">').attr({
                        'src': file4
                    });
                }else{
                    before_file4 = "No Image Available";
                }
                row.append($('<td>').append(before_file4));

                if(item.before_file5){
                    var file5 = `/uploads/transaction/${item.before_file5}`
                    var before_file5 = $('<img style="width:100px">').attr({
                        'src': file5
                    });
                }else{
                    before_file5 = "No Image Available";
                }
                row.append($('<td>').append(before_file5));

                if(item.before_file6){
                    var file6 = `/uploads/transaction/${item.before_file6}`
                    var before_file6 = $('<img style="width:100px">').attr({
                        'src': file6
                    });
                }else{
                    before_file6 = "No Image Available";
                }
                row.append($('<td>').append(before_file6));

                var editButton = $('<span>')
                    .html('<i class="far fa-edit" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id)
                    .attr('class', 'edit-button');

                var deleteButton = $('<span>')
                    .html(
                        '<i class="fas fa-trash-alt" style="color:#f21515c4; margin-left:5px; cursor:pointer;"></i>'
                    )
                    .attr('data-id', item.id)
                    .attr('class', 'delete-button')
                var saveButton = $('<button style="display:none;">')
                    .text('Save')
                    .attr('data-id', item.id)
                    .attr('class', 'save-button btn-primary')

                var td = $('<td>');
                td.append(editButton);
                td.append(deleteButton);
                td.append(saveButton);
                row.append(td);

                tbody.append(row);
                i++;
            });

            $('#total_spend').html(`<h3>Total Spend : ${total_spend}</h3>`);

            $('.edit-button').click(function() {
                // Find the closest row from the clicked button
                var row = $(this).closest('tr');
                var rowIndex = row.index() + 1;  // Get the 1-based index of the row
                handleDynamicElements(rowIndex);

                // Enable editing for the specific inputs within that row
                row.find("#reporting_qty_" + rowIndex).removeAttr("readonly");
                row.find("#reporting_dimension_w_" + rowIndex).removeAttr("readonly");
                row.find("#reporting_dimension_l_" + rowIndex).removeAttr("readonly");
                row.find("#reporting_dimension_h_" + rowIndex).removeAttr("readonly");

                row.find("#reporting_labour_hr_" + rowIndex).removeAttr("readonly");
                row.find("#reporting_labour_cost_" + rowIndex).removeAttr("readonly");
                row.find("#reporting_material_cost_" + rowIndex).removeAttr("readonly");
                row.find("#reporting_tax_" + rowIndex).removeAttr("readonly");

                // Update buttons visibility within the last cell of the row
                var actionCell = row.find('td:last-child');
                actionCell.find('.edit-button').hide();
                actionCell.find('.delete-button').hide();
                actionCell.find('.save-button').show();
            });



            $('.save-button').click(function() {
                var rowIndex = $(this).closest('tr').index() + 1; // Get the 1-based index of the row
                var dataId = $(this).data('id');

                var reporting_qty = $("#reporting_qty_" + rowIndex).val();
                var reporting_dimension_w = $("#reporting_dimension_w_" + rowIndex).val();
                var reporting_dimension_l = $("#reporting_dimension_l_" + rowIndex).val();
                var reporting_dimension_h = $("#reporting_dimension_h_" + rowIndex).val();

                var reporting_labour_hr = $("#reporting_labour_hr_" + rowIndex).val();
                var reporting_labour_cost = $("#reporting_labour_cost_" + rowIndex).val();
                var reporting_material_cost = $("#reporting_material_cost_" + rowIndex).val();
                var reporting_sub_total = $("#reporting_sub_total_" + rowIndex).val();
                var reporting_tax = $("#reporting_tax_" + rowIndex).val();
                var reporting_tax_cost = $("#reporting_tax_cost_" + rowIndex).val();
                var reporting_total = $("#reporting_total_" + rowIndex).val();

                var data = {
                    'reporting_qty': reporting_qty,
                    'reporting_labour_hr': reporting_labour_hr,
                    'reporting_labour_cost': reporting_labour_cost,
                    'reporting_material_cost': reporting_material_cost,
                    'reporting_sub_total': reporting_sub_total,
                    'reporting_tax_cost': reporting_tax_cost,
                    'reporting_total': reporting_total,
                    'reporting_tax': reporting_tax,
                    'id': dataId,
                    'reporting_dimension_w': reporting_dimension_w,
                    'reporting_dimension_l': reporting_dimension_l,
                    'reporting_dimension_h': reporting_dimension_h,
                };

                var row = $(this).closest('tr');
                var actionCell = row.find('td:last-child');
                actionCell.find('.edit-button').show();
                actionCell.find('.delete-button').show();
                actionCell.find('.save-button').hide();

                post('transcation/update', data);
                getReportingData();
            });


            $('.delete-button').click(function() {
                var dataId = $(this).data('id');
                var data = {
                    'id': dataId
                }
                post('transcation/delete', data);
                getReportingData();
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}


function handleDynamicElements(i) {
    $('#reporting_qty_'+ i +', #reporting_labour_hr_'+ i).on('keyup', function() {
        var reporting_qty = $('#reporting_qty_'+ i).val();
        var reporting_labour_hr = $('#reporting_labour_hr_' + i).val();
        var reporting_tax = $('#reporting_tax_' + i).val();
        var reporting_labour_cost = $('#reporting_labour_cost_text_' + i).val();
        var reporting_material_cost = $('#reporting_material_cost_text_' + i).val();

        var labour_cost = parseInt(reporting_labour_hr) * parseInt(reporting_labour_cost);
        var material_cost = parseInt(reporting_qty) * parseInt(reporting_material_cost);
        var sub_total = parseInt(labour_cost) + parseInt(material_cost);
        var tax_cost = (parseInt(reporting_tax) / 100) * parseInt(sub_total)
        var total = parseInt(tax_cost) + parseInt(sub_total);

        $('#reporting_labour_cost_'+ i).val(labour_cost.toFixed(2));
        $('#reporting_material_cost_'+ i).val(material_cost.toFixed(2));
        $('#reporting_sub_total_'+ i).val(sub_total.toFixed(2));
        $('#reporting_tax_cost_'+ i).val(tax_cost.toFixed(2));
        $('#reporting_total_'+ i).val(total.toFixed(2));
    });

    $('#reporting_labour_cost_' + i +', #reporting_material_cost_' + i).on('keyup', function() {
        var reporting_tax = $('#reporting_tax_'+ i).val();
        var reporting_labour_cost = $('#reporting_labour_cost_'+ i).val();
        var reporting_material_cost = $('#reporting_material_cost_'+ i).val();
        var sub_total = parseInt(reporting_labour_cost) + parseInt(reporting_material_cost);
        var tax_cost = (parseInt(reporting_tax) / 100) * parseInt(sub_total)
        var total = parseInt(tax_cost) + parseInt(sub_total);
        $('#reporting_sub_total_'+ i).val(sub_total.toFixed(2));
        $('#reporting_tax_cost_'+ i).val(tax_cost.toFixed(2));
        $('#reporting_total_'+ i).val(total.toFixed(2));
    });

    $('#reporting_tax_'+ i).on('keyup', function() {
        var reporting_tax = $('#reporting_tax_'+ i).val();
        var sub_total = $('#reporting_sub_total_'+ i).val();
        var tax_cost = (parseInt(reporting_tax) / 100) * parseInt(sub_total)
        var total = parseInt(tax_cost) + parseInt(sub_total);
        $('#reporting_tax_cost_'+ i).val(tax_cost.toFixed(2));
        $('#reporting_total_'+ i).val(total.toFixed(2));
    });
}

function getDamage(id) {
    $.ajax({
        type: "POST",
        url: "/api/damage/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': id,
        },
        success: function(data) {
            $('#damage_code').removeAttr('readonly');
            var component_code = $('#damage_code');
           

            var component_code_create = document.getElementById('damage_code');
            var component_code_create_option = document.createElement('option');
            component_code_create_option.value = '';
            component_code_create_option.text = 'Select Damage Code';
            component_code_create.appendChild(component_code_create_option);

            if (!$.isEmptyObject(data)) {
                var component_code_option = document.createElement('option');
                component_code_option.value = data.id;
                component_code_option.text = data.code;
                component_code_create.appendChild(component_code_option);
            }

            $('#damage_code').select2({
                placeholder: 'Select An Option',
                escapeMarkup: function (markup) {
                    return markup;
                },
                language: {
                    noResults: function () {
                        return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTarrif()">Add New</button></center>';
                    }
                }
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getRepair(id) {
    $.ajax({
        type: "POST",
        url: "/api/repair/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id': id
        },
        success: function(data) {
            $('#repair_code').removeAttr('readonly');
            var component_code = $('#repair_code');

            var component_code_create = document.getElementById('repair_code');
            var component_code_create_option = document.createElement('option');
            component_code_create_option.value = '';
            component_code_create_option.text = 'Select Repair Code';
            component_code_create.appendChild(component_code_create_option);

            if (!$.isEmptyObject(data)) {
                var component_code_option = document.createElement('option');
                component_code_option.value = data.id;
                component_code_option.text = data.repair_code;
                component_code_create.appendChild(component_code_option);
            }

            $('#repair_code').select2({
                placeholder: 'Select An Option',
                escapeMarkup: function (markup) {
                    return markup;
                },
                language: {
                    noResults: function () {
                        return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTarrif()">Add New</button></center>';
                    }
                }
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getMaterial(id) {
    $.ajax({
        type: "POST",
        url: "/api/material/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'id':id,
        },
        success: function(data) {
            $('#material_code').removeAttr('readonly');

            var component_code = $('#material_code');

            var component_code_create = document.getElementById('material_code');
            var component_code_create_option = document.createElement('option');
            component_code_create_option.value = '';
            component_code_create_option.text = 'Select Material Code';
            component_code_create.appendChild(component_code_create_option);

            if (!$.isEmptyObject(data)) {
                var component_code_option = document.createElement('option');
                component_code_option.value = data.id;
                component_code_option.text = data.material_code;
                component_code_create.appendChild(component_code_option);
            }

            $('#material_code').select2({
                placeholder: 'Select An Option',
                escapeMarkup: function (markup) {
                    return markup;
                },
                language: {
                    noResults: function () {
                        return '<center><button class="w-20 btn btn-block btn-outline-success" onclick="createTarrif()">Add New</button></center>';
                    }
                }
            });

        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>


<script>
$(document).ready(function() {
$('#qty, #labour_hr').on('keyup', function() {
    var reporting_qty = $('#qty').val();
    var reporting_labour_hr = $('#labour_hr').val();
    var reporting_tax = $('#gst').val();
    var reporting_labour_cost = $('#labour_cost').val();
    var reporting_material_cost = $('#material_cost').val();

    if(reporting_qty == ''){
        reporting_qty = 1;
    }else{
        reporting_qty = reporting_qty;
    }

    if(reporting_labour_hr == ''){
        reporting_labour_hr = 1;
    }else{
        reporting_labour_hr = reporting_labour_hr;
    }

    var labour_cost = parseInt(reporting_labour_hr) * parseInt(reporting_labour_cost);
    var material_cost = parseInt(reporting_qty) * parseInt(reporting_material_cost);
    var sub_total = parseInt(labour_cost) + parseInt(material_cost);
    var tax_cost = (parseInt(reporting_tax) / 100) * parseInt(sub_total)
    var total = parseInt(tax_cost) + parseInt(sub_total);

    $('#labour_cost').val(labour_cost.toFixed(2));
    $('#material_cost').val(material_cost.toFixed(2));
    $('#sub_total').val(sub_total.toFixed(2));
    $('#tax_cost').val(tax_cost.toFixed(2));
    $('#total').val(total.toFixed(2));
});

$('#labour_cost, #material_cost').on('keyup', function() {
    var reporting_tax = $('#gst').val();
    var reporting_labour_cost = $('#labour_cost').val();
    var reporting_material_cost = $('#material_cost').val();

    if(reporting_labour_cost == ''){
        reporting_labour_cost = 0;
    }else{
        reporting_labour_cost = reporting_labour_cost;
    }

    if(reporting_material_cost == ''){
        reporting_material_cost = 0;
    }else{
        reporting_material_cost = reporting_material_cost;
    }


    var sub_total = parseInt(reporting_labour_cost) + parseInt(reporting_material_cost);
    var tax_cost = (parseInt(reporting_tax) / 100) * parseInt(sub_total)
    var total = parseInt(tax_cost) + parseInt(sub_total);
    $('#sub_total').val(sub_total.toFixed(2));
    $('#tax_cost').val(tax_cost.toFixed(2));
    $('#total').val(total.toFixed(2));
});

$('#gst').on('keyup', function() {
    var reporting_tax = $('#gst').val();
    var sub_total = $('#sub_total').val();

    if(reporting_tax == ''){
        reporting_tax = 0;
    }else{
        reporting_tax = reporting_tax;
    }

    var tax_cost = (parseInt(reporting_tax) / 100) * parseInt(sub_total)
    var total = parseInt(tax_cost) + parseInt(sub_total);
    $('#tax_cost').val(tax_cost.toFixed(2));
    $('#total').val(total.toFixed(2));
});

});
function createTransaction() {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var qty = $('#qty').val();
    var labour_cost = $('#labour_cost').val();
    var labour_hr = $('#labour_hr').val();
    var material_cost = $('#material_cost').val();
    var gst = $('#gst').val();
    var sub_total = $('#sub_total').val();
    var tax_cost = $('#tax_cost').val();
    var total = $('#total').val();

    if ($('#file1')[0].files[0] && qty != '' && labour_cost != '' && labour_hr != '' && material_cost != '' && gst != '') {
        var tarrif_id = $('#tarrif_id').val();
        var gatein_id = $('#gateinid').val();
        var dimension_h = $('#dimension_h').val();
        var dimension_w = $('#dimension_w').val();
        var dimension_l = $('#dimension_l').val();


        var location_code = $('#side').val();

        var formData = new FormData();
        formData.append('tax_cost', tax_cost);
        formData.append('total', total);
        formData.append('gst', gst);
        formData.append('sab_total', sub_total);
        formData.append('material_cost', material_cost);
        formData.append('labour_cost', labour_cost);
        formData.append('qty', qty);
        formData.append('location_code', location_code);
        formData.append('labour_hr', labour_hr);
        formData.append('reporting_dimension_h', dimension_h);
        formData.append('reporting_dimension_w', dimension_w);
        formData.append('reporting_dimension_l', dimension_l);

        formData.append('gatein_id', gatein_id);
        formData.append('tarrif_id', tarrif_id);

        formData.append('before_file1', $('#file1')[0].files[0]);
        formData.append('before_file2', $('#file2')[0].files[0]);
        formData.append('before_file3', $('#file3')[0].files[0]);
        formData.append('before_file4', $('#file4')[0].files[0]);
        formData.append('before_file5', $('#file5')[0].files[0]);
        formData.append('before_file6', $('#file6')[0].files[0]);


        $.ajax({
            url: '/api/transcation/create',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + checkToken
            },
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                var callout = document.createElement('div');
                callout.innerHTML =
                    `<div class="callout callout-success"><p style="font-size:13px;">${data.message}</p></div>`;
                document.getElementById('apiMessages').appendChild(callout);
                setTimeout(function() {
                    callout.remove();
                }, 2000);
                $('#tarrif_id').val('');
                $('#labour_hr').val('');
                $('#dimension_h').val('');
                $('#dimension_w').val('');
                $('#dimension_l').val('');

                $('#qty').val('');
                $('#labour_cost').val('');
                $('#material_cost').val('');
                $('#sab_total').val('');
                $('#gst').val('');
                $('#total').val('');
                $('#tax_cost').val('');

                $('#component_code').val('').trigger('change');
                $('#damage_code').val('').trigger('change');
                $('#repair_code').val('').trigger('change');
                $('#material_code').val('').trigger('change');
                $('#master_length').val('').trigger('change');
                $('#master_width').val('').trigger('change');
                $('#master_height').val('').trigger('change');

                getTransactionData();
                getReportingData();
            },
            error: function(error) {
                var finalValue = '';
                if (Array.isArray(error.responseJSON.message)) {
                    finalValue = Object.values(error.responseJSON.message[0]).join(', ');
                } else {
                    finalValue = error.responseJSON.message;
                }
                var callout = document.createElement('div');
                callout.innerHTML =
                    `<div class="callout callout-danger"><p style="font-size:13px;">${finalValue}</p></div>`;
                document.getElementById('apiMessages').appendChild(callout);
                setTimeout(function() {
                    callout.remove();
                }, 2000);
            }
        });

    } else {
        var callout = document.createElement('div');
        callout.innerHTML =
            `<div class="callout callout-danger"><p style="font-size:13px;">Please Select atleat 1 image and fill required fields</p></div>`;
        document.getElementById('apiMessages').appendChild(callout);
        setTimeout(function() {
            callout.remove();
        }, 2000);
    }
}

function updateEstimate() {
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var gateinid = $('#estimate_gate_in').val();
    data = {
        'user_id': user_id,
        'depo_id': depo_id,
        'gateinid': gateinid
    }

    var checkSuperVisor = <?php echo $checkSupervisor;?>

    if (checkSuperVisor == 1) {
        post('gatein/updateapprove', data);
        location.href = "/supervisor/inspection";
    } else {
        post('gatein/updateestimate', data);
        location.href = "/surveyor/inspection";
    }
}
</script>


<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Component Code</label>
                            <select name="component_code" id="component_code" class="form-control select2">
                                <option value="">Select Component Code</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Location Code</label>
                            <input type="text" id="side" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Container No.</label>
                            <input type="text" id="modal_container_no" class="form-control" readonly>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Damage code</label>
                                    <select readonly class="form-control" id="damage_code">
                                        <option value="">Select Damage Code</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Repair code</label>
                                    <select readonly class="form-control" id="repair_code">
                                        <option value="">Select Repair Code</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Material Code code</label>
                                    <select readonly class="form-control" id="material_code">
                                        <option value="">Select Material Code</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Length</label>
                                    <select readonly class="form-control" id="master_length">
                                        <option value="">Select Length</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Width</label>
                                    <select readonly class="form-control" id="master_width">
                                        <option value="">Select Width</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Height</label>
                                    <select readonly class="form-control" id="master_height">
                                        <option value="">Select Height</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" id="qty" readonly class="form-control" placeholder="Enter Quantity" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Labour Hr.</label>
                                    <input type="text" id="labour_hr" readonly class="form-control" placeholder="Enter Labour Hr." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Labour Cost</label>
                                    <input type="text" id="labour_cost" readonly class="form-control" placeholder="Enter Labour Cost" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Material Cost</label>
                                    <input type="text" id="material_cost" readonly class="form-control" placeholder="Enter Material Cost" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sub Total</label>
                                    <input type="text" id="sub_total" class="form-control" readonly placeholder="Enter Sub Total" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>GST</label>
                                    <input type="text" id="gst" readonly class="form-control" placeholder="Enter GST" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tax Cost</label>
                                    <input type="text" id="tax_cost" class="form-control" readonly placeholder="Enter Tax Cost" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" id="total" class="form-control" readonly placeholder="Enter Total" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input type="file" class="form-control" name="file1" id="file1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input type="file" class="form-control" name="file2" id="file2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 3</label>
                                    <input type="file" class="form-control" name="file3" id="file3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 4</label>
                                    <input type="file" class="form-control" name="file4" id="file4" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 5</label>
                                    <input type="file" class="form-control" name="file5" id="file5" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image 6</label>
                                    <input type="file" class="form-control" name="file6" id="file6" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="create_transaction">
                    <input type="hidden" id="gateinid">
                    <input type="hidden" id="tarrif_id">
                    <input type="hidden" id="dimension_h">
                    <input type="hidden" id="dimension_w">
                    <input type="hidden" id="dimension_l">
                    <button type="button" class="btn btn-primary" onclick="createTransaction()" id="addButton"
                        disabled>Add</button>
                </form>
                <div class="card mt-5">
                    <div class="card-body p-0">
                        <table class="table table-striped table-responsive text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Container No.</th>
                                    <th>Compoment Code</th>
                                    <th>Location Code</th>
                                    <th>Damage Code</th>
                                    <th>Repair code</th>
                                    <th>Material code</th>
                                    <th>UOM</th>
                                    <th>Width</th>
                                    <th>Length</th>
                                    <th>Height</th>
                                    <th>Quantity</th>
                                    <th>Labour Hr.</th>
                                    <th>Labour Cost</th>
                                    <th>Material Cost</th>
                                    <th>Sub Total</th>
                                    <th>GST</th>
                                    <th>Tax Cost</th>
                                    <th>Total Cost</th>
                                    <th>Damage Image 1</th>
                                    <th>Damage Image 2</th>
                                    <th>Damage Image 3</th>
                                    <th>Damage Image 4</th>
                                    <th>Damage Image 5</th>
                                    <th>Damage Image 6</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tarrif">
    <div class="modal-dialog modal-xl" style="overflow-y: initial !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Tarrif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 80vh; overflow-y: auto;">
                <!-- {!! view('tarrif.model') !!} -->
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="estimate_gate_in" value="<?php echo  $getid[0]?>">
                <h4>Are You Sure To Submit?</h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateEstimate()">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection