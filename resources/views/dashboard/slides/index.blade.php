<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Slides') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('slides.create') }}">Create slide</a>
                <br /><br />
                @if($slides &&  count($slides) > 0)
                <div class="table-responsive">
                    <table class="table table-borders">
                        <tr>
                            <th>#</th>
                            <th>Slide</th>
                            <th></th>
                        </tr>
                        @foreach($slides as $slide)
                        <tr>
                            <td>{{ $slide->id }}</td>
                            <td>
                                {{ $slide->title }}
                                <br />
                                {{ $slide->subtitle }}
                            </td>
                            <td>
                                <a href="{{ route('slides.edit', ['slide' => $slide->id]) }}"> Edit</a>
                                <form action="{{ route('slides.destroy', ['slide' => $slide->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                    <p>0 slides</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
