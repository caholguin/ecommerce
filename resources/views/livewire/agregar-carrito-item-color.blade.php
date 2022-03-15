<div x-data>
    <select wire:model="color_id" name="" id="">
        <option value="" selected disabled>Seleccione un color</option>
        @foreach ($colores as $color)
            <option value="{{$color->id}}">{{$color->nombre}}</option>            
        @endforeach        
    </select>


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
        @if ($qty >= $cantidad)
            disabled
            x-bind:disabled="$wire.qty >= $wire.cantidad"
        @endif
            wire:loading.attr="disabled" 
            wire:target="increment" 
            wire:click="increment">+</button>    

            <button  class="btn-carrito espacio" 
            @if (!$cantidad)
                disabled
            @endif>
            Agregar al carrito</button> 

    
</div>
