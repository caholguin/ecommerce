<x-app-layout>

    <div class="contenedor-ordenes " >

        <a href="{{route('ordenes.index') . "?estado=1"}}" class="card-orden" style="background: #EC7063">
            <p style="text-align:center; color:aliceblue">
                {{-- {{$ordenes->where('estado',1)->count()}} --}}
                {{$pendiente}}
            </p>
            <p style="text-align:center; color:aliceblue">Pendiente</p>
            <p style="text-align:center; color:aliceblue"> 
                <i class="fas fa-business-time"></i>
            </p>
        </a>

        <a href="{{route('ordenes.index') . "?estado=2"}}" class="card-orden" style="background: #5D6D7E">
            <p style="text-align:center; color:aliceblue">
                {{-- {{$ordenes->where('estado',2)->count()}}     --}}
                {{$recibido}}
            </p>
            <p style="text-align:center; color:aliceblue">Recibido</p>
            <p style="text-align:center; color:aliceblue">
                <i class="fas fa-credit-card"></i>
            </p>
        </a>

        <a href="{{route('ordenes.index') . "?estado=3"}}" class="card-orden" style="background: #F5B041">
            <p style="text-align:center; color:aliceblue">
                {{-- {{$ordenes->where('estado',3)->count()}} --}}
                {{$enviado}}
            </p>
            <p style="text-align:center; color:aliceblue">Enviado</p>
            <p style="text-align:center; color:aliceblue">
                <i class="fas fa-truck"></i>
            </p>
        </a>

        <a href="{{route('ordenes.index') . "?estado=4"}}" class="card-orden" style="background: #5499C7">
            <p style="text-align:center; color:aliceblue">
                {{-- {{$ordenes->where('estado',4)->count()}} --}}
                {{$entregado}}
            </p>
            <p style="text-align:center; color:aliceblue">Entregado</p>
            <p style="text-align:center; color:aliceblue">
                <i class="fas fa-check-circle"></i>
            </p>
        </a>

        <a href="{{route('ordenes.index') . "?estado=5"}}" class="card-orden" style="background: #52BE80">
            <p style="text-align:center; color:aliceblue">
                {{-- {{$ordenes->where('estado',5)->count()}} --}}
                {{$anulado}}
            </p>
            <p style="text-align:center; color:aliceblue">Anulado</p>
            <p style="text-align:center; color:aliceblue">
                <i class="fas fa-times-circle"></i>
            </p>
        </a>

    </div>


    <div class="card-orden-index" style="margin-bottom: 25px">
        <p>Pedidos recientes</p>

        <ul >
            @foreach ($ordenes as $orden)
                <li class="lista-orden">
                    <a href="{{route('ordenes.show',$orden)}}">
                        <div class="contenedor-span-orden">
                            <div>
                                <span>
                                    @switch($orden->estado)
                                        @case(1)
                                            <i class="fas fa-business-time" style="color: #EC7063"></i>
                                            @break
                                        @case(2)
                                            <i class="fas fa-credit-card" style="color: #5D6D7E"></i>
                                            @break
                                        @case(3)
                                            <i class="fas fa-truck" style="color: #F5B041"></i>
                                            @break
                                        @case(4)
                                            <i class="fas fa-check-circle" style="color: #5499C7"></i>
                                            @break
                                        @case(5)
                                            <i class="fas fa-times-circle" style="color: #52BE80"></i>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </span>
                            </div>

                            <div>
                                <span>
                                    <p> Orden: {{$orden->id}}</p>
                                    
                                    <p> {{$orden->created_at->format('d/m/Y')}}</p>
                                </span>
                            </div>

                            

                            <div class="flotador">
                                <span>
                                    @switch($orden->estado)
                                        @case(1)
                                            <p>Pendiente</p>
                                            @break
                                        @case(2)
                                            <p>Recibido</p>
                                            @break
                                        @case(3)
                                            <p>Enviado</p>
                                            @break
                                        @case(4)
                                            <p>Entregado</p>
                                            @break
                                        @case(5)
                                            <p>Anulado</p>
                                            @break
                                        @default
                                            
                                    @endswitch
                                </span>

                                <p class="precio-orden">$ {{$orden->total}}</p>

                               
                            </div>
                            
                                <i class="fas fa-angle-right icono-orden"></i>
                            
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</x-app-layout>