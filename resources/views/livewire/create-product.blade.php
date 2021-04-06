<div>
    <x-jet-button wire:click="$set('open', true)">
        Agregar Producto
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar un nuevo Producto
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre del Producto"/>
                <x-jet-input autocomplete="off" id="product-name-input" type="text" class="form-input w-full" wire:model.defer="name"/>

                <x-jet-input-error for="name"/>

            </div>
            <div class="mb-4">
                <x-jet-label value="Fecha de Vencimiento"/>
                <x-jet-input type="date" class="form-control" wire:model.defer="expiration"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Cantidad"/>
                <x-jet-input type="number" class="form-control" wire:model.defer="stock"></x-jet-input>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="save">
                Crear post
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>


    <script>
        document.addEventListener('livewire:load', function () {
            var availableProducts = @this.availableProducts;
            $( "#product-name-input" ).autocomplete({
                source: availableProducts
            });
        })
    </script>
</div>


