@extends('layouts.front')
@section('title', 'Home')

@section('content')

                <!-- Slider -->
      @if($slides)
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner">
                @foreach($slides as $slide)
                <div class="carousel-item active">
                    <img src="{{ asset('storage/slides/'. $slide->image )}}" width="100%" height="500px" class="d-block w-100" alt="{{ $slide->title }}">  
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slide->title }}</h5>
                        <p>{{ $slide->subtitle }}</p>
                    </div> 
                </div> 
                @endforeach
            </div> 
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        @endif

       <!-- Latest products (4) -->
        <section class="latest-products   py-5">
            <div class="container">
                <h2 class="mb-5 text-center" id="h1">New Arrivals</h2>
                <p id="p1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, harum excepturi non rem iure</p>
                <div class="row" id="card1">
                    @if($products && count($products) > 0)
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card">
                        <img src="{{ asset('storage/products/'. $product->image) }}"width="196px" height="200px" class="d-inline" width="100px" alt="{{ $product->title }}" />
                            <div class="card-body">
                                <h5 class="card-title" id="h5-products">{{$product->name}}</h5>
                                <p class="card-text"  id="p-products">{{$product->price}}&euro;</p>
                                <a href="{{route('products.show',['product' => $product->id]) }}" id="latest-btn" class="btn">view details</a>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                    @else
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        0 producs

                    </div>
                    </div>

                    @endif
                </div>
            </div>
        </section>

        <!-- Intro -->
        <section class="intro py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <img src="https://d19h8kn98xvxar.cloudfront.net/images/_hero/connectwithnature.jpg"  id="img"class="card-img-top" alt="...">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h3 id="title-h3">eStore</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, sit. Corporis sit optio minima saepe sunt voluptas eaque aliquid quibusdam natus quod eos earum adipisci itaque placeat, tenetur at aspernatur.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate ut quos dolor, porro ipsam temporibus fugiat! Sed, totam voluptatum dicta possimus nesciunt explicabo, cum quasi quae ut impedit vitae. Eligendi.
                        </p>
                        <a href="#" id="button-intro">Read more</a>
                    </div>
                </div>
            </div>
        </section>
@endsection

        