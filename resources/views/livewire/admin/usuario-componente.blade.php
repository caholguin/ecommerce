<div>
    <div class="card rounded mb-5">
        <div class="card-header">
        <div class="row">
            <div class="col-md-10">
              <h5 >Usuarios</h5>
            </div>
    
            <div class="col-md-1">
            <a  class="btn btn-primary" href="{{route('admin.productos.create')}}">Agregar</a>
            </div>
        </div>
        </div>
        <div class="container">
          <input wire:model="search" type="text" class="form-control mb-2 col-md-4"  placeholder="Ingrese el nombre del usuario que desea buscar...">
        </div>
    
        <div class="table-responsive">

           @if (count($usuarios))
            <table class="table table-hover" >
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Rol</th>                  
                    <th colspan="1"></th>          
                </tr>
                </thead>
                <tbody>
                @foreach ($usuarios as $usuario) 
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            @if (count($usuario->roles))
                                Admin                           
                            @else
                                No tiene rol
                            @endif
                        </td> 
                        <td>
                            {{-- <div class="row">  

                                <div class="radio radio-primary col">
                                    <input {{count($usuario->roles) ? 'checked' : ''}}  id="1" type="radio" name="{{$usuario->email}}" value="{{$usuario->email}}">
                                    <label for="1" _msthash="4848584" _msttexthash="055376">Si</label>  
                                </div>
                                
                                <div class="radio radio-primary col">
                                    <input {{count($usuario->roles) ? '' : 'checked'}}  id="0" type="radio" name="{{$usuario->email}}" value="{{$usuario->email}}" >                                    
                                    <label for="0" _msthash="4848090" _msttexthash="004260">No</label>     
                                </div>

                            </div> --}}

                            <div class="row"> 
                                <div class="col">
                                    <label for="1">
                                        <input type="radio" {{count($usuario->roles) ? 'checked' : ''}} id="1" name="{{$usuario->email}}" value="1"
                                            checked>
                                        Si
                                    </label>
                                </div>
                            
                                <div class="col">
                                    <label for="0">
                                        <input type="radio" {{count($usuario->roles) ? '' : 'checked'}}  id="0" name="{{$usuario->email}}" value="0">
                                        No
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>          
                @endforeach   
                
                </tbody>
            </table>
           @else
           <div class="container mt-4 mb-4">
                No hay registros que coincidadn con nuestro registros...
            </div> 
           @endif
            
    
          
    
          
        </div>

        @if ($usuarios->hasPages())
            <div class="container mt-4 mb-4">
                {{$usuarios->links()}}
            </div>  
        @endif
      </div>
</div>
