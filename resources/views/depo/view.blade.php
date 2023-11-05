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

                var td = $('<td>');
                td.append(editButton);
                td.append(deleteButton);
                row.append(td);

                tbody.append(row);
                i++;
            });

            $('.edit-button').click(function() {
                var dataId = $(this).data('id');
                window.location = `/depo/create?id=${dataId}`      
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





  
</script>

@endsection