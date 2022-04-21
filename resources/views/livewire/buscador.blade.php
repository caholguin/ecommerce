
    <form action="" class="search-form">
        <input wire:model="buscar" type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>

        <div class="card-3" style="margin-top: 100px">
            <div class="container-2">
                @forelse ($productos as $producto)
                    @if ($producto->imagenes->count())
                        <img class="img-productos" src="{{ Storage::url($producto->imagenes->first()->url) }}" height="150" width="250" class="img-producto" alt="" >
                        <h4><b>{{$producto->nombre}}</b></h4>
                        <h4><b>Categoria: {{$producto->subcategoria->categoria->nombre}}</b></h4> 
                    @else
                        <img src="https://images.pexels.com/photos/11485306/pexels-photo-11485306.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 alt="">
                        
                    @endif
                @empty
                    <h4><b>No hay productos que coincidan</b></h4>   
                @endforelse
            </div> 
        </div>
    </form>

    
        
    



