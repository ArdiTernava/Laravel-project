@extends('layouts.front')
@section('title')
    {{ $product->name }}
@endsection

@section('content')
        <!-- Product -->
        <section class="product py-5">
            <div class="container">
                <div class="row">
                    @if($product)
                    <div class="col-lg-5 col-md-5 col-sm-12">
                    <img src="{{ asset('storage/products/'.$product->image) }}" class="d-inline" width="100px" alt="{{ $product->title }}" />
                     </div>
                      
                        <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-12 offset-sm-0">
                            <h5>{{ $product->name }}</h5>
                            <p>In stock: {{ $product->qty }} / {{ $product->price }} &euro;</p>
                            <p>{{ $product->description }}</p>
                            <br /><br />
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if( Session::has('status') )
                                {{ Session::get('status') }}
                            @endif
                            @if($product->qty > 0)
                            <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" class="d-flex align-items-start gap-2">
                                @csrf
                                <div>
                                    <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" max="{{ $product->qty }}" />
                                    <small>Qty must be {{ $product->qty }} or less</small>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Add to cart</button>
                            </form>
                            @else 
                                <p class="text-danger">{{$product->name}} is out of stock!</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </section>
@endsection
    
