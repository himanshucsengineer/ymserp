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
                    <h1 class="m-0">All Employees</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All Employees</li>
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
                                        <th>Employee Code</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Contractor Name</th>
                                        <th>Address</th>
                                        <th>Pincode</th>
                                        <th>Contact</th>
                                        <th>Aadhar No.</th>
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
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.ajax({
        type: "post",
        url: "/api/employee/getData",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function(response) {
            var tbody = $('#table-body');

            var i =1;
            response.forEach(function(item) {

                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.employee_code));
                row.append($('<td>').append(item.firstname));
                row.append($('<td>').append(item.middlename));
                row.append($('<td>').append(item.lastname));
                row.append($('<td>').append(item.contractor));
                row.append($('<td>').append(item.address));
                row.append($('<td>').append(item.pincode));
                row.append($('<td>').append(item.contact));
                row.append($('<td>').append(item.aadhar));
                
                var editButton = $('<span>')
                    .html('<i class="far fa-edit" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id) 
                    .attr('class', 'edit-button');

                var deleteButton = $('<span>')
                    .html('<i class="fas fa-trash-alt" style="color:#f21515c4; margin-left:5px; cursor:pointer;"></i>')
                    .attr('data-id', item.id)
                    .attr('class', 'delete-button')

                var td = $('<td>');
                td.append(editButton);
                td.append(deleteButton);
                row.append(td);

                tbody.append(row);
                i++;
            });

            $('.edit-button').click(function() {
                var dataId = $(this).data('id');
                window.location = `/employee/create?id=${dataId}`  
            });

           

            $('.delete-button').click(function() {
                var dataId = $(this).data('id');
                var data = {
                    'id':dataId
                }
                post('employee/delete',data);
                refreshTable();
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}




  
</script>

@endsection