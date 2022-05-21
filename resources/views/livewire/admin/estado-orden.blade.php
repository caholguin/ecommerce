<div>
   <div class="card rounded">
        <h5 class="container mt-3 mb-3">NÚMERO DE ORDEN - {{$orden->id}} </h5>
   </div>

    <div class="card rounded">
        <div class="row">

            <div class="col">
                <div class="container mt-3 mb-3">
                    <h4>Envio</h4>
                    @if ($orden->tipo_envio==1)
                        <h6>Los productos deben ser recogidos en tienda: Calle falsa 123</h6>
                    @else            
                        <h6>El producto sera enviado a: </h6>
                        <h6>{{$orden->direccion}}</h6>                
                        <h6> {{$orden->departamento->nombre}} - {{$orden->ciudad->nombre}} - {{$orden->distrito->nombre}} </h6>
                    @endif                
                </div>
            </div>

            <div class="col">
                <div class="container mt-3 mb-3">
                    <h4>Datos de contacto</h4>
                    <h6>Persona que recibirá el producto: {{$orden->contacto}}</h6>
                    <h6>Teléfono de contacto: {{$orden->telefono}}</h6>
                </div>
            </div>
            
        </div>
    </div>

    <div class="card rounded">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>                                
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>                       
                            <div class="row">

                                <div class="col">
                                    <img src="{{$item->options->imagen}}" width="70px" height="70px" alt="">
                                </div>                            
                                <div class="col-10">
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
                            $ {{$item->price}}                              
                            
                        </td>
                        <td>                       
                            <p>{{$item->qty}}</p>
                        </td>
                        <td>                        
                            <p>$ {{$item->price * $item->qty}}</p>  
                        </td>                     
                    </tr> 
                    @endforeach                                     
                </tbody>
            </table>
        </div>
    </div>


    

</div>


