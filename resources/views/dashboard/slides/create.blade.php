<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Enter title" required />
                    <input type="text" name="subtitle" placeholder="Enter subtitle"  required/>
                    <input type="file" name="image" />
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
