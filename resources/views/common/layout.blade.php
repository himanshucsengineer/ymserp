<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YMSERP</title>
    <link href="/assets/img/logo_icon.png" rel="icon">
    <script src="/assets/js/custom.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <style>
        .brand-link .brand-image{
            float:none;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active{
            background-color:#63bf84;
        }
        .hidden{
            display:none;
        }
    </style>
    <style>
        .callout{
            position: fixed;
            width:300px;
            right:10px;
            top:10px;
            z-index: 100000;
        }
    </style>


    <script>

        var inactivityTimeout;

        function resetTimer() {
            clearTimeout(inactivityTimeout);
            inactivityTimeout = setTimeout(logoutt, 600000); // 3 minutes in milliseconds
        }

        function logoutt() {
            // Redirect to logout endpoint or perform any other logout actions
            localStorage.removeItem('token');
            window.location.href = '/sleep';
        }

        // Add event listeners to track user activity
        document.addEventListener('mousemove', resetTimer);
        document.addEventListener('keydown', resetTimer);



        var checkToken = localStorage.getItem('token');
        var role_id = localStorage.getItem('role');
        var user_id = localStorage.getItem('user_id');

        $.ajax({
        type: "post",
        url: "/api/role/getbyid",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':role_id
        },
        success: function(response) {       
            var permissions = response[0].permissions;
            if($.inArray("DASHBOARD", permissions) !== -1){
                $('#dash').show();
            }
            if($.inArray("SECURITY", permissions) !== -1){
                $('#security').show();
            }
            if($.inArray("SURVEYOR", permissions) !== -1){
                $('#SURVEYOR').show();
            }
            if($.inArray("BILLING", permissions) !== -1){
                $('#BILLING').show();
            }
            if($.inArray("DEPOS", permissions) !== -1){
                $('#DEPOS').show();
            }
            if($.inArray("MANAGEMENT", permissions) !== -1){
                $('#MANAGEMENT').show();
            }
            if($.inArray("MASTERS", permissions) !== -1){
                $('#MASTERS').show();
            }
            if($.inArray("STORES", permissions) !== -1){
                $('#STORES').show();
            }

            if($.inArray("INWARD_EXECUTIVE", permissions) !== -1){
                $('#INWARD_EXECUTIVE').show();
            }
            if($.inArray("MAINTENANCE", permissions) !== -1){
                $('#MAINTENANCE').show();
            }
            if($.inArray("PRE_ADVICE", permissions) !== -1){
                $('#PRE_ADVICE').show();
            }
            if($.inArray("OUTWARD_EXECUTIVE", permissions) !== -1){
                $('#OUTWARD_EXECUTIVE').show();
            }
            if($.inArray("PURCHASES", permissions) !== -1){
                $('#PURCHASES').show();
            }
            if($.inArray("SUPERVISOR", permissions) !== -1){
                $('#SUPERVISOR').show();
            }

            if($.inArray("DO_MANAGER", permissions) !== -1){
                $('#DO_MANAGER').show();
            }

            if($.inArray("PTI", permissions) !== -1){
                $('#PTI').show();
            }
            if($.inArray("BANK", permissions) !== -1){
                $('#BANK').show();
            }
            if($.inArray("CASH_FLOW", permissions) !== -1){
                $('#CASH_FLOW').show();
            }
            if($.inArray("REPORT", permissions) !== -1){
                $('#REPORT').show();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });


    $.ajax({
        type: "post",
        url: "/api/user/getemployee",
        headers: {
            'Authorization': 'Bearer ' + checkToken
        },
        data:{
            'id':user_id
        },
        success: function(response) {
           $('#username').text(response.firstname + ' ' + response.lastname);
        },
        error: function(error) {
            console.log(error);
        }
    });

    </script>
</head>
<div id="apiMessages"> </div>
<body class="sidebar-mini layout-navbar-fixed">

    <div class="wrapper">
    
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="assets/img/logo-trans.png" alt="logo" height="100" >
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                
                
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="/assets/img/logo_icon.png" class="img-circle " alt="User Image" style="border:1px solid #cdcdcd; width:30px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-user mr-2" aria-hidden="true"></i> My Profile
                        </a>
                        <div class="dropdown-divider"></div>

                        <a href="/change-password" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item" onClick="logout()">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary " style="background-color:#f4f6f9;">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link text-center" style="background-color:white; border:0px;">
                <img src="/assets/img/logo-trans.png" alt=" Logo" class="brand-image">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
                        <img src="/assets/img/logo_icon.png" class="img-circle " alt="User Image">
                    </div> -->
                    <div class="info">
                        <a href="#" class="d-block" id="username"></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open" >
                            
                            <a href="/dashboard" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                Dashboard
                                </p>
                            </a>
                            
                        </li>
                        <li class="nav-item hidden" id="security">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-fingerprint"></i>
                                <p>
                                    Security
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/gatein/create" class="nav-link">
                                        <i class="fas fa-door-open nav-icon"></i>
                                        <p>Gate In</p>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a href="/gateout/create" class="nav-link">
                                        <i class="fas fa-door-closed nav-icon"></i>
                                        <p>Gate Out</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="SURVEYOR">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
                                <i class="fas fa-poll nav-icon"></i>
                                <p>
                                    Surveyor
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" id="inspection">
                                    <a href="/surveyor/inspection" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Inspection</p>
                                    </a>
                                </li>
                                <li class="nav-item" id="inspection">
                                    <a href="/surveyor/reports" class="nav-link">
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Reports</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="INWARD_EXECUTIVE">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
                                <i class="fas fa-poll nav-icon"></i>
                                <p>
                                    Inward Executive
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- <li class="nav-item">
                                    <a href="/billing/invoice" class="nav-link">
                                        <i class="fas fa-money-bill-wave nav-icon"></i>
                                        <p>Depot Billing</p>
                                    </a>
                                </li> -->
                                <li class="nav-item" id="inspection">
                                    <a href="/inward/executive" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Inward Data Entry</p>
                                    </a>
                                </li>
                                <li class="nav-item" id="inspection">
                                    <a href="/inward/reports" class="nav-link">
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Reports</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item hidden" id="SUPERVISOR">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
                                <i class="fas fa-poll nav-icon"></i>
                                <p>
                                    SuperVisor
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" id="inspection">
                                    <a href="/supervisor/inspection" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Inspection</p>
                                    </a>
                                </li>
                                <li class="nav-item" id="inspection">
                                    <a href="/preadvise/list" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Pre Advice Outward List</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item" id="inspection">
                                    <a href="/surveyor/reports" class="nav-link">
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Reports</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>

                        <li class="nav-item hidden" id="MAINTENANCE">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
                                <i class="fas fa-poll nav-icon"></i>
                                <p>
                                    Repair & Maintenance
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" >
                                    <a href="/maintenance/view" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Repairing</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/maintenance/reports" class="nav-link">
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Reports</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item hidden" id="PRE_ADVICE">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
                                <i class="fas fa-poll nav-icon"></i>
                                <p>
                                    Pre Advice Outward
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" >
                                    <a href="/preadvice/create" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Preadvice Outward Entry</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/preadvice/all" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>All Preadvice Outward</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item hidden" id="OUTWARD_EXECUTIVE">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
                                <i class="fas fa-poll nav-icon"></i>
                                <p>
                                    Outward Executive
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item" >
                                    <a href="/outward/manage" class="nav-link">
                                        <!-- <i class="far fa-circle nav-icon"></i> -->
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Outward Entry</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/outward/view" class="nav-link">
                                        <i class="fas fa-search-location nav-icon"></i>
                                        <p>Reports</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="BILLING">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-tree"></i> -->
                                <i class="fas fa-money-bill nav-icon"></i>
                                <p>
                                    Billing
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                
                                <li class="nav-item">
                                    <a href="/billing/centeral" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Central Billing</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="DO_MANAGER">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-tree"></i> -->
                                <i class="fas fa-money-bill nav-icon"></i>
                                <p>
                                    DO Manager
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                
                                <li class="nav-item">
                                    <a href="/doblock/create" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>DO Create</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/doblock/all" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Report</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="nav-item hidden" id="PTI">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-tree"></i> -->
                                <i class="fas fa-money-bill nav-icon"></i>
                                <p>
                                    PTI
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                
                                <li class="nav-item">
                                    <a href="/pti/create" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>PTI Create</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/pti/all" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Report</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="BANK">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-tree"></i> -->
                                <i class="fas fa-money-bill nav-icon"></i>
                                <p>
                                    Bank Account Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/account/create" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Add Bank</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/account/all" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>All Bank</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="CASH_FLOW">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-tree"></i> -->
                                <i class="fas fa-money-bill nav-icon"></i>
                                <p>
                                    Cash Flow
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/cashflow/create" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Cashflow Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/cashflow/all" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Cashflow All</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="REPORT">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-tree"></i> -->
                                <i class="fas fa-money-bill nav-icon"></i>
                                <p>
                                    Reports
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/report/dmr" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>DMR Report</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/report/container" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Container Report</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/report/container-status" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Container Status Report</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="STORES">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon fas fa-edit"></i> -->
                                <i class="fas fa-store nav-icon"></i>
                                <p>
                                    Stores
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/forms/general.html" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Stock</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/forms/advanced.html" class="nav-link">
                                        <i class="fas fa-book-open nav-icon"></i>
                                        <p>Issue Material</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/forms/editors.html" class="nav-link">
                                        <i class="fas fa-money-check nav-icon"></i>
                                        <p>Report</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item hidden" id="PURCHASES">
                            <a href="#" class="nav-link">
                                <i class="fas fa-warehouse nav-icon"></i>
                                <p>
                                Purchases 
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item " id="roles">
                                    <a href="#" class="nav-link">
                                        <p>Vendor Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/vendor/create" class="nav-link">
                                                <p> Create Vendor </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/vendor/all" class="nav-link">
                                                <p>All Vendors</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item " id="roles">
                                    <a href="#" class="nav-link">
                                        <p>Product Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/product/create" class="nav-link">
                                                <p> Create Product </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/product/all" class="nav-link">
                                                <p>All Products</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item ">
                                    <a href="#" class="nav-link">
                                        <p>Product Category <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/product_category/create" class="nav-link">
                                                <p> Create Category </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/product_category/all" class="nav-link">
                                                <p>All Category</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item " id="roles">
                                    <a href="#" class="nav-link">
                                        <p>Requistion Genration <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/requistion/create" class="nav-link">
                                                <p> Create Requistion </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/requistion/all" class="nav-link">
                                                <p>All Requistion</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item " id="roles">
                                    <a href="#" class="nav-link">
                                        <p>Indent Genration <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/indent/create" class="nav-link">
                                                <p> Create Indent </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/indent/all" class="nav-link">
                                                <p>All Indent</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item " id="roles">
                                    <a href="#" class="nav-link">
                                        <p>Purchase Order <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/purchaseOrder/create" class="nav-link">
                                                <p> Create Purchase Order </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/purchaseOrder/all" class="nav-link">
                                                <p>All Purchase Order</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview" >
                                <li class="nav-item " >
                                    <a href="#" class="nav-link">
                                        <p>Purchase Entry <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/purchaseEntry/create" class="nav-link">
                                                <p> Create Purchase Entry </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/purchaseEntry/all" class="nav-link">
                                                <p>All Purchase Entry</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/purchase/reports" class="nav-link">
                                        <p> Reports </p>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item hidden" id="MANAGEMENT">
                            <a href="#" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p>
                                    Management
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item " id="roles">
                                    <a href="#" class="nav-link">
                                        <p>Roles and Permission Management <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview " id="createrole">
                                        <li class="nav-item">
                                            <a href="/role/create" class="nav-link">
                                                <p> Create Role </p>
                                            </a>
                                        </li>
                                        <li class="nav-item " id="viewrole">
                                            <a href="/role/all" class="nav-link">
                                                <p>All Roles</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                
                            </ul>
                        </li>
                        
                        <li class="nav-item hidden" id="MASTERS">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>
                                    Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Employer Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/contractor/create" class="nav-link">
                                                <p> Create Employer </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/contractor/all" class="nav-link">
                                                <p>All Employer</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Category Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/category/create" class="nav-link">
                                                <p>Create Category </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/category/all" class="nav-link">
                                                <p>All Category</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Depot Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/depo/create" class="nav-link">
                                                <p>Create Depot </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/depo/all" class="nav-link">
                                                <p>All Depot</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Employee Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/employee/create" class="nav-link">
                                                <p>Create Employee </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/employee/all" class="nav-link">
                                                <p>All Employee</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>User Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/user/create" class="nav-link">
                                                <p>Create User </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/user/all" class="nav-link">
                                                <p>All User</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Damage Code Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/damage/create" class="nav-link">
                                                <p>Create Damage Code </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/damage/all" class="nav-link">
                                                <p>All Damage Code</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Repair Code Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/repair/create" class="nav-link">
                                                <p>Create Repair Code </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/repair/all" class="nav-link">
                                                <p>All Repair Code</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Material Code Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/material/create" class="nav-link">
                                                <p>Create Material Code </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/material/all" class="nav-link">
                                                <p>All Material Code</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Line Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/line/create" class="nav-link">
                                                <p>Create Line </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/line/all" class="nav-link">
                                                <p>All Line</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Location Code <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/location/create" class="nav-link">
                                                <p>Create Location Code </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/location/all" class="nav-link">
                                                <p>All Location Code</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                               
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Tarrif Code Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/tarrif/create" class="nav-link">
                                                <p>Create Tarrif Code </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/tarrif/all" class="nav-link">
                                                <p>All Tarrif Code</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                        
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>Transport /Consignee Master <i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/transport/create" class="nav-link">
                                                <p>Create Transport /Consignee </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/transport/all" class="nav-link">
                                                <p>All Transport /Consignee</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        

        @yield('content')
        
        

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- <script src="/assets/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="/assets/dist/js/pages/dashboard.js"></script> -->
    <!-- <script src="resources/js/apis.js"></script> -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>

 



</script>
</body>

</html>