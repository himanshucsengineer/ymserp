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
                    <h1 class="m-0">All Line</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All Line</li>
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
                                        <th>Alise</th>
                                        <th>Container Type</th>
                                        <th>Container Size</th>
                                        <th>Free Days</th>
                                        <th>Labour Rate</th>
                                        <th>Line Address</th>
                                        <th>Email </th>
                                        <th>Phone </th>
                                        <th>Mobile</th>
                                        <th>GSTIN </th>
                                        <th>PAN NO</th>
                                        <th>GST State</th>
                                        <th>State Code</th>
                                        <th>Top Image</th>
                                        <th>Bottom Image</th>
                                        <th>Right Image</th>
                                        <th>Left Image</th>
                                        <th>Front Image</th>
                                        <th>Door Image</th>
                                        <th>Interior Image</th>
   
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
        url: "/api/line/get",
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
                row.append($('<td>').append(item.name));
                row.append($('<td>').append(item.alise));

                row.append($('<td>').append(item.containerType));
                row.append($('<td>').append(item.containerSize));

                row.append($('<td>').append(item.free_days));
                row.append($('<td>').append(item.labour_rate));

                row.append($('<td>').append(item.line_address));
                row.append($('<td>').append(item.email));
                row.append($('<td>').append(item.phone));
                row.append($('<td>').append(item.mobile));

                row.append($('<td>').append(item.gst));
                row.append($('<td>').append(item.pan));
                row.append($('<td>').append(item.gst_state));
                row.append($('<td>').append(item.state_code));

                var top_img = $('<a>').attr({'href':'/uploads/line/'+item.top_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(top_img));

                var bottom_img = $('<a>').attr({'href':'/uploads/line/'+item.bottom_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(bottom_img));

                var right_img = $('<a>').attr({'href':'/uploads/line/'+item.right_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(right_img));

                var left_img = $('<a>').attr({'href':'/uploads/line/'+item.left_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(left_img));

                var front_img = $('<a>').attr({'href':'/uploads/line/'+item.front_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(front_img));

                var door_img = $('<a>').attr({'href':'/uploads/line/'+item.door_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(door_img));

                var interior_img = $('<a>').attr({'href':'/uploads/line/'+item.interior_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(interior_img));

                
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
                window.location = `/line/create?id=${dataId}` 
            });

            $('.delete-button').click(function() {
                var dataId = $(this).data('id');
                var data = {
                    'id':dataId
                }
                post('line/delete',data);
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