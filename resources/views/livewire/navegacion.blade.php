<header class="header" >
    <a href="/" class="logo"> <i class="fas fa-shopping-basket"></i> groco </a>
    <nav class="navbar">

        
        @foreach ($categorias as $categoria)
            <div class="dropdown">
                <a href="{{route('categorias.show',$categoria)}}" class="dropbtn">{{$categoria->nombre}}</a>
                <div class="dropdown-content">
                    @foreach ($categoria->subcategorias as $subcategoria)
                        <a href="#">{{$subcategoria->nombre}}</a>                    
                    @endforeach
                </div>
            </div>  
        @endforeach  

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
        <button type="submit" class="btn">Cerrar sesión</button>
        {{-- <input type="submit" value="login now" class="btn"> --}}
        <a class="btn" href="{{route('ordenes.index')}}">Mis ordenes</a>
        <a class="btn" href="{{route('admin.index')}}">Admin</a>
    </form>
   
    @else
    <div  class="login-form" >
        <a class="btn" href="{{route('login')}}">Iniciar sesión</a>
        <a class="btn" href="{{route('register')}}">Registrarse</a>
    </div>
    @endauth
</header>

<section class="home" id="home">

   

</section>



