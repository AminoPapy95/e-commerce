@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Data Tables</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!--    ------------ Add Brand Page -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $brand->id}}">
                                    <input type="hidden" name="old_image" value="{{ $brand->brand_image}}">
                                    <div class="form-group">
                                        <h5>Brand Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
                                            @error('brand_name_en')
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Name French <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_fr" class="form-control" value="{{$brand->brand_name_fr}}">
                                            @error('brand_name_fr')
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Images <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control">
                                            @error('brand_image')
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                            value="Update">
                                    </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->
    </div>
    <!-- /.row -->


    </section>
    <!-- /.content -->

    </div>

@endsection
