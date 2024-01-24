@extends('layouts.front')
@section('title', 'Shop')

@section('content')
        <!-- Search -->
        <section class="searech pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <form action="{{route('shop')}}" method="GET">
                            <input type="search" name="search" id="search" class="form-control" placeholder="Search products" required @if( Request::get("search")) value="{{ Request::get('search')}}"  @endif/>
                        </form>
                    </div>
                    <div class="col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-12 offset-sm-0">
                        <form action="{{route('shop')}}" method="GET">

                            <select name="sort" id="sort" class="form-control" required>
                                <option value="">Sort by</option>
                                <option value="name_asc"  @if( Request::get("sort") && Request::get('sort') === 'name_asc')  selected @endif>Name A-Z</option>
                                <option value="name_desc"  @if( Request::get("sort") && Request::get('sort') === 'name_desc') selected @endif >Name Z-A</option>
                                <option value="price_asc"  @if( Request::get("sort") && Request::get('sort') === 'price_asc') selected @endif >Price L-H</option>
                                <option value="price_desc"  @if( Request::get("sort") && Request::get('sort') === 'price_desc') selected @endif >Price H-L</option> 
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <!-- Products -->
        <section class="products py-5">
            <div class="container">
                <div class="row">
                    @if($products && count($products) > 0)
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card"  id="cardshop">
                        <img src="{{ asset('storage/products/'.$product->image) }}" class="d-inline" width="150px" height="150px" alt="{{ $product->title }}" />
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">{{$product->price}}</p>
                                <a href="{{route('products.show',['product' => $product->id]) }}" class="btn btn-primary">view details</a>
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
                {{$products ->links()}}
            </div>
        </section>
@endsection

@section('js')

document.getElementById('sort').addEventListener('change',(e)=>{

    window.location.href = '?sort='+ e.target.value
})
@endsection 