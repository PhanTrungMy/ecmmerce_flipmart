@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub->SubCategory List </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table-bordered table-striped table">
                                    <thead>
                                        <tr>
                                            <th>Category </th>
                                            <th>SubCategory Name</th>
                                            <th>Sub-SubCategory English</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategory as $value)
                                            <tr>
                                                <td>{{ $value['category']['category_name_en'] }}</td>
                                                <td>{{ $value['subcategory']['subcategory_name_en'] }}</td>
                                                <td>{{ $value->subsubcategory_name_en}}</td>

                                                <td class="text-center" >
                                                   
                                                    <a href="{{route('subsubcategory.edit',$value->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                    <a href="{{route('subsubcategory.delete',$value->id)}}"
                                                        class="btn btn-danger" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Add Sub-SubCategory </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subsubcategory.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="category_id" class="form-control"
                                                aria-invalid="false">
                                                <option value="" selected="" disabled="">Select Category
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <h5 class="mt-2">Sub-SubCategory Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" id="subcategory_id" class="form-control"
                                                    aria-invalid="false">
                                                    <option value="" selected="" disabled="">Select subCategory
                                                    </option>
                                                    
                                                  
    
                                                </select>
                                                @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
    
                                            </div>



                                        <div class="form-group">
                                            <h5 class="mt-2">Sub-SubCategory Name English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_en" id="subsubcategory_name_en"
                                                    class="form-control">
                                                @error('subsubcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5 class="mt-2">Sub-SubCategory Name Hin <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_hin" id="subsubcategory_name_hin"
                                                    class="form-control">
                                                @error('subsubcategory_name_hin')
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
    <script type="text/javascript">
        $(document).ready(function() {
          $('select[name="category_id"]').on('change', function(){
              var category_id = $(this).val();
              if(category_id) {
                  $.ajax({
                      url: "{{  url('/subcategory/sub/ajax') }}/"+category_id,
                      type:"GET",
                      dataType:"json",
                      success:function(data) {
                         var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                      },
                  });
              } else {
                  alert('danger');
              }
          });
      });
      </script>
@endsection
