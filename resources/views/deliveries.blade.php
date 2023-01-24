<x-layout :title="'Deliveries'">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Deliveries
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-fit">
                    <h2 class="w-fit mx-auto text-lg">
                        Client Info
                    </h2>

                    <p>Name: {{$client->value('name')}}</p>
                    <p>Phone: {{$client->value('phone')}}</p>
                    <p>E-mail: {{$client->value('email')}}</p>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-fit">
                    <h2 class="w-fit mx-auto text-lg">
                        List of deliveries
                    </h2>

                    @if($deliveries->isEmpty())
                        <p>No deliveries found!</p>
                    @else

                        <table class="border-separate border-spacing-x-2">
                            <thead>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Total price</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                            @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{$delivery->address}}</td>
                                    <td>{{$delivery->date}}</td>
                                    <td>{{$delivery->price}}</td>
                                    <td>{{$delivery->statusFormatted}}</td>
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
