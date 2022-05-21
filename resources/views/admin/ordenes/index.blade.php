<x-admin-layout>
    
    <div class="container">
        <div class="row">
            

            <div class="col">
                <div class="card rounded " style="background: #5D6D7E">
                    <a href="{{route('admin.ordenes.index') . "?estado=2"}}" class="card-orden" style="background: #5D6D7E">
                        <h6 style="text-align:center; color:aliceblue" class="mt-3">
                            {{-- {{$ordenes->where('estado',2)->count()}}     --}}
                            {{$recibido}}
                        </h6>
                        <h6 style="text-align:center; color:aliceblue">Recibido</h6>
                        <p style="text-align:center; color:aliceblue">
                            <i class="fas fa-credit-card"></i>
                        </p>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="col card rounded " style="background: #F5B041">
                    <a href="{{route('admin.ordenes.index') . "?estado=3"}}" class="card-orden" >
                        <h6 style="text-align:center; color:aliceblue" class="mt-3">
                            {{-- {{$ordenes->where('estado',3)->count()}} --}}
                            {{$enviado}}
                        </h6>
                        <h6 style="text-align:center; color:aliceblue">Enviado</h6>
                        <p style="text-align:center; color:aliceblue">
                            <i class="fas fa-truck"></i>
                        </p>
                    </a>
                </div>
            </div>

            <div class="col">            
                <div class="col card rounded " style="background: #5499C7">
                    <a href="{{route('admin.ordenes.index') . "?estado=4"}}" class="card-orden" >
                        <h6 style="text-align:center; color:aliceblue" class="mt-3">
                            {{-- {{$ordenes->where('estado',4)->count()}} --}}
                            {{$entregado}}
                        </h6>
                        <h6 style="text-align:center; color:aliceblue">Entregado</h6>
                        <p style="text-align:center; color:aliceblue">
                            <i class="fas fa-check-circle"></i>
                        </p>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="col card rounded " style="background: #52BE80">
                    <a href="{{route('admin.ordenes.index') . "?estado=5"}}" class="card-orden" >
                        <h6 style="text-align:center; color:aliceblue" class="mt-3">
                            {{-- {{$ordenes->where('estado',5)->count()}} --}}
                            {{$anulado}}
                        </h6>
                        <h6 style="text-align:center; color:aliceblue">Anulado</h6>
                        <p style="text-align:center; color:aliceblue">
                            <i class="fas fa-times-circle"></i>
                        </p>
                    </a>
                </div>
            </div>

        </div>
    </div>


    <div class="container" style="margin-bottom: 25px">

        <h3>Pedidos recientes</h3>

        @if ($ordenes->count())
            <div class="card rounded">
                <div class="table-responsive">
                    <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th scope="col">Orden</th> 
                            <th>Fecha</th>   
                            <th>Estado</th>               
                            <th>Precio</th>
                            <th colspan="1"></th>          
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordenes as $orden)
                                <tr>
                                    <td> 
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
                                        Orden: {{$orden->id}}
                                    </td>

                                    <td>{{$orden->created_at->format('d/m/Y')}}</td>
                                    
                                    <td>
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
                                    </td>

                                    <td>
                                        $ {{$orden->total}}
                                    </td>

                                    <td width="10px">                 
                                        <a href="{{route('admin.ordenes.show',$orden)}}" class="btn btn-pill btn-secondary">Ver</a>                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>            
            </div>
            
        @else
            <div class="card rounded">
                <h5>No hay ordenes</h5>
            </div>
        @endif
    </div>

</x-admin-layout>