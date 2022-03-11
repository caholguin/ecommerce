<div wire:init="loadProductos">
    @if (count($productos))

    <div class="glider-contain" >
        <div class="glider-{{$categoria->id}}">
            {{-- @foreach ($categoria->productos->where('estado', 1)->take(15) as $producto)   --}}
    
            @foreach ($productos->where('estado',1)->take(15) as $producto) 
                <div class="card-productos" style="margin-top: 15px">
                        <img class="img-productos" src="{{ Storage::url($producto->imagenes->first()->url) }}" height="150" width="250" class="img-producto" alt="" >
                        <div class="container">
                        <h1><b>{{Str::limit($producto->nombre, 20)}}</b></h1>
                        <h1 style="color: red">$ {{$producto->precio}}</h1>
                        
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            (1)
                            <div>
                                <a href="#" class="btn-carrito">Agregar al carrito</a>
                            </div>  
                        </div>
                        
                    </div>
                </div>
            @endforeach         
        </div>
      
        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
      </div>
    </div>
        
    @else
        <h1>Cargando...</h1>
    @endif
</div>