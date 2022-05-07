<header class="header" >
    <a href="/" class="logo"> <i class="fas fa-shopping-basket"></i> groco </a>
    <nav class="navbar">

        
     {{--    @foreach ($categorias as $categoria)
            <div class="dropdown">
                <a href="{{route('categorias.show',$categoria)}}" class="dropbtn">{{$categoria->nombre}}</a>
                <div class="dropdown-content">
                    @foreach ($categoria->subcategorias as $subcategoria)
                        <a href="#">{{$subcategoria->nombre}}</a>                    
                    @endforeach
                </div>
            </div>  
        @endforeach   --}}

        <div class="dropdown" >
            <a  class="dropbtn">Categorias</a>
            <div class="dropdown-content">
                @foreach ($categorias as $categoria)
                    <a href="{{route('categorias.show',$categoria)}}">{{$categoria->nombre}}</a>                    
                @endforeach
            </div>
            
        </div>  
        
    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        {{-- @livewire('buscador') --}}
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn">
            @if (Cart::count())
                <span id="checkout_items" class="checkout_items">{{Cart::count()}}</span>                
            @else
                <span id="checkout_items" class="checkout_items">0</span>
            @endif
        </div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    @livewire('buscador')

    @livewire('dropdown-carrito')   

    @auth
    <form action="{{route('logout')}}" class="login-form" method="POST">
        @csrf      
        <a class="letras_usuario" href="{{route('ordenes.index')}}">Mis ordenes</a> 
        <br>       
        <a class="letras_usuario" href="{{route('admin.index')}}">Admin</a>
        <br>
        <button type="submit" class="letras_usuario btn_cerrarsesion">Cerrar sesión</button>
    </form>
   
    @else
    <div  class="login-form" >
        <a class="letras_usuario" href="{{route('login')}}">Iniciar sesión</a>
        <br>
        <br>
        <a class="letras_usuario" href="{{route('register')}}">Registrarse</a>
    </div>
    @endauth
</header>

<section class="home" id="home">

   

</section>



