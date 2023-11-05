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
                    <h1 class="m-0">All User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All User</li>
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
                                        <th>Employee Name</th>
                                        <th>Category Name</th>
                                        <th>Depo Name</th>
                                        <th>Login Id</th>
                                        <th>Ans 1</th>
                                        <th>Ans 2</th>
                                        <th>Ans 3</th>
                                        <th>Status</th>
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
        url: "/api/user/getData",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function(response) {
            var tbody = $('#table-body');

            var i =1;
            response.forEach(function(item) {

                var userStatus = '';

                if(item.status == 1){
                    userStatus = "Active";
                }else{
                    userStatus = "Inactive";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.employee_name));
                row.append($('<td>').append(item.cate_name));
                row.append($('<td>').append(item.depo_name));
                row.append($('<td>').append(item.username));
                row.append($('<td>').append(item.ans1));
                row.append($('<td>').append(item.ans2));
                row.append($('<td>').append(item.ans3));
                row.append($('<td>').append(userStatus));
                
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
                    }else if(index === 1){
                        var selectBox = $('<select>')
                        .attr({
                            'id': inputId,
                            'class': 'form-control select-box'
                        })
                        dataCell.empty().append(selectBox)
                        getEmployee(selectBox)

                    }else if(index === 2){
                        var selectBox = $('<select>')
                        .attr({
                            'id': inputId,
                            'class': 'form-control select-box',
                            'multiple' : ''
                        })
                        dataCell.empty().append(selectBox)
                        getCate(selectBox)
                    }else if(index === 3){
                        var selectBox = $('<select>')
                        .attr({
                            'id': inputId,
                            'class': 'form-control select-box',
                            'multiple' : ''
                        })
                        dataCell.empty().append(selectBox)
                        getdepo(selectBox)
                    }else if(index ===  8){
                        var selectBox = $('<select>')
                        .attr({
                            'id': inputId,
                            'class': 'form-control'
                        })
                        .append($('<option>').val('1').text('Active'))
                        .append($('<option>').val('0').text('Inactive'));
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
                post('user/delete',data);
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
        'employee_id' :inputData.input_1,
        'category_id' : inputData.input_2,
        'depot_id' : inputData.input_3,
        'username' : inputData.input_4,
        'ans1' : inputData.input_5,
        'ans2' : inputData.input_6,
        'ans3' : inputData.input_7,
        'status' : inputData.input_8,
        'id' :id
    }
    post('user/update',data);
}

function getEmployee(selectBox){
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "GET",
        url: "/api/employee/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            data.forEach(function(item) {
                const employeeName = item.firstname + ' ' + item.lastname
                selectBox.append($('<option>').val(item.id).text(employeeName));
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getCate(selectBox){
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "GET",
        url: "/api/category/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            data.forEach(function(item) {
                selectBox.append($('<option>').val(item.id).text(item.name));
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function getdepo(selectBox){
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "GET",
        url: "/api/depo/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function (data) {
            data.forEach(function(item) {
                selectBox.append($('<option>').val(item.id).text(item.name));
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
}



  
</script>

@endsection