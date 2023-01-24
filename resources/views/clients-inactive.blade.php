<x-layout :title="'Inactive Clients'">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Inactive Clients
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-fit">
                    <div>
                        <h2 class="w-fit mx-auto text-lg">
                            List of clients which have never ordered any liquid items
                        </h2>
                        @if($addresses->isEmpty())
                            <p>No addresses found!</p>
                        @else
                            <table class="border-separate border-spacing-x-2">
                                <thead>
                                <th>Name</th>
                                <th>Address</th>
                                </thead>
                                <tbody>
                                @foreach($addresses as $address)
                                    <tr>
                                        <td>{{$address->name}}</td>
                                        <td>{{$address->title}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
