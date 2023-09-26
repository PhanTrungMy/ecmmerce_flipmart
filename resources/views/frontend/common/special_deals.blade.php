@php
       $special_deals = App\Models\Product::where('status', 1)
        ->where('special_deals', 1)
        ->orderBy('id', 'DESC')
        ->limit(10)
        ->get();
@endphp
<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Deals</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            <div class="item">
                <div class="products special-product">
                    @foreach ($special_deals as $product)
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                </a> </div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->product_slug_en) }}">
                                                    @if (session()->get('Language') == 'hindi')
                                                        {{ $product->product_name_hin }}
                                                    @else
                                                        {{ $product->product_name_en }}
                                                    @endif
                                                </a>
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            @if ($product->discount_price == null)
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->selling_price }}
                                                    </span> </div>
                                            @else
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->discount_price }}
                                                    </span> <span
                                                        class="price-before-discount">{{ $product->selling_price }}</span>
                                                </div>
                                            @endif

                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
