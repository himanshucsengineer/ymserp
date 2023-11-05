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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All Category</li>
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
                            <table id="inspectionData" class="table table-bordered table-hover table-responsive w-100">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th style="width:50%">Name</th>
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
        url: "/api/category/get",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        success: function(response) {
            var tbody = $('#table-body');

            var i =1;
            response.forEach(function(item) {
                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.name));
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
        
                    var inputField = $('<input>')
                        .attr({
                            'id': inputId,
                            'type': 'text',
                            'class': 'form-control'
                        })
                        .val(inputValue);
                        dataCell.empty().append(inputField);
                        
                });
                actionCell.find('.edit-button').hide();
                actionCell.find('.delete-button').hide();
                actionCell.find('.save-button').show();                
            });

            $('.save-button').click(function() {
                var row = $(this).closest('tr');
                var dataCells = row.find('td').not(':last-child'); // Exclude the last column with actions
                var actionCell = row.find('td:last-child');
                var inputFields = row.find('input'); // Select all input fields in the row
                var inputData = {};

                dataCells.each(function(index) {
                    var dataCell = $(this);
                    var newValue = dataCell.find('input').val();
                    dataCell.empty().text(newValue);
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
                post('category/delete',data);
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
        'id' : id
    }
    console.log(data);
    post('category/update',data);
}



  
</script>

@endsection