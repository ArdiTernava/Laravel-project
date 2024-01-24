<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('products.create') }}">Create product</a>
                <br /><br />
                @if($products &&  count($products) > 0)
                <div class="table-responsive">
                    <table class="table table-borders">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->price  }} &euro;</td>
                            
                            <td>
                                <a href="{{ route('products.edit', ['product' => $product->id]) }}"> Edit</a>
                                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                    <p>0 product</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
