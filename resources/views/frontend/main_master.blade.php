<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
    {{-- header --}}
    @include('frontend.body.header')
    {{-- container --}}

    @yield('content')
    {{-- footer --}}
    @include('frontend.body.footer')

    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
    {{-- add to card form --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel"><strong><span id="pname"></span></strong>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="..." id="pimage" class="card-img-top"
                                    style="height:200px; width:180px;" alt="...">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price : <strong class="text-danger">$<span
                                            id="price"></span></strong>
                                    <del id="oldprice"></del>
                                </li>
                                <li class="list-group-item">Product Code : <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category : <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand : <strong id="pbrand"></strong></li>
                                <li class="list-group-item"> Stock :
                                    <span class="badge badge-pill badge-succes" id="aviable"
                                        style="background:green; color:white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background:red; color:white;"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select name="color" class="form-control" id="color">
                                </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select name="size" class="form-control" id="size">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" value="1" min="1"
                                    id="qty" name="qty" placeholder="Quantity">
                            </div>
                            <li class="add-cart-button btn-group">
                                {{-- <button class="btn btn-primary icon" type="button" title="Add Cart"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                                        class="fa fa-shopping-cart"></i> </button> --}}
                                <input type="hidden" id="product_id">
                                <button class="btn btn-primary cart-btn" type="button" onclick="AddToCart()">Add to
                                    cart</button>
                            </li>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function productView(id) {
            $.ajax({
                type: "GET",
                url: '/products/view/modal/' + id,
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src', '/' + data.product.product_thambnail);
                    //_id
                    $('#product_id').val(data.product.id);

                    //product Price
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    }
                    //stock_price
                    if (data.product.product_qty > 0) {
                        $('#stockout').text('');
                        $('#aviable').text();
                        $('#aviable').text('Available');
                    } else {
                        $('#stockout').text('');
                        $('#aviable').text();
                        $('#stockout').text('Stock Out');
                    }


                    //color
                    $('select[name ="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name ="color"]').append('<option value="' + value + '">' + value +
                            '</option>');
                    });
                    //size
                    $('select[name ="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name ="size"]').append('<option value="' + value + '">' + value +
                            '</option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }

                    });



                }
            })
        }

        // add cart

        function AddToCart() {

            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    product_name: product_name,
                    color: color,
                    size: size,
                    quantity: quantity,
                },
                url: "/cart/add/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModel').click();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }



                }
            })

        }
    </script>
   <script type="text/javascript">
    function miniCart(){
       $.ajax({
           type: 'GET',
           url: '/product/mini/cart',
           dataType:'json',
           success:function(response){

               $('span[id="cartSubTotal"]').text(response.cartTotal);
               $('#cartQty').text(response.cartQty);
               var miniCart = ""

               $.each(response.carts, function(key,value){
                   miniCart += `<div class="cart-item product-summary">
         <div class="row">
           <div class="col-xs-4">
             <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
           </div>
           <div class="col-xs-7">
             <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
             <div class="price"> ${value.price} * ${value.qty} </div>
           </div>
           <div class="col-xs-1 action"> 
           <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
         </div>
       </div>
       <!-- /.cart-item -->
       <div class="clearfix"></div>
       <hr>`
       });
               
               $('#miniCart').html(miniCart);
           }
       })

    }
miniCart();
// mini cart remove start
function miniCartRemove(rowId){
    $.ajax({
        type: "GET",
        url: '/mini/cart/remove/'+rowId,
        dataType: "json",
        success: function(data){
            miniCart();      
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })php
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
        }
    })
}
// mini cart remove end
    </script>
    {{-- add wishlist page start --}}
    <script type="text/javascript">
    function addToWishlist(product_id){
        $.ajax({
            type: "GET",
            url: '/add/wishlist/'+product_id,
            dataType: "json",
            success: function(data){
        
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                        icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
            }
        })
    }
    </script>
</body>
</html>
