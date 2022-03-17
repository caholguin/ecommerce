<x-app-layout>   
    <div class="smallcontainer single-product" style="margin-left: 20px">
        <div class="row">
            <div class="col-2 flexslider">
                <div class="small-img-row ">
                    <ul class="slides small-img-col">
                        @foreach ($producto->imagenes as $imagen)            
                            <li data-thumb="{{Storage::url($imagen->url)}}">
                                <img src="{{Storage::url($imagen->url)}}" />
                            </li>      
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-2">
                <div class="info-producto">
                    <p class="p-detalle-producto p-d">{{$producto->subcategoria->nombre}}</p>
                    <h1>{{$producto->nombre}}</h1>
                    <div class="row-t">
                        <p class="p-detalle-producto marca"><a href="">Marca: {{$producto->marca->nombre}}</a></p>                    
                        <p class="p-detalle-producto marca"><a href="">5 <i class="estrella fas fa-star"></i></a></p>
                        <p class="p-detalle-producto "><a class="reseñas" href="" >39 reseñas</a></p>
                    </div>
                    <h4>${{$producto->precio}}</h4>
                    <h2>Recibelo el: {{Date::now()->addDay(7)->locale('es')->format('l j F')}}</h2>
                    
                    @if ($producto->subcategoria->talla)
                        @livewire('agregar-carrito-item-talla', ['producto' => $producto])
                    @elseif($producto->subcategoria->color)
                        @livewire('agregar-carrito-item-color', ['producto' => $producto])
                    @else
                        @livewire('agregar-carrito-item', ['producto' => $producto])
                    @endif
                    
                  
                    <h3 class="h3-detalle-producto">Detalle de producto <i class="fa fa-indent"></i></h3>
                    <br>
                    <p class="p-detalle-producto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat cumque amet dolores possimus magnam iste architecto iure nihil quia illum, vel voluptatibus odio. Repellat totam expedita asperiores nobis illo non!</p>
                </div>
            </div>
        </div>
   </div> 
  

  @push('script')

  <script>
      // Can also be used with $(document).ready()
    $(document).ready(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
    });
  </script>
      
  @endpush
</x-app-layout>