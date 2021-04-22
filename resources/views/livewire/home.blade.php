<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class="px-6 py-4 flex items-center justify-between">
                @livewire('create-product')

                <x-jet-input type="text" wire:model="search" name="search" placeholder="Buscar" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" />
            </div>

            @if($stocks->count())
                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        wire:click="order('products.name')"
                        class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Producto
                        {{-- Sort Icon --}}
                        @if($sort == 'products.name')
                            @if($direction == 'ASC')
                                <i class="fas fa-sort-up float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-down float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col"
                        wire:click="order('expiration')"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vencimiento
                        {{-- Sort Icon --}}
                        @if($sort == 'expiration')
                            @if($direction == 'ASC')
                                <i class="fas fa-sort-up float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-down float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col"
                        wire:click="order('stock')"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cantidad
                        {{-- Sort Icon --}}
                        @if($sort == 'stock')
                            @if($direction == 'ASC')
                                <i class="fas fa-sort-up float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-down float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
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
                                <img class="h-10 w-10 object-cover rounded-full"
                                     src="{{ $stock->product->imageURL() }}"
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
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="text-sm text-gray-900">
                            <span style="color: {{ $stock->statusColor() }}">
                                <i class="fas fa-circle fa-xs"></i>
                            </span>
                            <span>
                                {{ ($stock->expiration) ? $stock->expiration->format('d/m/Y') : "No tiene :)" }}
                            </span>
                        </div>
                        <div class="text-sm text-gray-500">{{ ($stock->expiration) ? $stock->expiration->diffForHumans() : "" }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                        @livewire('product-count', ['stock' => $stock], key($stock->id))
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        @livewire('product-edit', ['stock' => $stock], key($stock->id))
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
