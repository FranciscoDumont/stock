<div>
    <x-jet-button wire:click="$set('open', true)">
        Agregar Producto
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar un nuevo Producto
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <x-jet-label value="Nombre del Producto"/>
                    <x-jet-input type="text" autocomplete="off" id="product-name-input" class="form-input w-full" wire:model.debounce.500ms="name"/>

                    <x-jet-input-error for="name"/>

                </div>

                <div class="row-span-2 w-full">
                    @if($name)
                        <img class="mx-auto" src="{{ $imageURL }}" alt="">
                    @endif
                </div>

                <div class="">
                    <x-jet-label value="Fecha de Vencimiento"/>
                    <x-jet-input type="date" class="form-control" wire:model.defer="expiration"></x-jet-input>
                </div>

                <div class="">
                    <x-jet-label value="Cantidad"/>
                    <x-jet-input type="number" class="form-control" wire:model.defer="stock"></x-jet-input>

                    @if($stockExists)
                        <div>
                            <x-jet-checkbox name="merge" wire:model="merge"></x-jet-checkbox>
                            <label class="font-medium text-sm text-gray-500" for="merge">Combinar cantidad con el producto ya cargado</label>
                        </div>
                    @endif
                </div>

                @if(!$product && $name)
                    <div class="">
                        <x-jet-label value="Imagen URL"/>
                        <x-jet-input type="text" class="form-control w-full" onClick="this.select();" wire:model.lazy="imageInput"></x-jet-input>
                    </div>
                @endif
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="close()">
                Cerrar
            </x-jet-secondary-button>
            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="disabled:opacity-25">
                Cargar Producto
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>


    <script>
        document.addEventListener('livewire:load', function () {
            var availableProducts = @this.availableProducts;
            $( "#product-name-input" ).autocomplete({
                source: availableProducts,
                select: function (event, ui){
                    @this.name = ui.item.value
                }
            });
        })
    </script>
</div>


