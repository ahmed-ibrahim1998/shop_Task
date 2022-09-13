@extends('front.layouts.site')

@section('content')
    <br>
    <br>

    <div id="main">

        <section id="content" class="page-home pagehome-three">
            <div class="container">

                <div class="row">
                    <h1>First Product</h1><br>
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{route('product.details',$product->id)}}"><img style="height: 100%; width: 100%;"
                                                                                         src="{{$product->image}}"
                                                                                         class="card-img-top mb-5"></a>
                                <div class="card-body">
                                    <h3 class="card-title text-center">اسم المنتج : {{$product->product_name}}
                                        <br><br><br><span class="text-right primary font-weight-bold">سعر المنتج : {{$product->price}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <br>
                <br>
                <div class="row">
                    <h1>Second Product</h1><br>
                    @foreach($secondProducts as $product)
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <a href="{{route('product.details',$product->id)}}"><img style="height: 100%; width: 100%;"
                                                                                         src="{{$product->image}}"
                                                                                         class="card-img-top mb-5" alt="..."></a>
                                <div class="card-body">
                                    <h3 class="card-title text-center">{{$product->product_name}} <br><br><br><span
                                            class="text-right primary font-weight-bold">{{$product->price}}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
    </div>
    </section>


    </div>
@endsection
