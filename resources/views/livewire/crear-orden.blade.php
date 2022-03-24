<div class="contenedor-orden">
    <div class="contenedor-orden-hijo">
        <div class="card-orden" >
            <div class="textos-orden">
                <label class="text-input-orden ">Nombre del contacto</label>
                <input wire:model.defer="contacto" class="input-orden" type="text"  placeholder="Ingrese el nombre de la persona que va recibir el producto...">

                <x-jet-input-error for="contacto" />

                <br>
                <br>

                <label class="text-input-orden ">Teléfono de contacto</label>
                <input wire:model.defer="telefono" class="input-orden" type="text"  placeholder="Ingrese el teléfono de contacto de la persona que va recibir el producto...">

                <x-jet-input-error for="telefono" />
            </div>
        </div>    
        <p>Envíos</p>
       

        <div x-data="{ tipo_envio: @entangle('tipo_envio') }">
            <label>
                    <div class="card-orden" >
                    <input x-model="tipo_envio" class="leaflet-control-layers-selector" 
                        type="radio" value="1" name="tipo_envio">
                        <span class="text-input-orden">
                            Recoger en tienda (calle falsa 123) 
                        </span>                       
                    </div> 
            </label>            

            <div>
                <label>
                    <div class="card-orden radio" >
                        <input class="leaflet-control-layers-selector "
                            type="radio"  x-model="tipo_envio" value="2" name="tipo_envio">
                            <span class="text-input-orden">
                            Envio a domicilio
                            </span>

                             <div 
                                @if ($tipo_envio != 2 )
                                    hidden  
                                @endif
                            >                                                               
                            
                                {{-- departamentos --}}
                                <div class="textos-orden" style="margin-top: 20px">                                
                                    <label class="text-input-orden ">Departamento</label>            
                                    <select class="select-orden" name="" id="" wire:model="departamento_id">
                                        <option disabled selected value="">Seleccione un departamento</option>
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="departamento_id" />

                                    <br>
                                    <br>
                                </div>

                                {{-- ciudades --}}
                                <div class="textos-orden" >                                
                                    <label class="text-input-orden ">Ciudad</label>            
                                    <select class="select-orden" name="" id="" wire:model="ciudad_id">
                                        <option disabled selected value="">Seleccione una ciudad</option>
                                        @foreach ($ciudades as $ciudad)
                                            <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="ciudad_id" />

                                    <br>
                                    <br>
                                </div>

                                {{-- distritos --}}
                                <div class="textos-orden" >                                
                                    <label class="text-input-orden ">Barrio</label>            
                                    <select class="select-orden" name="" id="" wire:model="distrito_id">
                                        <option disabled selected value="">Seleccione un Barrio</option>
                                        @foreach ($distritos as $distrito)
                                            <option value="{{$distrito->id}}">{{$distrito->nombre}}</option>
                                        @endforeach
                                    </select>

                                    <x-jet-input-error for="distrito_id" />
                                    <br>
                                    <br>
                                </div>


                                <label class="text-input-orden">Dirección</label>
                                <input wire:model="direccion" class="input-orden" type="text"  placeholder="Ingrese la dirección de la persona que va recibir el producto...">
                                <x-jet-input-error for="direccion" />

                                <br>
                                <br>
                
                                <label class="text-input-orden">Referencia</label>
                                <input wire:model="referencia" class="input-orden" type="text"  placeholder="Referencia">
                                <x-jet-input-error for="referencia" />

                                <br>
                                <br>
                            </div>
                    </div> 
                </label>


                
            </div>
        </div>


        <button 
        wire:loading.attr="disabled"
        wire:target="crear_orden"        
        wire:click="crear_orden" class="btn">Continuar con la compra</button>

    </div>

    <div class="banner-orden">

            @forelse (Cart::content() as $item)
            <div class="box" style="margin-bottom: 10px">
                {{-- <i class="fas fa-trash"></i>             --}}
                <img src="{{$item->options->imagen}}" width="100px" height="100px" alt="">
                <div class="content">
                    <h3 class="span-nombre"> {{$item->name}}</h3>
                    <span class="span-quantity">Cantidad: {{$item->qty}}</span>
                    @isset($item->options['color'])
                    <span class="span-quantity">Color: {{$item->options['color']}}</span> <br>               
                    @endisset  
                    @isset($item->options['talla'])
                    <span class="span-quantity"> {{$item->options['talla']}}</span><br>                
                    @endisset  
                    <span class="span-price"> ${{$item->price}}</span><br>
                </div>        
            </div>  

            @empty
                <div class="box">            
                    <div class="content">
                        <h3>No hay productos en el carrito</h3>                
                    </div>
                </div>    
            @endforelse

            <br>
            <hr/>
                <div class="grid-orden">
                    <div>
                        <p>
                            Subtotal:                            
                        </p>
                    </div>
                    <div>
                        <p>${{Cart::subtotal()}}</p>
                    </div>                    
                </div>

                <br>

                <div class="grid-orden">
                    <div>
                        <p>
                            Envío:                        
                        </p>
                    </div>

                    <div>
                        <p>
                            @if ($tipo_envio == 1 || $costo == 0)
                                Gratis                                                       
                            @else
                               $ {{$costo}}
                            @endif
                        </p>
                    </div>
                </div>

                <br>

               <div class="grid-orden">
                    <div>
                        <p>
                            Total:                            
                        </p>
                    </div>
                    <div>
                        @if ($tipo_envio == 1)
                            <p>${{Cart::subtotal()}}</p>                            
                        @else
                            <p>${{Cart::subtotal() + $costo}} </p> 
                        @endif
                    </div>                    
                </div>
    </div>
</div>
