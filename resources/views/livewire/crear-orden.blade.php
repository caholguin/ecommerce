<div class="contenedor-orden">
    <div class="contenedor-orden-hijo">
        <div class="card-orden" >
            <div class="textos-orden">
                <label class="text-input-orden ">Nombre del contacto</label>
                <input class="input-orden" type="text" id="fname" name="firstname" placeholder="Ingrese el nombre de la persona que va recibir el producto...">

                <label class="text-input-orden ">Teléfono de contacto</label>
                <input class="input-orden" type="text" id="fname" name="firstname" placeholder="Ingrese el teléfono de contacto de la persona que va recibir el producto...">

            </div>
        </div>    
        <p>Envíos</p>
        <div>
            <label>
                    <div class="card-orden" >
                    <input class="leaflet-control-layers-selector "
                        type="radio" name="leaflet-base-layers">
                        <span class="text-input-orden">
                        Recoger en tienda (calle falsa 123) 
                        </span>                       
                    </div> 
            </label>
            <label>
                <div class="card-orden radio" >
                    <input class="leaflet-control-layers-selector "
                        type="radio" name="leaflet-base-layers">
                        <span class="text-input-orden">
                        Envio a domicilio
                        </span>
                </div> 
                </label>
        </div>


        <button class="btn">Continuar con la compra</button>

    </div>

    <div class="banner-orden">

            @forelse (Cart::content() as $item)
            <div class="box">
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
            
                <p>
                    Subtotal:
                    <span>${{Cart::subtotal()}}</span>
                </p>

                <p>
                    Envío:
                    
                </p>
            
                <p>
                    Total:
                    <span>${{Cart::subtotal()}}</span>
                </p>
    </div>
</div>
