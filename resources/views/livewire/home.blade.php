<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class="px-6 py-4">
                <x-jet-input type="text" wire:model="search" name="search" placeholder="Buscar" class="float-right mb-4 bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" />
{{--                <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar"/>--}}
            </div>

            @if($stocks->count())
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Producto
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vencimiento
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cantidad
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($stocks as $stock)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full"
                                     src="{{ $stock->product->image }}"
                                     alt="{{ $stock->product->name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $stock->product->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    texto secundario
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <span style="color: {{ $stock->statusColor() }}">
                                <i class="fas fa-circle fa-xs"></i>
                            </span>
                            <span>
                                {{ $stock->expiration->format('d/m/Y') }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-500">{{ $stock->expiration->diffForHumans() }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $stock->stock }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach

                <!-- More items... -->
                </tbody>
            </table>
            @else
                <div class="px-6 py-4">
                    No hay productos
                </div>
            @endif
        </x-table>
    </div>
</div>
