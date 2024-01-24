<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    

                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                    @role('admin')

                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('slides.index')}}">Slide {{$slides}}</a></div>
                            </div>
                            
                        </div>
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('products.index')}}">Product {{$products}}</a></div>
                            </div>
                        </div>
                        @endrole
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('orders.index')}}">Order {{$orders}}</a></div>
                            </div>
                        </div>
                        
                    
                        
                    </div>
                    
            </div>
        </div>
    </div>
</x-app-layout>
