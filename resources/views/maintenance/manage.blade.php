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
.reportinput{
    width:100px !important;
}

.reportinput_file{
    width:300px !important;
}
#transaction_total, #transaction_sub_total, #transaction_tax, #transaction_tax_cost, #transaction_material_cost, #transaction_labour_hr, #transaction_labour_cost{
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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Repairing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Repairing</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-three-profile" role="tab"
                                        aria-controls="custom-tabs-three-profile" aria-selected="false">DETAILS</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="row">
                                    <div class="col-md-3">
                                    <button class="btn btn-block btn-outline-success" data-toggle="modal" data-target="#modal-default"><?php if($checkSupervisor == 1){ echo "Submit";}else{echo "Save Repair Report";}?></button>

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
                                                    <th>Actual Material Used</th>
                                                    <th>Repair Photo 1</th>
                                                    <th>Repair Photo 2</th>
                                                    <th>Repair Photo 3</th>
                                                    <th>Repair Photo 4</th>
                                                    <th>Repair Photo 5</th>
                                                    <th>Repair Photo 6</th>
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
                    <input type="hidden" id="line_id_no">
                </div>
            </div>
        </div>
    </section>
</div>



<script>


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
            $('.inward_no').text(data.inward_no);
            $('#modal_container_no').val(data.container_no);
            $('#gateinid').val(data.id);
            $('#line_id_no').val(data.line_id);
            getReportingData();
        },
        error: function(error) {
            console.log(error);
        }
    });
});



function clearreposrtingTable(){
    const tableBody = document.getElementById("reporting");
    tableBody.innerHTML = ""; // This will remove all rows inside the table body.
}



function getReportingData(){
    var gatein_id = $('#gateinid').val();
    $.ajax({
        type: "POST",
        url: "/api/transcation/getbygatein",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data: {
            'gatein_id':gatein_id
        },
        success: function(data) {
            clearreposrtingTable();
            var tbody = $('#reporting');
            
            var i =1;
            data.forEach(function(item) {
                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').text($('#modal_container_no').val()));
                row.append($('<td>').text(item.tarrifData.component_code));
                row.append($('<td>').text(item.tarrifData.repai_location_code));
                row.append($('<td>').text(item.damage.code));
                row.append($('<td>').text(item.repair.repair_code));
                row.append($('<td>').text(item.material.material_code));
                row.append($('<td>').text(item.tarrifData.unit_of_measure));
                row.append($('<td>').text(item.tarrifData.dimension_w));
                row.append($('<td>').text(item.tarrifData.dimension_l));
                row.append($('<td>').text(item.tarrifData.dimension_h));

                var qty = $('<input>').attr({'type':'text', 'id':'reporting_qty','readonly':'readonly', 'class':'form-control reportinput'}).val(item.qty);
                row.append($('<td>').append(qty));
                var labour_hr = $('<input>').attr({'type':'text', 'id':'reporting_labour_hr','readonly':'readonly', 'class':'form-control reportinput'}).val(item.labour_hr);
                row.append($('<td>').append(labour_hr));
                var labour_cost = $('<input>').attr({'type':'text', 'id':'reporting_labour_cost','readonly':'readonly', 'class':'form-control reportinput'}).val(item.labour_cost);
                var labour_cost_text = $('<input>').attr({'type':'hidden', 'id':'reporting_labour_cost_text','readonly':'readonly', 'class':'reportinput form-control'}).val(item.labour_cost);
                var labour_cost_td = $('<td>');
                labour_cost_td.append(labour_cost);
                labour_cost_td.append(labour_cost_text);

                row.append(labour_cost_td);
                var material_cost = $('<input>').attr({'type':'text', 'id':'reporting_material_cost','readonly':'readonly','class':'reportinput form-control'}).val(item.material_cost);
                var material_cost_text = $('<input>').attr({'type':'hidden', 'id':'reporting_material_cost_text','readonly':'readonly','class':'reportinput form-control'}).val(item.material_cost);
                var material_cost_td = $('<td>');
                material_cost_td.append(material_cost);
                material_cost_td.append(material_cost_text);
                row.append(material_cost_td);
                var sab_total = $('<input>').attr({'type':'text', 'id':'reporting_sub_total', 'readonly':'readonly', 'class':'reportinput form-control'}).val(item.sab_total);
                row.append($('<td>').append(sab_total));
                var gst = $('<input>').attr({'type':'text', 'id':'reporting_tax', 'readonly':'readonly', 'class':'reportinput form-control'}).val(item.gst);
                row.append($('<td>').append(gst));
                var tax_cost = $('<input>').attr({'type':'text', 'id':'reporting_tax_cost','readonly':'readonly', 'class':'reportinput form-control'}).val(item.tax_cost);
                row.append($('<td>').append(tax_cost));
                var total = $('<input>').attr({'type':'text', 'id':'reporting_total', 'readonly':'readonly', 'class':'reportinput form-control'}).val(item.total);
                row.append($('<td>').append(total));
                
                var file1 = `/uploads/transaction/${item.before_file1}`
                var before_file1 = $('<img style="width:100px">').attr({'src': file1});
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
                 
                var actual_material = $('<input>').attr({'type':'text', 'id':'actual_material', 'readonly':'readonly','class':'reportinput form-control'}).val(item.actual_material);
                row.append($('<td>').append(actual_material));

                if(item.after_file1){
                    var afterfile1 = `/uploads/transaction/${item.after_file1}`
                    var after_file1 = $('<img style="width:100px">').attr({'src': afterfile1});
                }else{
                    after_file1 = "No Image Available";
                }
                row.append($('<td id="after_file1_td">').append(after_file1));

                if(item.after_file2){
                    var afterfile2 = `/uploads/transaction/${item.after_file2}`
                    var after_file2 = $('<img style="width:100px">').attr({'src': afterfile2});
                }else{
                    after_file2 = "No Image Available";
                }
                row.append($('<td id="after_file2_td">').append(after_file2));

                if(item.after_file3){
                    var afterfile3 = `/uploads/transaction/${item.after_file3}`
                    var after_file3 = $('<img style="width:100px">').attr({'src': afterfile3});
                }else{
                    after_file3 = "No Image Available";
                }
                row.append($('<td id="after_file3_td">').append(after_file3));

                if(item.after_file4){
                    var afterfile4 = `/uploads/transaction/${item.after_file4}`
                    var after_file4 = $('<img style="width:100px">').attr({'src': afterfile4});
                }else{
                    after_file4 = "No Image Available";
                }
                row.append($('<td id="after_file4_td">').append(after_file4));

                if(item.after_file5){
                    var afterfile5 = `/uploads/transaction/${item.after_file5}`
                    var after_file5 = $('<img style="width:100px">').attr({'src': afterfile5});
                }else{
                    after_file5 = "No Image Available";
                }
                row.append($('<td id="after_file5_td">').append(after_file5));

                if(item.after_file6){
                    var afterfile6 = `/uploads/transaction/${item.after_file6}`
                    var after_file6 = $('<img style="width:100px">').attr({'src': afterfile6});
                }else{
                    after_file6 = "No Image Available";
                }
                row.append($('<td id="after_file6_td">').append(after_file6));

                var editButton = $('<span>')
                    .html('<i class="far fa-edit" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id)
                    .attr('class', 'edit-button');

                
                var saveButton = $('<button style="display:none;">')
                    .text('Save')
                    .attr('data-id', item.id)
                    .attr('class', 'save-button btn-primary')

                var td = $('<td>');
                td.append(editButton);
                td.append(saveButton);
                row.append(td);
                tbody.append(row);
                i++;
            });
            $('#reporting_qty, #reporting_labour_hr').on('keyup', function() {
                var reporting_qty = $('#reporting_qty').val();
                var reporting_labour_hr = $('#reporting_labour_hr').val();
                var reporting_tax = $('#reporting_tax').val();
                var reporting_labour_cost = $('#reporting_labour_cost_text').val();
                var reporting_material_cost = $('#reporting_material_cost_text').val();
                var labour_cost = parseInt(reporting_labour_hr) * parseInt(reporting_labour_cost);
                var material_cost = parseInt(reporting_qty) * parseInt(reporting_material_cost);
                var sub_total = parseInt(labour_cost) + parseInt(material_cost);
                var tax_cost = (parseInt(reporting_tax) / 100 ) * parseInt(sub_total)
                var total = parseInt(tax_cost) + parseInt(sub_total);
                $('#reporting_labour_cost').val(labour_cost.toFixed(2));
                $('#reporting_material_cost').val(material_cost.toFixed(2));
                $('#reporting_sub_total').val(sub_total.toFixed(2));
                $('#reporting_tax_cost').val(tax_cost.toFixed(2));
                $('#reporting_total').val(total.toFixed(2));
            });

            $('#reporting_labour_cost, #reporting_material_cost').on('keyup', function() {
                var reporting_tax = $('#reporting_tax').val();
                var reporting_labour_cost = $('#reporting_labour_cost').val();
                var reporting_material_cost = $('#reporting_material_cost').val();
                var sub_total = parseInt(reporting_labour_cost) + parseInt(reporting_material_cost);
                var tax_cost = (parseInt(reporting_tax) / 100 ) * parseInt(sub_total)
                var total = parseInt(tax_cost) + parseInt(sub_total);
                $('#reporting_sub_total').val(sub_total.toFixed(2));
                $('#reporting_tax_cost').val(tax_cost.toFixed(2));
                $('#reporting_total').val(total.toFixed(2));
            });

            $('#reporting_tax').on('keyup', function() {
                var reporting_tax = $('#reporting_tax').val();
                var sub_total = $('#reporting_sub_total').val();
                var tax_cost = (parseInt(reporting_tax) / 100 ) * parseInt(sub_total)
                var total = parseInt(tax_cost) + parseInt(sub_total);
                $('#reporting_tax_cost').val(tax_cost.toFixed(2));
                $('#reporting_total').val(total.toFixed(2));
            });

            $('.edit-button').click(function() {
                var row = $(this).closest('tr');
                row.find("#actual_material").removeAttr("readonly");
                row.find("#after_file1_td img").hide();
                row.find("#after_file2_td img").hide();
                row.find("#after_file3_td img").hide();
                row.find("#after_file4_td img").hide();
                row.find("#after_file5_td img").hide();
                row.find("#after_file6_td img").hide();

                var after_file1 = $('<input>').attr({'type':'file', 'id':'after_file1', 'class':'reportinput_file form-control'});
                row.find("#after_file1_td").empty().append(after_file1);
                var after_file2 = $('<input>').attr({'type':'file', 'id':'after_file2', 'class':'reportinput_file form-control'});
                row.find("#after_file2_td").empty().append(after_file2);

                var after_file3 = $('<input>').attr({'type':'file', 'id':'after_file3', 'class':'reportinput_file form-control'});
                row.find("#after_file3_td").empty().append(after_file3);

                var after_file4 = $('<input>').attr({'type':'file', 'id':'after_file4', 'class':'reportinput_file form-control'});
                row.find("#after_file4_td").empty().append(after_file4);

                var after_file5 = $('<input>').attr({'type':'file', 'id':'after_file5', 'class':'reportinput_file form-control'});
                row.find("#after_file5_td").empty().append(after_file5);

                var after_file6 = $('<input>').attr({'type':'file', 'id':'after_file6', 'class':'reportinput_file form-control'});
                row.find("#after_file6_td").empty().append(after_file6);


                var actionCell = row.find('td:last-child');
                actionCell.find('.edit-button').hide();
                actionCell.find('.save-button').show();
            });

            // Save button click event
            $('.save-button').click(function() {
                var dataId = $(this).data('id');
                var row = $(this).closest('tr');
                var actual_material = row.find("#actual_material").val();
                var newAfterFile1 = row.find("#after_file1")[0].files[0];
                var newAfterFile2 = row.find("#after_file2")[0].files[0];
                var newAfterFile3 = row.find("#after_file3")[0].files[0];
                var newAfterFile4 = row.find("#after_file4")[0].files[0];
                var newAfterFile5 = row.find("#after_file5")[0].files[0];
                var newAfterFile6 = row.find("#after_file6")[0].files[0];

                var formData = new FormData();
                formData.append('actual_material', actual_material);
                formData.append('id', dataId);
                if (newAfterFile1) {
                    formData.append('after_file1', newAfterFile1);
                }
                if (newAfterFile2) {
                    formData.append('after_file2', newAfterFile2);
                }

                if (newAfterFile3) {
                    formData.append('after_file3', newAfterFile3);
                }

                if (newAfterFile4) {
                    formData.append('after_file4', newAfterFile4);
                }

                if (newAfterFile5) {
                    formData.append('after_file5', newAfterFile5);
                }

                if (newAfterFile6) {
                    formData.append('after_file6', newAfterFile6);
                }

                // Make AJAX request to save data
                $.ajax({
                    type: "POST",
                    url: "/api/transcation/update", // Adjust the URL to your server-side endpoint
                    headers: {
                        'Authorization': 'Bearer ' + checkToken
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var callout = document.createElement('div');
                        callout.innerHTML = `<div class="callout callout-success"><p style="font-size:13px;">Updated Successfully</p></div>`;
                        document.getElementById('apiMessages').appendChild(callout);
                        setTimeout(function() {
                            callout.remove();
                        }, 2000);
                        getReportingData()
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
            });


        },
        error: function(error) {
            console.log(error);
        }
    });
}



function updateEstimate(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var gateinid = $('#estimate_gate_in').val();
    var out_status = $('#out_status').val();
    var reject_remark = $('#reject_remark').val();

    var checkSupervisor = "<?php echo $checkSupervisor?>";

    if(checkSupervisor == 1){
        data = {
            'user_id':user_id,
            'depo_id':depo_id,
            'gateinid':gateinid,
            'out_status':out_status,
            'reject_remark':reject_remark
        }
        post('gatein/updateout',data);
        location.href="/supervisor/inspection";
    }else{
        data = {
            'user_id':user_id,
            'depo_id':depo_id,
            'gateinid':gateinid,
        }
        post('gatein/updaterepair',data);
        location.href="/maintenance/view";
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
                            <input type="text" id="component_code" class="form-control" readonly>
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

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Repair code</label>
                                    <select readonly class="form-control" id="repair_code">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Material Code code</label>
                                    <select readonly class="form-control" id="material_code">
                                    </select>
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
                                    <input type="file" class="form-control" name="file2" id="file2" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="create_transaction">
                    <input type="hidden" id="qty">
                    <input type="hidden" id="gateinid">
                    <input type="hidden" id="tarrif_id">
                    <input type="hidden" id="labour_hr">
                    <input type="hidden" id="labour_cost">
                    <input type="hidden" id="material_cost">
                    <input type="hidden" id="sab_total">
                    <input type="hidden" id="gst">
                    <input type="hidden" id="total">
                    <input type="hidden" id="tax_cost">
                    <button type="button" class="btn btn-primary" onclick="createTransaction()">Add</button>
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

                <?php if( $checkSupervisor == 1){?>
                <h4>Please Choose Outward Container Status</h4>
                <select name="out_status" id="out_status" class="form-control">
                    <option value="">Select An Option</option>
                    <option value="ready">Available</option>
                    <option value="reject">Reject</option>
                </select>
                <input type="text" id="reject_remark" class="form-control mt-3" style="display:none" placeholder="Enter Remark...">
                <?php }else{?>
                    <h4>Are You sure you want to submit this report</h4>
                <?php }?>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateEstimate()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>

$('#out_status').on('change', function(){
    var out_status = $(this).val();
    if(out_status == 'reject'){
        $('#reject_remark').show();
    }else{
        $('#reject_remark').hide();
    }
})
</script>

@endsection