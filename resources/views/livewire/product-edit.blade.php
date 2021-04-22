<div>
    <div wire:click="$set('open', true)">
        <a href="#" class="text-indigo-600 active:text-indigo-300"><i class="fas fa-edit"></i></a>
    </div>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar un nuevo Producto {{ $stock }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <x-jet-label value="Nombre del Producto"/>
                    <x-jet-input type="text" autocomplete="off" class="form-input w-full"/>

                    <x-jet-input-error for="name"/>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="close()">
                Cerrar
            </x-jet-secondary-button>
{{--            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="disabled:opacity-25">--}}
{{--                Actualizar Producto--}}
{{--            </x-jet-button>--}}
        </x-slot>
    </x-jet-dialog-modal>
</div>
