<x-layout :title="'Clients'">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Clients
        </h2>
    </x-slot>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="grid grid-cols-2">

                    <div>
                        <h2 class="w-fit mx-auto text-lg">
                            List of clients
                        </h2>
                        <table class="w-full">
                            <thead>
                            <th>Name</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>
                                        {{$client->name}}
                                    </td>

                                    <td class="w-fit flex flex-wrap">
                                        <x-button id="ajaxButton{{$client->id}}" class="ajaxButton" type="button">
                                            Addresses
                                        </x-button>

                                        <a href="{{route('deliveries', $client->id)}}">
                                            <x-button type="button">
                                                Deliveries
                                            </x-button>
                                        </a>
                                    </td>
                                </tr>

                                <script>
                                    $('#ajaxButton{{$client->id}}').click(function () {
                                        $.ajax({
                                            url: "{{route('addresses')}}",
                                            type: 'POST',
                                            dataType: 'json',
                                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                            data: {client_id: {{$client->id}}},
                                            success: function (data) {
                                                $('#addressList').replaceWith('<div id="addressList">' + data.addresses + '</div>');
                                            }
                                        })
                                    });
                                </script>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <h2 class="w-fit mx-auto text-lg">
                            List of addresses
                        </h2>
                        <div id="addressList"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
