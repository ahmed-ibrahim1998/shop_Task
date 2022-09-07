@extends('front.layouts.site')

@section('content')
    <div id="main">

        <section id="content" class="page-home pagehome-three">
            <div class="container">

                <div class="row">
                    <h1>First Product</h1><br>
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{route('product.details',$product->id)}}"><img style="" src="{{$product->image}}" class="card-img-top"></a>
                                <div class="card-body">
                                    <h3 class="card-title">{{$product->product_name}} <span
                                            class="text-right primary font-weight-bold">{{$product->price}}</span>
                                    </h3>
                                    <p class="card-text">

                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <h1>Second Product</h1><br>
                    @foreach($secondProducts as $product)

                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{route('product.details',$product->id)}}"><img style="" src="{{$product->image}}" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h3 class="card-title">{{$product->product_name}} <span
                                            class="text-right primary font-weight-bold">{{$product->price}}</span>
                                    </h3>
                                    <p class="card-text">

                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


    </div>
@endsection
