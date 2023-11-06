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

        /* #image-container {
            position: relative;
        }

        .hotspot {
            position: absolute;
            background-color: red;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
        } */
  
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">All User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- <div id="image-container">

    <img id="image" src="/assets/img/right.jpeg" width="800" alt="Image" />
    </div> -->

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
                                        <th>Employee Name</th>
                                        <th>Category Name</th>
                                        <th>Depo Name</th>
                                        <th>Login Id</th>
                                        <th>Role</th>
                                        <th>Recovery No.</th>
                                        <th>Ans 1</th>
                                        <th>Ans 2</th>
                                        <th>Ans 3</th>
                                        <th>Status</th>
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

    // const imageContainer = document.getElementById('image-container');
    //     const image = document.getElementById('image');
    //     const hotspots = [];

    //     imageContainer.addEventListener('click', (e) => {
    //         const x = e.clientX - image.getBoundingClientRect().left;
    //         const y = e.clientY - image.getBoundingClientRect().top;
    //         createHotspot(x, y);
    //     });

    //     function createHotspot(x, y) {
    //         const hotspotDiv = document.createElement('div');
    //         hotspotDiv.className = 'hotspot';
    //         hotspotDiv.style.left = x + 'px';
    //         hotspotDiv.style.top = y + 'px';
    //         imageContainer.appendChild(hotspotDiv);

    //         hotspots.push({ x, y });
    //     }
    //     console.log(hotspots);

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
        url: "/api/user/getData",
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

                var userStatus = '';

                if(item.status == 1){
                    userStatus = "Active";
                }else{
                    userStatus = "Inactive";
                }

                var row = $('<tr>');
                row.append($('<td>').text(i));
                row.append($('<td>').append(item.employee_name));
                row.append($('<td>').append(item.cate_name));
                row.append($('<td>').append(item.depo_name));
                row.append($('<td>').append(item.username));
                row.append($('<td>').append(item.role));
                row.append($('<td>').append(item.recovery_number));

                row.append($('<td>').append(item.ans1));
                row.append($('<td>').append(item.ans2));
                row.append($('<td>').append(item.ans3));
                row.append($('<td>').append(userStatus));


                var deleteButton = $('<span>')
                    .html('<i class="fas fa-trash-alt" style="color:#f21515c4; margin-left:5px; cursor:pointer;"></i>')
                    .attr('data-id', item.id)
                    .attr('class', 'delete-button')

                var td = $('<td>');
                td.append(deleteButton);
                row.append(td);

                tbody.append(row);
                i++;
            });


         
            $('.delete-button').click(function() {
                var dataId = $(this).data('id');
                var data = {
                    'id':dataId
                }
                post('user/delete',data);
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