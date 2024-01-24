<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Product name" required />
                    <input type="text" name="qty" placeholder="Product qty" required />
                    <input type="text" name="price" placeholder="Product price" required />
                    <textarea name="description" placeholder="Product description" required></textarea>
                    <input type="file" name="image" />
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
