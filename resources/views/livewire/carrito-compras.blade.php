<div class="card-detalle-carrito-compras">
    <section class="contenedor">
		<div class="contenedor-detalle">
			<div class="card-detalle-carrito" >
				<div class="textos">
                    @if (Cart::count())                       
                    
					    <h1>Carrito de compras</h1>
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th></th>                                
                                    <th class="titulo-detalle-carrito">Precio</th>
                                    <th class="titulo-detalle-carrito">Cantidad</th>
                                    <th class="titulo-detalle-carrito">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                
                                <tr>
                                    <td>
                                        <div class="box">
                                            <div class="img-cart">
                                                <img src="{{$item->options->imagen}}" width="100px" height="100px" alt="">
                                            </div>
                                            <div class="">
                                                <p class="p-nombre">{{$item->name}}</p>

                                                @if ($item->options->color)
                                                    <div class="">
                                                        <span>Color: {{$item->options->color}}</span>
                                                    </div>  
                                                @endif

                                                @if ($item->options->talla)
                                                    <div class="">
                                                        <span>{{$item->options->talla}}</span>
                                                    </div>  
                                                @endif
                                            </div>                                          
                                        </div>
                                    </td>
                                    <td>
                                        <div class="box">
                                            <p>$ {{$item->price}}</p>
                                            <a class="borrar"
                                            wire:click="delete('{{$item->rowId}}')"> <i class="fas fa-trash "></i> </a>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- {{$item->rowId}} --}}
                                        @if ($item->options->talla)
                                            @livewire('actualizar-carrito-item-talla', ['rowId' => $item->rowId], key($item->rowId))
                                        @elseif($item->options->color)
                                            @livewire('actualizar-carrito-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                        @else
                                            @livewire('actualizar-carrito-item', ['rowId' => $item->rowId], key($item->rowId))
                                        
                                        @endif
                                    </td>
                                    <td>$ {{$item->price * $item->qty}}</td>                                
                                </tr> 

                                @endforeach                                                    
                            </tbody>
                        </table>

                        <a class="btn-borrar-carrito"
                            wire:click="destroy">
                            <i class="fas fa-trash"></i>  Borrar carrito de compras
                        </a>

                    @else
                        
                            <h1 style="margin-top: 10px">Tu carrito de compras esta vacio...</h1>

                            <a style="margin-top: 30px" class="btn" href="/">
                                <i class="fas fa-home"></i> 
                                Ir al inicio
                            </a>
                        
                    @endif

				</div>
    </section>

    @if (Cart::count())
    <div class="contenedor detalle-carrito" style="height: 80px">
		<div class="contenedor-detalle">
			<div class="card-detalle-carrito" >

				<div class="flex-card">
                    <div class="texto-detalle-producto">
                        <h1>Valor Total: ${{Cart::subTotal()}}</h1>
                    </div>
                    <div class="texto-detalle-producto-2">
                        <a class="btn boton-continuar" href="{{route('ordenes.create')}}">Continuar</a>
                    </div>
                </div>

            </div>         
        </div> 
    </div>   
    
    
    @endif
</div>
