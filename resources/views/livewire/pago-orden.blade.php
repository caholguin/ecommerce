<div>
     {{-- @php
        // SDK de Mercado Pago
        require  base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        $item = new MercadoPago\Item();
            

        // Crea un ítem en la preferencia

       foreach ($items as $p) {
            $item = new MercadoPago\Item();
            $item->title = $p->name;
            $item->quantity = $p->qty;
            $item->unit_price = intVal($p->price);

           

            $productos[] = $item;
        }

        // Redireccion
            $preference->back_urls = array(
            "success" => "https://www.tu-sitio/success",
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
            );
            $preference->auto_return = "approved";
        //////////////////////       
        
        $preference->items = $productos;
        // $preference->items = array($item);
        $preference->save();
        

    @endphp --}}

    <div class="contenedor-pago card-pago" style="margin-bottom: 20px">

        <div>

            <div class=" card-pago" style="margin-bottom: 20px">
                <h1>NÚMERO DE ORDEN - {{$orden->id}}</h1>
            </div>



            <div class="card-pago" style="margin-bottom: 20px">
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
                <br>
                <div>
                    <p>DATOS DE CONTACTO</p>
                    <br>

                    <h2>Persona que recibirá el producto: {{$orden->contacto}}</h2>
                    <h2>Teléfono de contacto: {{$orden->telefono}}</h2>
                </div>
            </div>




            <div class="card-pago" style="margin-bottom: 20px">
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

        </div>

    <div>

        <div class="contenedor-pago-total card-pago" style="margin-bottom: 20px">
            <div>
                <img width="150px" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}" alt="">
            </div>
            <div>
                <h2>
                    Subtotal: $ {{$orden->total-$orden->costo}}
                </h2>
                <h2>
                    Envio: $ {{$orden->costo}}
                </h2>
                <h1>
                    Pago: $ {{$orden->total}}
                </h1>

                
               
            </div>


            <!-- Set up a container element for the button -->
         
            
        </div>
        <div id="paypal-button-container"></div>
        
    </div>



</div>

    {{-- // SDK MercadoPago.js V2 --}}
    {{-- <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script>
        
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
          locale: "es-PE",
        });
      
        /
        mp.checkout({
          preference: {
            id: '{{ $preference->id }}'
          },
          render: {
            container: ".cho-container", 
            label: "Pagar", 
          },
        });


      </script> --}}
        @push('script')
            
        
            <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}"></script>


            <script>
                paypal.Buttons({        
                createOrder: function(data, actions) {
                    return actions.order.create({
                    purchase_units: [{
                        amount: {
                        value: "{{ $orden->total }}"
                        }
                    }]
                    });
                },
        
                
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {              
                        // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        // var transaction = orderData.purchase_units[0].payments.captures[0];

                        // console.log(orderData);
                        
                        // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                        
                        Livewire.emit('pagoOrden');
                    
                    });
                }
            }).render('#paypal-button-container');       
            
        </script>

    @endpush
</div>
