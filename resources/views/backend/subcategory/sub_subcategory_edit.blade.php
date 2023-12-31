@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">
                
     
                <div class="col-10">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub-SubCategory </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subsubcategory.update') }}">
                                    @csrf
 <input type="hidden" name="id" value="{{$subsubcategory->id}}">
                                    <div class="form-group">
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="category_id" class="form-control"
                                                aria-invalid="false">
                                                <option value="" selected="" disabled="">Select Category
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{$category->id == $subsubcategory->category_id ? 'selected':''}}>{{ $category->category_name_en }}
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
                                                    @foreach ($subcategories as $subsub)
                                                    <option value="{{ $subsub->id }}" {{$subsub->id == $subsubcategory->subcategory_id ? 'selected':''}}>{{ $subsub->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                                </select>
                                                @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        <div class="form-group">
                                            <h5 class="mt-2">Sub-SubCategory Name English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_en" id="subsubcategory_name_en"
                                                    class="form-control" value="{{$subsubcategory->subsubcategory_name_en}}">
                                                @error('subsubcategory_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5 class="mt-2">Sub-SubCategory Name Hin <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_hin" id="subsubcategory_name_hin"
                                                    class="form-control" value="{{$subsubcategory->subsubcategory_name_hin}}">
                                                @error('subsubcategory_name_hin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
