@extends('layout.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row">
            @foreach($products as $p)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{asset('images/'. $p->id .'.jpg')}}" alt="">
                    <div class="caption">
                        <h4>{{$p->product_name}}</h4>
                       
                        <p><strong>Price: </strong> {{$p->product_price}}</p>
                        <p class="btn-holder">
                            <a href="{{url('add-to-cart/'.$p->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection