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
                    <h1 class="m-0">Outward Report</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Outward Report</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <a href="create"><button type="button" class="btn btn-block btn-outline-success">Add New</button></a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    
                    <div class="card">
                        <div class="card-body table-responsive">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="flex_date_range">
                                        <div class="left">
                                            <label for="">Start Date</label>
                                            <input type="date" id="startDate" value="<?= date('Y-m-d')?>" class="form-control" onchange="filterByDate()"> 
                                        </div>
                                        <div class="right">
                                            <label for="">End Date</label>
                                            <input type="date" id="endDate" value="<?= date('Y-m-d')?>" class="form-control" onchange="filterByDate()"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="search" placeholder="search Here..." onkeyup="refreshTable('',this.value)">
                                </div>
                            </div>
                            <table id="inspectionData" class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Action</th>
                                        <th>Container No.</th>
                                        <th>Container Type</th>
                                        <th>Container Size</th>
                                        <th>Sub Type</th>
                                        <th>Status Name</th>
                                        <th>Grade</th>
                                        <th>Line Name</th>
                                        <th>Repair Completion Date</th>
                                        <th>Inward Date</th>
                                        <th>D.O. Number</th>
                                        <th>D.O. Date</th>
                                        <th>Transporters</th>
                                        <th>Vehicle Number</th>
                                        <th>Destination</th>
                                        <th>Seal Number</th>
                                        <th>Third Party</th>
                                        <th>Port Name</th>
                                        <th>Temprature</th>
                                        <th>Vent Seal No.</th>
                                        <th>Ventilation</th>
                                        <th>Humadity</th>
                                        <th>Device Status</th>
                                        <th>Amount</th>
                                        <th>D.O. Photo</th>
                                        <th>Challan Photo</th>
                                        <th>Challan Number</th>
                                        <th>Driver Name</th>
                                        <th>Driver Photo</th>
                                        <th>Driver Contact</th>
                                        <th>Consignee</th>
                                        <th>Licence Number</th>
                                        <th>Licence Photo</th>
                                        <th>Aadhar Number</th>
                                        <th>Aadhar Photo</th>
                                        <th>PAN Number</th>
                                        <th>PAN Photo</th>
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
    
$(document).ready(function() {
    filterByDate();
});


function clearTableBody() {
    $('#table-body').empty();
}


function filterByDate(){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();

    $.ajax({
        type: "post",
        url: "/api/outward/filterByOutStatus",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id,
            'startDate':startDate,
            'endDate':endDate
        },
        success: function(response) {

            clearTableBody()

            var tbody = $('#table-body');

            var i =1;
            response.data.forEach(function(item) {
                var do_copy = '';
                if(item.do_copy){
                    do_copy = $('<a>').attr({'href':'/uploads/outward/'+item.do_copy, 'target':'_blank'}).text("View Image");
                }else{
                    do_copy = "No Imgae Available";
                }
                var challan_copy = '';
                if(item.challan_copy){
                    challan_copy = $('<a>').attr({'href':'/uploads/outward/'+item.challan_copy, 'target':'_blank'}).text("View Image");
                }else{
                    challan_copy = "No Imgae Available";
                }

                var driver_copy = '';
                if(item.driver_copy){
                    driver_copy = $('<a>').attr({'href':'/uploads/outward/'+item.driver_copy, 'target':'_blank'}).text("View Image");
                }else{
                    driver_copy = "No Imgae Available";
                }

                var licence_copy = '';
                if(item.licence_copy){
                    licence_copy = $('<a>').attr({'href':'/uploads/outward/'+item.licence_copy, 'target':'_blank'}).text("View Image");
                }else{
                    licence_copy = "No Imgae Available";
                }

                var aadhar_copy = '';
                if(item.aadhar_copy){
                    aadhar_copy = $('<a>').attr({'href':'/uploads/outward/'+item.aadhar_copy, 'target':'_blank'}).text("View Image");
                }else{
                    aadhar_copy = "No Imgae Available";
                }

                var pan_copy = '';
                if(item.pan_copy){
                    pan_copy = $('<a>').attr({'href':'/uploads/outward/'+item.pan_copy, 'target':'_blank'}).text("View Image");
                }else{
                    pan_copy = "No Imgae Available";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                var editButton = $('<span>')
                    .html('<i class="far fa-edit" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id) 
                    .attr('class', 'edit-button');

                var td = $('<td>');
                td.append(editButton);
                row.append(td);
                row.append($('<td style="text-transform:uppercase;">').append(item.container_no));
                row.append($('<td>').append(item.container_type));
                row.append($('<td>').append(item.container_size));
                row.append($('<td>').append(item.sub_type));
                row.append($('<td>').append(item.status_name));
                row.append($('<td>').append(item.grade));
                row.append($('<td >').append(item.line_name));
                row.append($('<td>').append(item.repair_updatedat));
                row.append($('<td>').append(item.inward_date));
                row.append($('<td>').append(item.do_no));
                row.append($('<td>').append(item.do_date));
                row.append($('<td>').append(item.transporter));
                row.append($('<td>').append(item.vhicleNo));
                row.append($('<td>').append(item.destination));
                row.append($('<td>').append(item.seal_no));
                row.append($('<td>').append(item.third_party));
                row.append($('<td>').append(item.port_name));
                row.append($('<td>').append(item.temprature));
                row.append($('<td>').append(item.vent_seal_no));
                row.append($('<td>').append(item.ventilation));
                row.append($('<td>').append(item.humadity));
                row.append($('<td>').append(item.device_status));
                row.append($('<td>').append(item.amount));
                row.append($('<td>').append(do_copy));
                row.append($('<td>').append(challan_copy));
                row.append($('<td>').append(item.challan_no));
                row.append($('<td>').append(item.driver_name));
                row.append($('<td>').append(driver_copy));
                row.append($('<td>').append(item.driver_contact));
                row.append($('<td>').append(item.consignee));
                row.append($('<td>').append(item.licence_no));
                row.append($('<td>').append(licence_copy));
                row.append($('<td>').append(item.aadhar_no));
                row.append($('<td>').append(aadhar_copy));
                row.append($('<td>').append(item.pan_no));
                row.append($('<td>').append(pan_copy));
                tbody.append(row);
                i++;
            });

            const paginationDiv = document.getElementById("pagination");
            paginationDiv.innerHTML = "";

            if (response.pagination.last_page > 1) {
                const startPage = Math.max(response.pagination.current_page - Math.floor(5 / 2), 1);
                const endPage = Math.min(startPage + 5 - 1, response.pagination.last_page);

                // Create the "Previous" button
                if (response.pagination.links.prev) {
                    var splitPrev = response.pagination.links.prev.split('=');
                    const prevLink = document.createElement("button");
                    prevLink.textContent = "Previous";
                    prevLink.className  = "pagination-btn prev";
                    prevLink.setAttribute("data-id", splitPrev[1]);
                    prevLink.href = response.pagination.links.prev;
                    prevLink.addEventListener("click", function() {
                        refreshTable(prevLink.getAttribute("data-id"))
                    });
                    paginationDiv.appendChild(prevLink);
                }

                // Create page links within the sliding window
                for (let page = startPage; page <= endPage; page++) {
                    var splitPage = response.pagination.links.all_pages[page].split('=');
                    if(splitPage[1] == response.pagination.current_page){
                        const pageLink = document.createElement("button");
                        pageLink.textContent = page;
                        pageLink.className  = "pagination-btn page active-btn";
                        pageLink.setAttribute("data-id", splitPage[1]);
                        pageLink.addEventListener("click", function() {
                            refreshTable(pageLink.getAttribute("data-id"))
                        });
                        paginationDiv.appendChild(pageLink);
                    }else{
                        const pageLink = document.createElement("button");
                        pageLink.textContent = page;
                        pageLink.className  = "pagination-btn page";
                        pageLink.setAttribute("data-id", splitPage[1]);
                        pageLink.addEventListener("click", function() {
                            refreshTable(pageLink.getAttribute("data-id"))
                        });
                        paginationDiv.appendChild(pageLink);
                    }
                    
                }

                // Create the "Next" button
                if (response.pagination.links.next) {
                    var splitNext = response.pagination.links.next.split('=');
                    const nextLink = document.createElement("button");
                    nextLink.textContent = "Next";
                    nextLink.className  = "pagination-btn next";
                    nextLink.setAttribute("data-id", splitNext[1]);

                    nextLink.addEventListener("click", function() {
                        refreshTable(nextLink.getAttribute("data-id"))
                    });
                    paginationDiv.appendChild(nextLink);
                }
            }

            $('.edit-button').click(function() {
                var dataId = $(this).data('id');
                window.location = `/outward/manage?id=${dataId}`
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function refreshTable(page,search){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');

    if(page){
        url = `/api/outward/getInspectionDataOutStatus?page=${page}`;
    }else if(search){
        url = `/api/outward/getInspectionDataOutStatus?search=${search}`;
    }else{
        url= `/api/outward/getInspectionDataOutStatus`;
    }

    $.ajax({
        type: "post",
        url: url,
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'user_id':user_id,
            'depo_id':depo_id
        },
        success: function(response) {
            clearTableBody()

            var tbody = $('#table-body');

            var i =1;
            response.data.forEach(function(item) {
                var do_copy = '';
                if(item.do_copy){
                    do_copy = $('<a>').attr({'href':'/uploads/outward/'+item.do_copy, 'target':'_blank'}).text("View Image");
                }else{
                    do_copy = "No Imgae Available";
                }
                var challan_copy = '';
                if(item.challan_copy){
                    challan_copy = $('<a>').attr({'href':'/uploads/outward/'+item.challan_copy, 'target':'_blank'}).text("View Image");
                }else{
                    challan_copy = "No Imgae Available";
                }

                var driver_copy = '';
                if(item.driver_copy){
                    driver_copy = $('<a>').attr({'href':'/uploads/outward/'+item.driver_copy, 'target':'_blank'}).text("View Image");
                }else{
                    driver_copy = "No Imgae Available";
                }

                var licence_copy = '';
                if(item.licence_copy){
                    licence_copy = $('<a>').attr({'href':'/uploads/outward/'+item.licence_copy, 'target':'_blank'}).text("View Image");
                }else{
                    licence_copy = "No Imgae Available";
                }

                var aadhar_copy = '';
                if(item.aadhar_copy){
                    aadhar_copy = $('<a>').attr({'href':'/uploads/outward/'+item.aadhar_copy, 'target':'_blank'}).text("View Image");
                }else{
                    aadhar_copy = "No Imgae Available";
                }

                var pan_copy = '';
                if(item.pan_copy){
                    pan_copy = $('<a>').attr({'href':'/uploads/outward/'+item.pan_copy, 'target':'_blank'}).text("View Image");
                }else{
                    pan_copy = "No Imgae Available";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                var editButton = $('<span>')
                    .html('<i class="far fa-edit" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id) 
                    .attr('class', 'edit-button');

                var td = $('<td>');
                td.append(editButton);
                row.append(td);
                row.append($('<td style="text-transform:uppercase;">').append(item.container_no));
                row.append($('<td>').append(item.container_type));
                row.append($('<td>').append(item.container_size));
                row.append($('<td>').append(item.sub_type));
                row.append($('<td>').append(item.status_name));
                row.append($('<td>').append(item.grade));
                row.append($('<td >').append(item.line_name));
                row.append($('<td>').append(item.repair_updatedat));
                row.append($('<td>').append(item.inward_date));
                row.append($('<td>').append(item.do_no));
                row.append($('<td>').append(item.do_date));
                row.append($('<td>').append(item.transporter));
                row.append($('<td>').append(item.vhicleNo));
                row.append($('<td>').append(item.destination));
                row.append($('<td>').append(item.seal_no));
                row.append($('<td>').append(item.third_party));
                row.append($('<td>').append(item.port_name));
                row.append($('<td>').append(item.temprature));
                row.append($('<td>').append(item.vent_seal_no));
                row.append($('<td>').append(item.ventilation));
                row.append($('<td>').append(item.humadity));
                row.append($('<td>').append(item.device_status));
                row.append($('<td>').append(item.amount));
                row.append($('<td>').append(do_copy));
                row.append($('<td>').append(challan_copy));
                row.append($('<td>').append(item.challan_no));
                row.append($('<td>').append(item.driver_name));
                row.append($('<td>').append(driver_copy));
                row.append($('<td>').append(item.driver_contact));
                row.append($('<td>').append(item.consignee));
                row.append($('<td>').append(item.licence_no));
                row.append($('<td>').append(licence_copy));
                row.append($('<td>').append(item.aadhar_no));
                row.append($('<td>').append(aadhar_copy));
                row.append($('<td>').append(item.pan_no));
                row.append($('<td>').append(pan_copy));
                tbody.append(row);
                i++;
            });

            const paginationDiv = document.getElementById("pagination");
            paginationDiv.innerHTML = "";

            if (response.pagination.last_page > 1) {
                const startPage = Math.max(response.pagination.current_page - Math.floor(5 / 2), 1);
                const endPage = Math.min(startPage + 5 - 1, response.pagination.last_page);

                // Create the "Previous" button
                if (response.pagination.links.prev) {
                    var splitPrev = response.pagination.links.prev.split('=');
                    const prevLink = document.createElement("button");
                    prevLink.textContent = "Previous";
                    prevLink.className  = "pagination-btn prev";
                    prevLink.setAttribute("data-id", splitPrev[1]);
                    prevLink.href = response.pagination.links.prev;
                    prevLink.addEventListener("click", function() {
                        refreshTable(prevLink.getAttribute("data-id"))
                    });
                    paginationDiv.appendChild(prevLink);
                }

                // Create page links within the sliding window
                for (let page = startPage; page <= endPage; page++) {
                    var splitPage = response.pagination.links.all_pages[page].split('=');
                    if(splitPage[1] == response.pagination.current_page){
                        const pageLink = document.createElement("button");
                        pageLink.textContent = page;
                        pageLink.className  = "pagination-btn page active-btn";
                        pageLink.setAttribute("data-id", splitPage[1]);
                        pageLink.addEventListener("click", function() {
                            refreshTable(pageLink.getAttribute("data-id"))
                        });
                        paginationDiv.appendChild(pageLink);
                    }else{
                        const pageLink = document.createElement("button");
                        pageLink.textContent = page;
                        pageLink.className  = "pagination-btn page";
                        pageLink.setAttribute("data-id", splitPage[1]);
                        pageLink.addEventListener("click", function() {
                            refreshTable(pageLink.getAttribute("data-id"))
                        });
                        paginationDiv.appendChild(pageLink);
                    }
                    
                }

                // Create the "Next" button
                if (response.pagination.links.next) {
                    var splitNext = response.pagination.links.next.split('=');
                    const nextLink = document.createElement("button");
                    nextLink.textContent = "Next";
                    nextLink.className  = "pagination-btn next";
                    nextLink.setAttribute("data-id", splitNext[1]);

                    nextLink.addEventListener("click", function() {
                        refreshTable(nextLink.getAttribute("data-id"))
                    });
                    paginationDiv.appendChild(nextLink);
                }
            }


            $('.edit-button').click(function() {
                var dataId = $(this).data('id');
                window.location = `/outward/manage?id=${dataId}`
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}



  
</script>

@endsection