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
                            <table id="inspectionData" class="table table-bordered table-hover table-responsive text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Action</th>
                                        <th>Container No.</th>
                                        <th>Container Image</th>
                                        <th>Vehicle No.</th>
                                        <th>Vehicle image</th>
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
        url: "/api/gatein/filterByDate",
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
                var container_img = '';
                if(item.container_img){
                    container_img = $('<a>').attr({'href':'/uploads/gatein/'+item.container_img, 'target':'_blank'}).text("View Image");
                }else{
                    container_img = "No Image Available";
                }
                var vehicle_img = '';
                if(item.vehicle_img){
                    vehicle_img = $('<a>').attr({'href':'/uploads/gatein/'+item.vehicle_img, 'target':'_blank'}).text("View Image");
                }else{
                    vehicle_img = "No Image Available";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                var viewButton = $('<span>')
                    .html('<i class="far fa-eye" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id) 
                    .attr('class', 'view-button');

                var td = $('<td>');
                td.append(viewButton);
                row.append(td);
                row.append($('<td style="text-transform:uppercase;">').append(item.container_no));
                row.append($('<td>').append(container_img));
                row.append($('<td style="text-transform:uppercase;">').append(item.vehicle_number));
                row.append($('<td>').append(vehicle_img));
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


            $('.view-button').click(function() {
                var dataId = $(this).data('id');
                window.location = `/surveyor/containershow?id=${dataId}`
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
        url = `/api/gatein/getInspectionData?page=${page}`;
    }else if(search){
        url = `/api/gatein/getInspectionData?search=${search}`;
    }else{
        url= `/api/gatein/getInspectionData`;
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
                var container_img = '';
                if(item.container_img){
                    container_img = $('<a>').attr({'href':'/uploads/gatein/'+item.container_img, 'target':'_blank'}).text("View Image");
                }else{
                    container_img = "No Image Available";
                }
                var vehicle_img = '';
                if(item.vehicle_img){
                    vehicle_img = $('<a>').attr({'href':'/uploads/gatein/'+item.vehicle_img, 'target':'_blank'}).text("View Image");
                }else{
                    vehicle_img = "No Image Available";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                var viewButton = $('<span>')
                    .html('<i class="far fa-eye" style="color:#15abf2; cursor:pointer;"></i>')
                    .attr('data-id', item.id) 
                    .attr('class', 'view-button');

                var td = $('<td>');
                td.append(viewButton);
                row.append(td);
                row.append($('<td style="text-transform:uppercase;">').append(item.container_no));
                row.append($('<td>').append(container_img));
                row.append($('<td style="text-transform:uppercase;">').append(item.vehicle_number));
                row.append($('<td>').append(vehicle_img));
                
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


            $('.view-button').click(function() {
                var dataId = $(this).data('id');
                window.location = `/surveyor/containershow?id=${dataId}`
            });
        },
        error: function(error) {
            console.log(error);
        }
    });
}



  
</script>

@endsection