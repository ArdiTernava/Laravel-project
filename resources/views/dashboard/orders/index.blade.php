<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br /><br />
                @if(Session::has('status'))
                {{Session::get('status')}}
                @endif
                @if($orders &&  count($orders) > 0)
                <div class="table-responsive">
                    <table class="table table-borders">
                        <tr>
                            <th>#</th>
                            <th>Custmoer</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>total</th>
                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->fullname }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{number_format( $order->total, 2,'.','')}} &euro;</td>
                           
                            <td>
                                <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
