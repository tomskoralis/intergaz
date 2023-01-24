<x-layout :title="'Recent Deliveries'">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Recent Deliveries
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-fit">
                    <h2 class="w-fit mx-auto text-lg">
                        {{$count}} most recent deliveries
                    </h2>

                    @if($deliveries->isEmpty())
                        <p>No deliveries found!</p>
                    @else

                        <table class="border-separate border-spacing-x-2">
                            <thead>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Items</th>
                                <th>Total price</th>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{$delivery->clientName}}</td>
                                    <td>{{$delivery->address}}</td>
                                    <td>{{$delivery->items}}</td>
                                    <td>{{$delivery->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
