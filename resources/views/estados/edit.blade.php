<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar estados
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div>
                <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="post" action="{{ route('estados.update', $estado->id) }}">
                            @csrf
                            @method('put')
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <label for="mensaje" class="block font-medium text-sm text-gray-700">mensaje</label>
                                    <input type="text" name="mensaje" id="mensaje" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('mensaje', $estado->mensaje) }}" />
                                    @error('mensaje')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                              
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
</x-app-layout>