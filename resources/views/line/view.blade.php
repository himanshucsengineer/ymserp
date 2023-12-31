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
                    <h1 class="m-0">All Line</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All Line</li>
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
                                   
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="search" placeholder="search Here..." onkeyup="refreshTable('',this.value)">
                                </div>
                            </div>
                            <table id="inspectionData" class="table table-bordered table-hover  text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Alise</th>
                                        <th>Container Type</th>
                                        <th>Container Size</th>
                                        <th>Free Days</th>
                                        <th>Line Budget</th>
                                        <th>Parking Charges</th>
                                        <th>Washing Charges</th>
                                        <th>Lolo Charges</th>
                                        <th>Tracking Device</th>
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
                                        <th>Under Structure</th>
                                        <th>Roof Image</th>
                                        <th>Floor Image</th>
                                        <th>Action</th>
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
    var checkToken = localStorage.getItem('token');
    refreshTable();
});

function clearTableBody() {
        $('#table-body').empty();
    }
function refreshTable(page,search){
    var checkToken = localStorage.getItem('token');
    var user_id = localStorage.getItem('user_id');
    var depo_id = localStorage.getItem('depo_id');


    if(page){
        url = `/api/line/getLineData?page=${page}`;
    }else if(search){
        url = `/api/line/getLineData?search=${search}`;
    }else{
        url= `/api/line/getLineData`;
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

                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.name));
                row.append($('<td>').append(item.alise));

                row.append($('<td>').append(item.containerType));
                row.append($('<td>').append(item.containerSize));

                row.append($('<td>').append(item.free_days));
                row.append($('<td>').append(item.line_budget));
                row.append($('<td>').append(item.parking_charges));
                row.append($('<td>').append(item.washing_charges));
                row.append($('<td>').append(item.lolo_charges));
                row.append($('<td>').append(item.tracking_device));
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

                var under_img = $('<a>').attr({'href':'/uploads/line/'+item.under_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(under_img));
                var roof_img = $('<a>').attr({'href':'/uploads/line/'+item.roof_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(roof_img));
                var floor_img = $('<a>').attr({'href':'/uploads/line/'+item.floor_img, 'target':'_blank'}).text("View Image");
                row.append($('<td>').append(floor_img));

                
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