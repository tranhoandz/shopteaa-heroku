@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
	        <!-- Hero Area Start -->
            <div class="ht-hero-section fix">
                <div class="ht-hero-slider">
                    @foreach ($banner as $value)
                        <!-- Single Slide Start -->
                    <div class="ht-single-slide" style="background-image: url({{url('public/uploads')}}/{{$value->image}})">
                        <div class="ht-hero-content-one container">
                            {{-- <h3>For Get Me Not</h3> --}}
                            <h1 class="cssanimation leDoorCloseLeft sequence title-logo">{{$value->title}}</h1>
                         <p>{{$value->content}}</p>
                            {{-- <a href="{{route('shop')}}" class="default-btn large circle blue hover-blue uppercase">Shop now</a> --}}
                        </div>
                    </div>
                    <!-- Single Slide End -->
                    @endforeach
                    
                </div>
            </div>
        <!-- Protuct Area Start -->
        <div class="product-area bg-1 pt-110 pb-80 product-two-area">
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-img d-flex justify-content-center">
                        <img src="{{url('public')}}/frontend/img/icon/title.png" alt="">
                    </div>
                    <h2><span> </span>Sản phẩm nổi bật</h2>
                </div>
            </div>
            <div class="container">
                <div class="product-tab-list nav" role="tablist">
                    <a class="active" href="#tab1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="tab1">Trà mix</a>
                    <a href="#tab2"  class="" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tab2">Trà mộc</a>
                    {{-- <a href="#tab3" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tab3">juices</a> --}}
                    {{-- <a href="#tab4" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tab4">bread</a> --}}
                </div>
                <div class="tab-content text-center">
                    <div class="tab-pane active show fade" id="tab1" role="tabpanel">
                        <div class="product-carousel">
                            @foreach ($product_mix as $product)
                            @if (($product->id_detail != 0) && ($product->quantity > 0) )
                                    <div class="custom-col">
                                        <div class="single-product-item">
                                            <div class="product-image image-cus">
                                                <a
                                                    href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">
                                                    <img src="{{ url('public/uploads') }}/{{ $product->image }}" alt="">
                                                    @if ($product->discount > 0)
                                                        <div class="pro-discount text-center">-{{ $product->discount }}%</div>
                                                    @endif
                                                </a>
                                                @if ($product->quantity > 0)
                                                    <div class="product-hover">
                                                        <ul class="hover-icon-list">
                                                            <li>
                                                                @if (Auth::check())
                                                                    <a
                                                                        href="{{ route('add-wishlist', ['id_user' => Auth::guard('user')->user()->id, 'id_detail' => $product->id_detail]) }}"><i
                                                                            class="icon icon-Heart"></i></a>
                                                                @else
                                                                    <a class="" data-toggle="modal" href='#dang-nhap'><i
                                                                            class="icon icon-Heart"></i></a>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                            </li>
                                                        </ul>
                                                        <button type="button" class="p-cart-btn">Thêm vào giỏ hàng</button>
                                                    </div>
                                                @else
                                                    <div class="product-hover">
                                                        <ul class="hover-icon-list bg-danger p-5">
                                                            <li>
                                                                <h3 >Hết hàng</h3>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-text mt-3">
                                                <div class="product-rating">
                                                    {{-- <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i> --}}
                                                </div>
                                                <h5><a
                                                        href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">{{ $product->name }}</a>
                                                </h5>
                                                @if ($product->discount > 0)
                                                    <div class="pro-price">
                                                        <span
                                                            class="new-price">{{ number_format($product->price - ($product->price * $product->discount) / 100) }}đ</span>
                                                        <span class="old-price">{{ number_format($product->price) }}đ</span>
                                                    </div>
                                                @else
                                                    <div class="pro-price">
                                                        <span class="new-price">{{ number_format($product->price) }}đ</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                        <div class="product-carousel">
                            @foreach ($product_moc as $product)
                            @if (($product->id_detail != 0) && ($product->quantity > 0) )
                                    <div class="custom-col">
                                        <div class="single-product-item">
                                            <div class="product-image image-cus">
                                                <a
                                                    href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">
                                                    <img src="{{ url('public/uploads') }}/{{ $product->image }}" alt="">
                                                    @if ($product->discount > 0)
                                                        <div class="pro-discount text-center">-{{ $product->discount }}%</div>
                                                    @endif
                                                </a>
                                                @if ($product->quantity > 0)
                                                    <div class="product-hover">
                                                        <ul class="hover-icon-list">
                                                            <li>
                                                                @if (Auth::check())
                                                                    <a
                                                                        href="{{ route('add-wishlist', ['id_user' => Auth::guard('user')->user()->id, 'id_detail' => $product->id_detail]) }}"><i
                                                                            class="icon icon-Heart"></i></a>
                                                                @else
                                                                    <a class="" data-toggle="modal" href='#dang-nhap'><i
                                                                            class="icon icon-Heart"></i></a>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                <a href="{{ url()->current() }}"><i class="icon icon-Restart"></i></a>
                                                            </li>
                                                        </ul>
                                                        <button type="button" class="p-cart-btn">Thêm vào giỏ hàng</button>
                                                    </div>
                                                @else
                                                    <div class="product-hover">
                                                        <ul class="hover-icon-list bg-danger p-5">
                                                            <li>
                                                                <h3 >Hết hàng</h3>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-text mt-3">
                                                <div class="product-rating">
                                                    {{-- <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o color"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i> --}}
                                                </div>
                                                <h5><a
                                                        href="{{ route('product-detail', ['slug' => $product->slug, 'id_detail' => $product->id_detail]) }}">{{ $product->name }}</a>
                                                </h5>
                                                @if ($product->discount > 0)
                                                    <div class="pro-price">
                                                        <span
                                                            class="new-price">{{ number_format($product->price - ($product->price * $product->discount) / 100) }}đ</span>
                                                        <span class="old-price">{{ number_format($product->price) }}đ</span>
                                                    </div>
                                                @else
                                                    <div class="pro-price">
                                                        <span class="new-price">{{ number_format($product->price) }}đ</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Protuct Area End -->
        <!-- Blog Area Start -->
        <div class="blog-area pb-95">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <div class="section-img d-flex justify-content-center">
                        <img src="{{url('public')}}/frontend/img/icon/title.png" alt="">
                    </div>
                    <h2><span></span>Tin tức mới nhất</h2>
                </div>
            </div>
            <div class="container">
                <div class="custom-row">
                    <div class="blog-carousel">
                        @foreach ($blog as $value)
                        <div class="custom-col text-center">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="{{ route('blog_detail', ['slug' => $value->slug, 'id' => $value->id]) }}"><img
                                            src="{{ url('public/uploads') }}/{{ $value->image }}" alt=""></a>
                                </div>
                                <div class="blog-text">
                                    <h4><a
                                            href="{{ route('blog_detail', ['slug' => $value->slug, 'id' => $value->id]) }}">{{ $value->name }}</a>
                                    </h4>
                                    <div class="post-meta">
                                        <span class="author-name">post by:
                                            <span>{{ $value->admins->name }}</span>
                                        </span>
                                        - <span class="post-date"> {{ $value->created_at }}</span>
                                    </div>
                                    <p>{{ $value->meta_desc }}
                                    </p>
                                    <a href="{{ route('blog_detail', ['slug' => $value->slug, 'id' => $value->id]) }}"
                                        class="default-btn">Read more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
@stop