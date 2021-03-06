<div>  
    <div class="card-3">
        <div>
            <div>
                <h2 class="contenido">{{Str::limit($categoria->nombre,20)}}</h2>                 
            </div>            
        </div>
    </div>


    <div class="grid-layout">
        <div class="caja">
            <aside>                 
                 {{-- {{$subcategoria}}  --}}
                <ul class="ul-subcategorias">
                    <h2 class="">Subcategorias</h2>                         
                    @foreach ($categoria->subcategorias as $subcategoria)
                        <li class="li-subcategorias">
                            <a style="cursor:pointer;" class="{{$subcategoria == $subcategoria->slug ? 'text-danger' : ''}}" 
                            wire:click="$set('subcategoria', '{{$subcategoria->slug}}')"                            
                            >{{$subcategoria->nombre}}</a>
                        </li>
                    @endforeach
                </ul>
               
                <ul class="ul-marcas">
                    <h2 class="">Marcas</h2>
                    @foreach ($categoria->marcas as $marca)
                        <li class="li-marcas">
                            <a style="cursor:pointer;"
                            wire:click="$set('marca', '{{$marca->nombre}}')"  
                            >{{$marca->nombre}}</a>
                        </li>
                    @endforeach
                </ul>

                <button wire:click="limpiar" class="btn">Eliminar filtros</button>
            </aside>     
        </div>

        <div class="caja">
            <div class="grid-layout-2">
                @forelse ($productos->where('estado',1) as $producto)
                <div class="card-productos" >
                    <img class="img-productos" src="{{ Storage::url($producto->imagenes->first()->url) }}" height="150" width="250" class="img-producto" alt="" >
                    <div class="container">
                        <h3><a class="nombre-productos" href="{{route('productos.show',$producto)}}">
                            {{Str::limit($producto->nombre, 10)}}</a></h3>
                        <p style="color: red">${{$producto->precio}}</p>                            
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            (1)
                            {{-- <div>
                                <a href="#" class="btn-carrito">Mas informaci??n</a>
                            </div>   --}}
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger" role="alert">
                    No hay productos disponibles con ese filtro
                  </div>
               
                @endforelse               
            </div>

            <div>
                <ul class="pagination">                   
                    <li><a href="#">{{$productos->links()}}</a></li>  
                    
                    
                </ul>
            </div>            
        </div>       
    </div>    
</div>
