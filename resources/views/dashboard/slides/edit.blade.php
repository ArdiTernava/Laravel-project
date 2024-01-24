<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('slides.update', ['slide' => $slide->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" placeholder="Enter title" value="{{ $slide->title }}" />
                    <input type="text" name="subtitle" placeholder="Enter subtitle" value="{{ $slide->subtitle }}" />
                    <input type="file" name="image" />
                    <span>Current image:</span>
                    <img src="{{ asset('storage/slides/'.$slide->image) }}" class="d-inline" width="100px" alt="{{ $slide->title }}" />
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
