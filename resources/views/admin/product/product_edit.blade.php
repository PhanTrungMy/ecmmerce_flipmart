@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('product-update')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$products->id}}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" id="category_id" class="form-control"
                                                            aria-invalid="false" required="">
                                                            <option value="" selected="" disabled="">Select
                                                                Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"{{$category->id == $products->category_id ? 'selected' :'' }}>
                                                                    {{ $category->category_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" id="brand_id" class="form-control"
                                                            aria-invalid="false" required="">
                                                            <option value="" selected="" disabled="">Select
                                                                brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}" {{$brand->id == $products->brand_id ? 'selected' :'' }}>
                                                                    {{ $brand->brand_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" id="subcategory_id"
                                                            class="form-control" aria-invalid="false" required="">
                                                            <option value="" selected="" disabled="" >
                                                                Select SubCategory</option>
                                                                @foreach ($subcategory as $sub)
                                                                <option value="{{ $sub->id }}"{{$sub->id == $products->subcategory_id ? 'selected' :'' }}>
                                                                    {{ $sub->subcategory_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- start 2st row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" id="subsubcategory_id"
                                                            class="form-control" aria-invalid="false" required="">
                                                            <option value="" selected="" disabled="">Select
                                                                SubSubCategory</option>
                                                                @foreach ($subsubcategory as $subsub)
                                                                <option value="{{ $subsub->id }}"{{$subsub->id == $products->subsubcategory_id ? 'selected' :'' }}>
                                                                    {{ $subsub->subsubcategory_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('subsubcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name EN <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control" required="" value="{{$products->product_name_en}}">
                                                        @error('product_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name Hin <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_hin" class="form-control" required="" value="{{$products->product_name_hin}}">
                                                        @error('product_name_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- start 3st row --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Code<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control" required="" value="{{$products->product_code}}">
                                                        @error('product_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control" required="" value="{{$products->product_qty}}">
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        {{-- start 4st row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Hin <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_hin"
                                                            class="form-control"value="{{$products->product_tags_hin}}"
                                                            data-role="tagsinput" >
                                                        @error('product_tags_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size En<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control"
                                                        value="{{$products->product_size_en}}" data-role="tagsinput">
                                                        @error('product_size_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control"
                                                       data-role="tagsinput" required="" value="{{$products->product_tags_en}}">
                                                        @error('product_tags_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- start 5st row --}}

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Hin<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_hin"
                                                            class="form-control" value="{{$products->product_size_hin}}"
                                                            data-role="tagsinput">
                                                        @error('product_size_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en"
                                                            class="form-control" value="{{$products->product_color_en}}"
                                                            data-role="tagsinput">
                                                        @error('product_color_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color Hin<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_hin"
                                                            class="form-control" value="{{$products->product_color_hin}}"
                                                            data-role="tagsinput">
                                                        @error('product_color_hin')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        {{-- start 6st row --}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control" value="{{$products->discount_price}}">
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control" value="{{$products->selling_price}}">
                                                        @error('selling_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end 6st row --}}
                                        {{-- start 7st row --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description English<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">
                                                            {!! $products->short_descp_en!!}
                                                        </textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description English<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text">
                                                            {!! $products->short_descp_hin !!} 
                                                        </textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end 7st row --}}
                                        {{-- start 8st row                                         --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description English<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
                                                            {!! $products->long_descp_en!!}
                                    </textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description Hindi<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_descp_hin" rows="10" cols="80">
                                                            {!! $products->long_descp_hin!!}
                                    </textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                        value="1" {{$products->hot_deals == 1 ? 'checked' :''}}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured"
                                                        value="1" {{$products->featured == 1 ? 'checked' :''}} >
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer"
                                                        value="1" {{$products->special_offer == 1 ? 'checked' :''}}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                        value="1" {{$products->special_deals == 1 ? 'checked' :''}}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

{{-- start multiple image --}}
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box bt-3 border-primary">
              <div class="box-header">
                <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
              </div>
<form action="{{route('product-update-image')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row row-sm">

        @foreach ($multiImgs as $img)
        <div class="col-md-3 m-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset($img->photo_name)}}" class="card-img-top" style="height: 130px;width:280px">
                <div class="card-body"> 
                  <h5 class="card-title">
                    <a href="{{route('product-delete',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data">
                        <i class="fa fa-trash"></i>
                    </a> 
                  </h5>
                 <p class="card-text">
                    <div class="form-group">
                       <label for="" class="form-control-label">Change image <span class="tx-danger">*</span></label> 
                       <input type="file" class="form-control" name="multi_img[{{$img->id }}]">
                    </div>
                 </p>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    <div class="text-xs-right m-4">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
    </div>
</form>
            </div>
          </div>
    </div>
</section>


{{-- end multiple image --}}
{{-- start thamnail image --}}


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box bt-3 border-primary">
              <div class="box-header">
                <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
              </div>
<form action="{{route('product-update-thambnail')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $products->id }}">
    <input type="hidden" name="old_image" value="{{ $products->product_thambnail }}">

    <div class="row row-sm">
        <div class="col-md-3 m-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset($products->product_thambnail)}}" class="card-img-top" style="height: 130px;width:280px">
                <div class="card-body"> 
                 <p class="card-text">
                    <div class="form-group">
                       <label for="" class="form-control-label">Change Image <span class="tx-danger">*</span></label> 
                       <input type="file" name="product_thambnail" 
                       class="form-control" onchange="mainThamUrl(this)" >
                       <img src="" id="mainThamb" >
                    </div>
                 </p>
                </div>
              </div>
        </div>
     
    </div>
    <div class="text-xs-right m-4">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
    </div>
</form>
            </div>
          </div>
    </div>
</section>




    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/sub/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html();
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/sub-sub/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    {{-- img mainthamb --}}
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThamb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    {{-- img multi --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file dataF

                    $.each(data, function(index, file) {
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80);
                                    $('#preview_img').append(
                                        img);
                                    
                                };
                            })(file);
                            fRead.readAsDataURL(file);
                        }
                    });


                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
