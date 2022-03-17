<div x-data>
    <select wire:model="talla_id" name="" id="">
        <option value="" selected disabled>Seleccione una talla</option>
        @foreach ($tallas as $talla)
            <option value="{{$talla->id}}">{{$talla->nombre}}</option>            
        @endforeach        
    </select>
{{-- wire:model="color_id" --}}
    <select wire:model="color_id"  name="" id="">
        <option value="" selected disabled>Seleccione un color</option>
        @foreach ($colores as $color)
            <option value="{{$color->id}}">{{__($color->nombre)}}</option>            
        @endforeach        
    </select> 

    <br>
    <span style="font-size: 20px">Stock disponible: 
        @if ($cantidad)
           {{$cantidad}}
       @else
           {{$producto->stock}}    
       @endif  
       
   </span>
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
     @endif 
     wire:click="agregarItem"
     wire:loading.attr="disabled"
      wire:target="agregarItem"
    >Agregar al carrito</button> 
</div>
