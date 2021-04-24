<div>
    <div wire:click="$set('open', true)">
        <a href="#" class="text-indigo-600 active:text-indigo-300"><i class="fas fa-edit"></i></a>
    </div>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar stock de <b>{{ $stock->product->name }}</b>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <div class="">
                    <x-jet-label value="Nombre del Producto"/>
                    <x-jet-input type="text" autocomplete="off" class="form-input w-full"/>

                    <x-jet-input-error for="name"/>
                </div>
                <div class="row-span-2 w-full">
                    <img class="mx-auto" src="{{ $stock->product->imageURL() }}" alt="">
                </div>

                <div class="">
                    <x-jet-label value="Fecha de Vencimiento"/>
                    <x-jet-input
                        type="date"
                        class="form-control"
                        {{--wire:model.defer="expiration"--}}
                        value="{{ $stock->expiration ? $stock->expiration->format('Y-m-d') : '' }}"></x-jet-input>
                </div>

                <div class="">
                    <x-jet-label value="Cantidad"/>
                    <x-jet-input type="number" class="form-control" {{--wire:model.defer="stock"--}}></x-jet-input>

{{--                    @if($stockExists)--}}
{{--                        <div>--}}
{{--                            <x-jet-checkbox name="merge" wire:model="merge"></x-jet-checkbox>--}}
{{--                            <label class="font-medium text-sm text-gray-500" for="merge">Combinar cantidad con el producto ya cargado</label>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>

{{--                @if(!$product && $name)--}}
{{--                    <div class="">--}}
{{--                        <x-jet-label value="Imagen URL"/>--}}
{{--                        <x-jet-input type="text" class="form-control w-full" onClick="this.select();" wire:model.lazy="imageInput"></x-jet-input>--}}
{{--                    </div>--}}
{{--                @endif--}}
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
