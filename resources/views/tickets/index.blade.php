<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div>
                    <div class="max-w-6xl mx-auto">
                        

    <div class="py-6">
        <div class="max-w-7xl mx-auto " style="width:40%; float:left; margin-bottom:50px">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <div class="max-w-6xl mx-auto">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="align-middle inline-block min-w-full">
                                    <div class="shadow bloque_chat border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200 w-full">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tickets Creados
                                                </th>
                                                <th scope="col" width="50" class="px-6 py-3 bg-gray-50">
            
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($tickets as $ticket)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $ticket->ticket }}<br>
                                                        {{ $ticket->contact_name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    
                                                        <a href="{{ route('tickets.edit', $ticket->ticket) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Ver</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
