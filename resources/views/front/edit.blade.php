@extends('front.layouts.site')

@section('content')
    <div id="wrapper-site">

        <nav data-depth="3" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="{{url('/site')}}">
                                <span itemprop="name">Home</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>

                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="">
                                <span itemprop="name">{{$firstorsecondProductDetails->product_name}}</span>
                            </a>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>


        <div class="no-index">
            <div id="content-wrapper">



                <section id="main" itemscope="" itemtype="https://schema.org/Product">
                    <div class="product-detail-top">
                        <div class="container">
                            <h1 class="name">{{$firstorsecondProductDetails->number}} : product</h1> <br>  <br>
                            <div class="row main-productdetail" data-product_layout_thumb="list_thumb"
                                 style="position: relative;">
                                <div class="col-lg-5 col-md-4 col-xs-12 box-image">
                                    <section class="page-content" id="content">
                                        <div class="images-container list_thumb">
                                            <div class="product-cover">
                                                <img class="js-qv-product-cover img-fluid"
                                                     src="{{$firstorsecondProductDetails->image}}"
                                                     alt="" title="" style="width:100%;" itemprop="image">
                                                <div class="layer hidden-sm-down" data-toggle="modal"
                                                     data-target="#product-modal">
                                                    <i class="fa fa-expand"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-lg-7 col-md-8 col-xs-12 mt-sm-20">
                                    <div class="product-information">
                                        <div class="product-actions">

                                            <div class="productdetail-right col-12 col-lg-6 col-md-6">
                                                <h1 class="detail-product-name"
                                                    itemprop="name">{{$firstorsecondProductDetails->product_name}}</h1>
                                                <div
                                                    class="group-price d-flex justify-content-start align-items-center">
                                                    <div class="product-prices">
                                                        <div class="product-price " itemprop="offers" itemscope=""
                                                             itemtype="https://schema.org/Offer">
                                                            <div
                                                                class="current-price"> السعر قبل الخصم
                                                                : <span
                                                                    style="font-size:20px ;font-weight:bold">{{$firstorsecondProductDetails->price}}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                            </div>
                                            <form method="post"
                                                  action="{{route('first-product.buy',$firstorsecondProductDetails->id) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="product-quantity">
                                                        <label class="font-weight-bold">ادخل الكمية</label>
                                                        <br>
                                                        <input type="number" name="quantity" class="input-group"
                                                               required>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success" type="submit"> شراء</button>

                                            </form>
                                            <div class="product-prices">
                                                <div class="product-price " itemprop="offers" itemscope=""
                                                     itemtype="https://schema.org/Offer">
                                                    <div
                                                        class="current-price" style="font-size:20px ;font-weight:bold">السعر بعد الشراء
                                                        : {{$firstorsecondProductDetails->total_price}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection


@include('front.includes.not-logged')
@include('front.includes.alert')   <!-- we can use only one with dynamic text -->
@include('front.includes.alert2')

@section('scripts')
@stop
