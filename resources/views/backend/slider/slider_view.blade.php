@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Slider List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table-bordered table-striped table">
                                    <thead>
                                        <tr>
                                            <th>Slider image </th>
                                            <th> Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $item)
                                            <tr>
                                                <td><img src="{{ asset($item->slider_img) }}"
                                                    style="width: 70px; height: 40px;"> </td>
                                                <td>
                                                    @if( $item->title == NULL)
                                                    <span class="badge badge-pill badge-danger">No Title</span>
                                                    @else
                                                    {{ $item->title }}
                                                    @endif
                                                  </td>
                                                <td>{{ $item->description }}</td>
                                                    <td>
                                                        @if( $item->status == 1)
                                                        <span class="badge badge-pill badge-success">Action</span>
                                                        @else
                                                        <span class="badge badge-pill badge-danger">InAction</span>
                                                        @endif
                                                    </td>
                                                <td class="text-center">
                                                   
                                                    <a href=" {{ route('slider-edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                    
                                                    <a href="{{ route('slider-delete', $item->id) }}" class="btn btn-danger"
                                                        title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>
                                                        
                                                        @if( $item->status == 1)
                                                        <a href=" {{ route('slider-inaction', $item->id) }}" class="btn btn-danger"
                                                            title="Inaction Now"><i class="fa fa-arrow-down"></i> </a>
                                                        @else
                                                        <a href=" {{ route('slider-action', $item->id) }}" class="btn btn-success"
                                                            title="Action Now"><i class="fa fa-arrow-up"></i> </a>
                                                        @endif
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->


                <!--   ------------ Add Brand Page -------- -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Slide </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('slider-store') }}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <h5>Slider Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Slider Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control">
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>Slider Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control">
                                            @error('slider_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
