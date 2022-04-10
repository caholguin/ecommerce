<div>
  <div class="card rounded mb-5">
    <div class="card-header">
    <div class="row">
        <div class="col-md-10">
          <h5 >Productos</h5>
        </div>

        <div class="col-md-1">
        <a  class="btn btn-primary" href="{{route('admin.productos.create')}}">Agregar</a>
        </div>
    </div>
    </div>
    <div class="container">
      <input wire:model="search" type="text" class="form-control mb-2 col-md-4"  placeholder="Ingrese el nombre de producto que desea buscar...">
    </div>

    <div class="table-responsive">

      @if ($productos->count())        
    
        <table class="table table-hover" >
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Categoría</th>
              <th scope="col">Estado</th>
              <th scope="col">Precio</th>
              <th colspan="1"></th>          
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $producto)
            <tr>
              <td>
                <div class="row">
                  <div class="col-md-2">
                    @if ($producto->imagenes->count())                    
                      <img  src="{{Storage::url( $producto->imagenes->first()->url)}}" height="50px" width="50px" alt="" style="border-radius: 40px">                        
                    
                      @else
                        <img width="50px" height="50px" style="border-radius: 40px" src="https://images.pexels.com/photos/11387249/pexels-photo-11387249.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                      @endif
                  </div>
                  <div class="col pt-3">
                    {{$producto->nombre}}
                  </div>              
                </div>
              </td>
              <td><p class="pt-3"> {{$producto->subcategoria->categoria->nombre}}</p></td>
              <td>
                <p class="pt-3">
                  @if ($producto->estado==0)
                      <strong class="badge badge-danger ">Borrador</strong></td> 
                    @else
                      <strong class="badge badge-primary ">Publicado</strong></td>           
                  @endif 
                </p>
              <td><p class="pt-3">$ {{$producto->precio}}</p></td>
              <td>
                <div class="pt-3 text-center">
                  <a href="{{route('admin.productos.edit',$producto)}}" class="btn btn-primary btn-pill">Editar</a>
                </div>
              </td>
            </tr>          
            @endforeach         
          
          </tbody>
        </table>

      @else
          <div class="container mb-4 mt-4">
            No hay ningun registro coincidente
          </div>
      @endif

      @if ($productos->hasPages())        
        <div class="container mt-4 mb-4">
          {{$productos->links()}}
        </div>        
      @endif
    </div>
  </div>
</div>





