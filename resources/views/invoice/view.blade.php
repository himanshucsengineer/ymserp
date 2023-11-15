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

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Depot Billing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Depot Billing</li>
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
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="">Select Depot</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Depot</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Select Line</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Line</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Select Party</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Party</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="">From</label>
                                    <input type="date" name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">To</label>
                                    <input type="date" name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Invoice Type</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Invoice Type</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary">Genrate Invoice</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    



  
</script>

@endsection