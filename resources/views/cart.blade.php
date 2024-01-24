@extends('layouts.front')
@section('title', 'Cart')

@section('content')

        
        <!-- Cart -->
        <section class="cart py-5">
            <div class="container">
            @if(Session::has('cart_status'))
                {{Session::get('cart_status')}}
                @endif
                @if(count(Cart::getContent()) > 0)
                <h3>Cart</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Product</th>
                            <th scope="col" width="150px">Qty</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\Cart::getContent() as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td class="d-flex justify-content-between">
                                    <a href="{{route('cart.dec', ['item'=> $item->id]) }}" class="btn btn-sm btn-outline-primary">-</a>
                                    <p>{{$item->quantity}}</p>
                                    <a href="{{route('cart.inc', ['item'=> $item->id]) }}" class="btn btn-sm btn-outline-primary">+</a>
                                </td>
                                <td>{{number_format($item->quantity * $item->price,2,".","")}} &euro; </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot >
                           <td colspan="2"></td>
                           <td ><strong> {{ \Cart::getTotal()}}</strong></td>

                        </tfoot>
                    </table>
                </div>
                @else
                <p>
                    cart is empty
                </p>

                @endif
                

                <!-- Checkout -->
                
                @if(count(\Cart::getContent())> 0)
                @auth
                <h3 class="mt-5">Checkout</h3>
                <form action="{{route('cart.checkout')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" required />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required />
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text"  name="phone" class="form-control" id="phone" required />
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
                @endif
                @endauth
                @guest
                <br/>
                @if(count(\Cart::getContent())) @endif
              <p> Pleas <a href="{{url('/login')}}">Login</a> to check <output></output></p> 
                @endguest
            </div>
        </section>
@endsection
        