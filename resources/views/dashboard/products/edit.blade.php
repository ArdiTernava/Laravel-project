<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" placeholder="Product name" required value="{{ $product->name }}" />
                    <input type="text" name="qty" placeholder="Product qty" required value="{{ $product->qty }}" />
                    <input type="text" name="price" placeholder="Product price" required value="{{ $product->price }}" />
                    <textarea name="description" placeholder="Product description" required>{{ $product->description }}</textarea>
                    <input type="file" name="image" />
                    <span>Current image:</span>
                    <img src="{{ asset('storage/products/'.$product->image) }}" class="d-inline" width="100px" alt="{{ $product->name }}" />
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

