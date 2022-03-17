<div class="shopping-cart">
    @forelse (Cart::content() as $item)
    <div class="box">
        <i class="fas fa-trash"></i>            
        <img src="{{$item->options->imagen}}" alt="">
        <div class="content">
            <h3>{{$item->name}}</h3>
            <span class="price">${{$item->price}}</span>
            <span class="quantity">Cantidad:{{$item->qty}}</span>
            @isset($item->options['color'])
                <span class="quantity">Color:{{$item->options['color']}}</span>                
            @endisset  
            @isset($item->options['talla'])
                <span class="quantity">{{$item->options['talla']}}</span>                
            @endisset  
        </div>        
    </div>  

    @empty
        <div class="box">            
            <div class="content">
                <h3>No hay productos en el carrito</h3>                
            </div>
        </div>    
    @endforelse

    @if (Cart::count())
        <div class="total">Total: {{Cart::subtotal()}} </div>
        
        <a style="margin-bottom: 100px" href="{{route('carrito-compras')}}"  class="btn-cart">Ir al carrito</a style="margin-bottom: 10px">
      
    @endif
    
</div>