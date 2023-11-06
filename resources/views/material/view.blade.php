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
                    <h1 class="m-0">All Material Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All Material Code</li>
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
                                        <th>Damage Code</th>
                                        <th>Repair Code</th>
                                        <th>Material Code</th>
                                        <th>Details</th>
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
        url: "/api/material/getData",
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
                row.append($('<td>').append(item.damage_id));
                row.append($('<td>').append(item.repiar_id));
                row.append($('<td>').append(item.material_code));
                row.append($('<td>').append(item.desc));

                
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
                window.location = `/material/create?id=${dataId}` 
            });

       

            $('.delete-button').click(function() {
                var dataId = $(this).data('id');
                var data = {
                    'id':dataId
                }
                post('material/delete',data);
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