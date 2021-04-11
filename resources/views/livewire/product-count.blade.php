<div>
    <button wire:click="substract"
        class="focus:outline-none transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-transparent hover:bg-pink-500 text-pink-700 text-xs font-semibold hover:text-white py-0 px-1 content-center border border-pink-500 hover:border-transparent rounded-full">
        -
    </button>

    <span class="mr-3 ml-3">
        {{ $stock->stock }}
    </span>

    <button wire:click="add"
        class="focus:outline-none transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-transparent hover:bg-green-500 text-green-700 text-xs font-semibold hover:text-white py-0 px-1 content-center border border-green-500 hover:border-transparent rounded-full">
        +
    </button>
</div>
