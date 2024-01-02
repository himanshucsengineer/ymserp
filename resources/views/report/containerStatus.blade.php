@extends('common.layout')

@section('content')
<style>
.eye{
    cursor: pointer;
}
#pagination{
    /* width:100%; */
    margin-top:1rem;
    float:right;
}
.pagination-btn{
    border:1px solid #cdcdcd;
    outline:none;
    background:white;
    color:#000;
    padding:.3rem .7rem;
}
.active-btn{
    background:#63bf84;
    color:white;
}
#search{
    float: right;
    padding: 0.5rem 1rem;
    outline: none;
    border: 1px solid #cdcdcd;
    border-radius: 4px;
    margin-bottom: 1rem;
    margin-top:1.7rem;
}
.flex_date_range{
    width:100%;
    height:auto;
    display:flex;
    margin-bottom:1rem;
}
.flex_date_range .left{
    width:50%;
}
.flex_date_range .right{
    width:50%;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Container Status Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Container Status Report</li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="flex_date_range">
                                        <div class="left">
                                            <label for="container_no">Container Number</label>
                                            <input type="text" id="container_no" class="form-control" placeholder="Enter Container Number..."> 
                                        </div>
                                        <div class="right">
                                           <button class="btn btn-block btn-outline-primary mt-4 ml-4" style="margin-top:32px !important" onclick="search()">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                            <table id="inspectionData" class="table table-bordered table-hover table-responsive text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Action</th>
                                        <th>Container No.</th>
                                        <th>Inward Date</th>
                                        <th>In Time</th>
                                        <th>Line Name</th>
                                        <th>Size</th>
                                        <th>Type</th>
                                        <th>Do Number</th>
                                        <th>Outward Date</th>
                                        <th>Out Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                   
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6"><div id="pagination"></div></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    
function clearTableBody() {
    $('#table-body').empty();
}

function search(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    var container_no = $('#container_no').val();

    $.ajax({
        type: "post",
        url: "/api/report/container_status_report",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id,
            'container_no':container_no
        },
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}



  
</script>

@endsection