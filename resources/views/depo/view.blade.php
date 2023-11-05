@extends('common.layout')

@section('content')
<style>
.eye{
    cursor: pointer;
}
.unactive{
    border:none;
    outline:none;
}
.form-control{
    width:200px !important;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Depo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All Depo</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="inspectionData" class="table table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Active Status</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Tan no.</th>
                                        <th>Pan No. </th>
                                        <th>Service Tax NO.</th>
                                        <th>Vatin No.</th>
                                        <th>Gst No.</th>
                                        <th>State Name</th>
                                        <th>State Code</th>
                                        <th>Billing Name</th>
                                        <th>Company Name</th>
                                        <th>Company Address</th>
                                        <th>Company Phone</th>
                                        <th>Company Email</th>
                               
                                        <th>Action</th>
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
    </section>
</div>

<script>
    
$(document).ready(function() {
    var checkToken = localStorage.getItem('token');
    refreshTable();
});

function clearTableBody() {
        $('#table-body').empty();
    }
function refreshTable(){
    clearTableBody()
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "get",
        url: "/api/depo/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function(response) {
            var tbody = $('#table-body');

            var i =1;
            response.forEach(function(item) {
                var activeStatus = '';
                if(item.status == 1){
                    activeStatus = "Active";
                }else{
                    activeStatus = "Deactive";
                }
                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.name));
                row.append($('<td>').append(item.address));
                row.append($('<td>').append(activeStatus));
                row.append($('<td>').append(item.phone));
                row.append($('<td>').append(item.email));
                row.append($('<td>').append(item.tan));
                row.append($('<td>').append(item.pan));
                row.append($('<td>').append(item.service_tax));
                row.append($('<td>').append(item.vattin));
                row.append($('<td>').append(item.gst));
                row.append($('<td>').append(item.state));
                row.append($('<td>').append(item.state_code));
                row.append($('<td>').append(item.billing_name));
                row.append($('<td>').append(item.company_name));
                row.append($('<td>').append(item.company_address));
                row.append($('<td>').append(item.company_phone));
                row.append($('<td>').append(item.company_email));
                
                var editButton = $('<span>')
                    .html('<i class="far fa-edit" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id) 
                    .attr('class', 'edit-button');

                var deleteButton = $('<span>')
                    .html('<i class="fas fa-trash-alt" style="color:#f21515c4; margin-left:5px; cursor:pointer;"></i>')
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

            $('.edit-button').click(function() {
                var row = $(this).closest('tr');
                var dataCells = row.find('td').not(':last-child'); // Exclude the last column with actions
                var actionCell = row.find('td:last-child');
                dataCells.each(function(index) {
                    var dataCell = $(this);
                    var inputId = 'input_' + index;
                    var inputValue = dataCell.text();
                    // console.log();
                    if(index === 0){
                        dataCell.empty().append(inputValue);
                    }else if(index === 3){
                        var selectBox = $('<select>')
                        .attr({
                            'id': inputId,
                            'class': 'form-control'
                        })
                        .append($('<option>').val('1').text('Active'))
                        .append($('<option>').val('0').text('Deactive'));

                    dataCell.empty().append(selectBox);
                    }else{
                        var inputField = $('<input>')
                        .attr({
                            'id': inputId,
                            'type': 'text',
                            'class': 'form-control'
                        })
                        .val(inputValue);
                        dataCell.empty().append(inputField);
                    }  
                });
                actionCell.find('.edit-button').hide();
                actionCell.find('.delete-button').hide();
                actionCell.find('.save-button').show();                
            });

            $('.save-button').click(function() {
                var row = $(this).closest('tr');
                var dataCells = row.find('td').not(':last-child'); // Exclude the last column with actions
                var actionCell = row.find('td:last-child');
                var inputFields = row.find('input');
                var selectFields = row.find('select');

                var inputData = {};

                dataCells.each(function(index) {
                    var dataCell = $(this);
                    var newValue = dataCell.find('input').val();
                    dataCell.empty().text(newValue);
                });

                selectFields.each(function() {
                    var selectField = $(this);
                    var selectId = selectField.attr('id');
                    var selectValue = selectField.val();
                    inputData[selectId] = selectValue;
                });

                inputFields.each(function() {
                    var inputField = $(this);
                    var inputId = inputField.attr('id');
                    var inputValue = inputField.val();
                    inputData[inputId] = inputValue;
                });

                // Show "Edit" and "Delete" buttons and hide "Save" button
                actionCell.find('.edit-button').show();
                actionCell.find('.delete-button').show();
                actionCell.find('.save-button').hide();
                var dataId = $(this).data('id');
                updateData(dataId,inputData);
                refreshTable();
            });

            $('.delete-button').click(function() {
                var dataId = $(this).data('id');
                var data = {
                    'id':dataId
                }
                post('depo/delete',data);
                refreshTable();
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}


var tbody = $('#tbody');

function updateData(id,inputData){

    var data = {
        'name' : inputData.input_1,
        'address' : inputData.input_2,
        'status' : inputData.input_3,
        'phone' : inputData.input_4,
        'email' : inputData.input_5,
        'tan' : inputData.input_6,
        'pan' : inputData.input_7,
        'service_tax' : inputData.input_8,
        'vattin' : inputData.input_9,
        'gst' : inputData.input_10,
        'state' : inputData.input_11,
        'state_code' : inputData.input_12,
        'billing_name' : inputData.input_13,
        'company_name' : inputData.input_14,
        'company_address' : inputData.input_15,
        'company_phone' : inputData.input_16,
        'company_email' : inputData.input_17,
        'id' :id
    }
    post('depo/update',data);
}



  
</script>

@endsection