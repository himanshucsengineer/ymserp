@extends('common.layout')

@section('content')
<style>
.eye{
    cursor: pointer;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inspection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Inspection</li>
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
                                        <th>Container No.</th>
                                        <th>Container Image</th>
                                        <th>Container Size</th>
                                        <th>Container Type</th>
                                        <th>Vehicle No.</th>
                                        <th>Vehicle image</th>
                                        <th>Driver Name</th>
                                        <th>Driver Contact</th>
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
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    $.ajax({
        type: "post",
        url: "/api/gatein/getInspectionData",
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
                var container_img = '';
                if(item.container_img){
                    container_img = $('<a>').attr({'href':'/uploads/gatein/'+item.container_img, 'target':'_blank'}).text("View Image");
                }else{
                    container_img = "No Imgae Available";
                }
                var vehicle_img = '';
                if(item.vehicle_img){
                    vehicle_img = $('<a>').attr({'href':'/uploads/gatein/'+item.vehicle_img, 'target':'_blank'}).text("View Image");
                }else{
                    vehicle_img = "No Imgae Available";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.container_no));
                row.append($('<td>').append(container_img));
                row.append($('<td>').append(item.container_size));
                row.append($('<td>').append(item.container_type));
                row.append($('<td>').append(item.vehicle_number));
                row.append($('<td>').append(vehicle_img));
                row.append($('<td>').append(item.driver_name));
                row.append($('<td>').append(item.contact_number));
                
                var viewButton = $('<span>')
                    .html('<i class="far fa-eye" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id) 
                    .attr('class', 'view-button');

                var td = $('<td>');
                td.append(viewButton);
                row.append(td);

                tbody.append(row);
                i++;
            });


            $('.view-button').click(function() {
                var dataId = $(this).data('id');
                window.location = `/surveyor/containershow?id=${dataId}`
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
});



  
</script>

@endsection