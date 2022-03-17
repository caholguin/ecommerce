<div x-data>   

    {{-- {{$producto->stock}}  --}}
    
    <br>
    <span style="font-size: 20px">Stock disponible: {{$cantidad}}</span>
    <br>
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

        <button class="btn-carrito espacio"
            @if ($qty > $cantidad)
                disabled            
            @endif
            wire:click="agregarItem"
            wire:loading.attr="disabled"
            wire:target="agregarItem"           
            >Agregar al carrito
        </button> 
</div>
