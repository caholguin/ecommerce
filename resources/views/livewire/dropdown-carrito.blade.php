<div class="shopping-cart">
    @forelse (Cart::content() as $item)
    <div class="box">
        <i class="fas fa-trash"></i>            
        <img src="{{$item->options->imagen}}" alt="">
        <div class="content">
            <h3>{{$item->name}}</h3>
            <span class="price">${{$item->price}}</span>
            <span class="quantity">Cantidad:{{$item->qty}}</span>
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
        
        <button  class="btn-cart">Ir al carrito</button>
      
    @endif
    
</div>