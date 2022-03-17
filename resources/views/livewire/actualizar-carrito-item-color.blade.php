<div x-data>
    <button 
        class="btns"
        @if ($qty <= 1)
        disabled  
        x-bind:disabled="$wire.qty <= 1"
        @endif
        wire:loading.attr="disabled" 
        wire:target="decrement" 
        wire:click="decrement">-
    </button> 

    <span class="numero">{{$qty}}</span> 
        
    <button class="btns"
        @if ($qty >= $cantidad )
            disabled
            x-bind:disabled="$wire.qty >= $wire.cantidad"
        @endif
        wire:loading.attr="disabled" 
        wire:target="increment" 
        wire:click="increment">+
    </button>  
</div>
