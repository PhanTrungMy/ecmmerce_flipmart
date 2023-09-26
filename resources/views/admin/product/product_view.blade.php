@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Products List </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table-bordered table-striped table">
                                    <thead>
                                        <tr>
                                            <th>Image </th>
                                            <th>Product  En</th>
                                            <th>Product Price</th>
                                            <th> Quantity</th>
                                            <th> Discount</th>
                                            <th> Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td><img src="{{asset($item->product_thambnail)}}" style="width:60px ; hegiht:50px" alt=""></td>
                                                <td>{{ $item->product_name_en }}</td>
                                                <td>{{ $item->selling_price }} $</td>
                                                <td>{{ $item->product_qty }} Pic</td>
                                                <td>
                                                    @if($item->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger">No Discount</span>
                                                    @else
                                                    @php
                                                    $amount = $item->selling_price - $item->discount_price;
                                                    $discount = ($amount/$item->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-success">{{ round($discount) }}%</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if( $item->status == 1)
                                                    <span class="badge badge-pill badge-success">Action</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">InAction</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" width ="30%">
                                                    <a href=" {{ route('product-edit', $item->id) }}" class="btn btn-primary"
                                                        title="Edit Data"><i class="fa fa-eye"></i> </a>
                                                    <a href=" {{ route('product-edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"><i class="fa fa-pencil"></i> </a> 

                                                    <a href="{{ route('product-pro-delete', $item->id) }}"
                                                        class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>

                                                    
                                                            @if( $item->status == 1)
                                                            <a href=" {{ route('product-inaction', $item->id) }}" class="btn btn-danger"
                                                                title="Inaction Now"><i class="fa fa-arrow-down"></i> </a>
                                                            @else
                                                            <a href=" {{ route('product-action', $item->id) }}" class="btn btn-success"
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

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
