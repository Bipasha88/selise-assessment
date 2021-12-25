@extends('layouts.app')

@section('title', 'All Products')

@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class=" col-md-12 ">
            <div class="card">
                <div class=" ripple" data-mdb-ripple-color="light">
                    <img src="{{$product->image_url}}" class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{$product->title}}</h3>

                    <div class="text-muted">
                        <br>
                        <b>Price : {{$product->price}}</b>

                    </div>
                    <br>
                    <div class="">
                        <p class="card-text">
                            {!! $product->description !!}
                        </p>
                    </div>
                    <br>
                    <a href="{{route('addToCart',$product->id)}}" class="btn btn-primary">Add To Cart</a>
                </div>

            </div>
        </div>
    </div>
@endsection
