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
                            <table id="inspectionData" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Container No.</th>
                                        <th>Container Size</th>
                                        <th>Inward Date</th>
                                        <th>Inward Time</th>
                                        <th>Vhicle No.</th>
                                        <th>Transport</th>
                                        <th>Arive From</th>
                                        <th>Driver</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
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
    const dataTable = $('#inspectionData').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "pageLength": 25
    });
    var checkToken = localStorage.getItem('token');
    $.ajax({
        type: "post",
        url: "/api/gatein/getInspectionData",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{},
        success: function(response) {
            for (let i = 0; i < response.data.length; i++) {
                const data = response.data[i];
                dataTable.row.add([
                    i+1,
                    data.container_no,
                    data.container_size,
                    data.inward_date	,
                    data.inward_time,
                    data.vehicle_number,
                    data.transport.name,
                    data.arrive_from,
                    data.driver_name,
                    `<span class="eye" onclick="showContainer(${data.id})"><i class="far fa-eye" style="color:green;"></i></span>`
                ]).draw();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
});


function showContainer(id){
    window.location = `/surveyor/containershow?id=${id}`
}


  
</script>

@endsection