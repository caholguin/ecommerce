<x-app-layout>

    
    
    
    <div class="contenedor-pago-iconos card-pago" style="margin-bottom: 20px">
        <div>
            <i @if ($orden->estado >= 2 && $orden->estado != 5)
                style="background-color: rgb(69, 151, 228); color:rgb(255, 255, 255);"
            @endif class="icono fa-solid fa-check"></i>
            <p>Recibido</p>
        </div>

        <div>
            <i @if ($orden->estado >= 3 && $orden->estado != 5)
                style="background-color: rgb(69, 151, 228); color:rgb(255, 255, 255);"
            @endif class="icono fa-solid fa-truck"></i>
            <p>Enviado</p>
        </div>

        <div>
            <i @if ($orden->estado >= 4 && $orden->estado != 5)
                style="background-color: rgb(69, 151, 228); color:rgb(255, 255, 255);"
            @endif class="icono fa-solid fa-check"></i>
            <p>Entregado</p>
        </div>
    </div>   

            <div class="contenedor-pago card-pago" style="margin-bottom: 20px">
                <h1>NÚMERO DE ORDEN - {{$orden->id}} </h1>
            </div>



            <div class="contenedor-pago card-pago" style="margin-bottom: 20px">
                <div>          
                    <p>ENVÍO</p>
                    <br>
                
                    @if ($orden->tipo_envio==1)
                        <h2>Los productos deben ser recogidos en tienda</p>
                        
                        <h2>Calle falsa 123</h2>
                    @else            
                        <h2>El producto sera enviado a: </h2>
                        <h2>{{$orden->direccion}}</h2>                
                        <h2> {{$orden->departamento->nombre}} - {{$orden->ciudad->nombre}} - {{$orden->distrito->nombre}} </h2>
                    @endif
                
                </div>
                
                <div>
                    <p>DATOS DE CONTACTO</p>
                    <br>

                    <h2>Persona que recibirá el producto: {{$orden->contacto}}</h2>
                    <h2>Teléfono de contacto: {{$orden->telefono}}</h2>
                </div>
            </div>




            <div class="contenedor-pago card-pago" style="margin-bottom: 20px">
                <div>          
                    <p>RESUMEN</p>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th></th>                                
                                <th class="titulo-detalle-pago">Precio</th>
                                <th class="titulo-detalle-pago">Cantidad</th>
                                <th class="titulo-detalle-pago">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="box">
                                        <div class="img-cart">
                                            <img src="{{$item->options->imagen}}" width="100px" height="100px" alt="">
                                        </div>
                                        <div class="">
                                            <p class="p-nombre" >{{$item->name}}</p>

                                            @isset ($item->options->color)
                                                <div class="" style="font-size: 15px">
                                                    <span>Color: {{$item->options->color}}</span>
                                                </div>  
                                            @endisset

                                            @isset  ($item->options->talla)
                                                <div class="" style="font-size: 15px">
                                                    <span>{{$item->options->talla}}</span>
                                                </div>  
                                            @endisset
                                        </div>                                          
                                    </div> 
                                </td>
                                <td>
                                    <div class="box">
                                        <p>$ {{$item->price}}</p>                               
                                    </div>
                                </td>
                                <td>
                                    <div class="box">
                                        <p>{{$item->qty}}</p>                               
                                    </div>
                                </td>
                                <td>
                                    <div class="box">
                                        <p>$ {{$item->price * $item->qty}}</p>                               
                                    </div>     
                                </td>                     
                            </tr> 
                            @endforeach                                     
                        </tbody>
                    </table>
                </div>
            </div>

        

    
   
</x-app-layout>