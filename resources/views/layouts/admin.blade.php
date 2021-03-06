<!DOCTYPE html>
<html lang="es">

    <style>
        .icon{
            margin-right: 10px;
        }
    </style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title>Eccomerce - admin</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6/css/all.min.css') }}">  

       

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/icofont.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/feather-icon.css') }}">
    
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/style.css') }}">
    
    <link id="color" rel="stylesheet" href="{{ asset('css/admin/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/responsive.css') }}">

    {{-- dropzone  --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CKeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>

    <script src="//unpkg.com/alpinejs" defer></script>

    
    @livewireStyles

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    {{-- dropzone  --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="dark-only">
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper"><a href="https://laravel.pixelstrap.com/viho/dashboard"><img
                                class="img-fluid"
                                src="https://laravel.pixelstrap.com/viho/assets/images/logo/logo.png" alt=""></a></div>
                    <div class="dark-logo-wrapper"><a href="https://laravel.pixelstrap.com/viho/dashboard"><img
                                class="img-fluid"
                                src="https://laravel.pixelstrap.com/viho/assets/images/logo/dark-logo.png" alt=""></a>
                    </div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                            id="sidebar-toggle"> </i></div>
                </div>
                <div class="left-menu-header col">
                    <ul>
                        <li>
                            <form class="form-inline search-form">
                                <div class="search-bg"><i class="fa fa-search"></i>
                                    <input class="form-control-plaintext" placeholder="Search here.....">
                                </div>
                            </form>
                            <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>

                        <li>
                            <div class="mode"><i class="fa-solid fa-moon"></i></div>
                        </li>

                        {{-- <li class="onhover-dropdown p-0">
          <button class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Log out</button>
        </li> --}}

                        <li>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle btn btn-primary-light" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="log-out"></i>Log out
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" title="" href="#">Another action</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" class="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn">Cerrar sesi??n</button>
                                            
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>




                    </ul>










                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">

            <!-- Page Sidebar Start-->
            <header class="main-nav">
                <div class="sidebar-user text-center">
                    <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
                        class="img-90 rounded-circle"
                        src="https://laravel.pixelstrap.com/viho/assets/images/dashboard/1.png" alt="" />
                    <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
                    <a href="user-profile">
                        <h6 class="mt-3 f-14 f-w-600">Emay Walter</h6>
                    </a>
                    <p class="mb-0 font-roboto">Human Resources Department</p>
                    <ul>
                        <li>
                            <span><span class="counter">19.8</span>k</span>
                            <p>Follow</p>
                        </li>
                        <li>
                            <span>2 year</span>
                            <p>Experince</p>
                            
                        </li>
                        <li>
                            <span><span class="counter">95.2</span>k</span>
                            <p>Follower</p>
                        </li>
                    </ul>
                </div>
                <!-- ********************************************** -->
                <!-- sidebar  -->
                <nav>
                    <div class="main-navbar">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="mainnav">
                            <ul class="nav-menu custom-scrollbar">
                                <li class="back-btn">
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                {{-- ************************************** --}}                               
                                <li class="dropdown">
                                    <a class=" nav-link menu-title link-nav {{request()->routeIs('admin.usuarios.index') ? 'active' : ''}}" href="{{route('admin.usuarios.index')}}"><i class="icon fa-solid fa-boxes-stacked"></i><span>Usuarios</span><div class="according-menu"></div></a>                                
                                </li> 

                                <li class="dropdown">
                                    <a class=" nav-link menu-title link-nav {{request()->routeIs('admin.index') ? 'active' : ''}}" href="{{route('admin.index')}}"><i class="icon fa-solid fa-boxes-stacked"></i><span>Productos</span><div class="according-menu"></div></a>                                
                                </li>                               
                                
                                <li class="dropdown">
                                    <a class="nav-link menu-title link-nav {{request()->routeIs('admin.categorias.index') ? 'active' : ''}}" href="{{route('admin.categorias.index')}}"><i class="icon fa-solid fa-list-check"></i><span>Categorias</span><div class="according-menu"></div></a>                                
                                </li>

                                <li class="dropdown">
                                    <a class="nav-link menu-title link-nav {{request()->is("admin.index") || request()->is("admin.index") ? "active" : ""}}" href="{{route('admin.marcas.index')}}"><i class="icon fa-regular fa-registered"></i><span>Marcas</span><div class="according-menu"></div></a>                                
                                </li>

                                <li class="dropdown">
                                    <a class="nav-link menu-title link-nav {{request()->is("admin.index") || request()->is("admin.index") ? "active" : ""}}" href="{{route('admin.ordenes.index')}}"><i class="icon fa-solid fa-clipboard-check"></i><span>Ordenes</span><div class="according-menu"></div></a>                                
                                </li>
                                
                                <li class="dropdown">
                                    <a class="nav-link menu-title link-nav {{request()->is("admin.index") || request()->is("admin.index") ? "active" : ""}}" href="{{route('admin.departamentos.index')}}"><i class="fa-regular fa-square-kanban"></i><span>Departamentos</span><div class="according-menu"></div></a>                                
                                </li>

                                <li class="dropdown">
                                    <a class="nav-link menu-title link-nav {{request()->is("admin.index") || request()->is("admin.index") ? "active" : ""}}" href="{{route('admin.ciudades.index')}}"><i class="icon fa-regular fa-building"></i><span>Departamentos</span><div class="according-menu"></div></a>                                
                                </li>
                                
                                

                                
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </div>
                </nav>

            </header>

            <!-- Page Sidebar Ends-->
            <div class="page-body">
              {{ $slot }}
              <br>
            </div>
            



        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2021-22 ?? viho All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted &amp; made with <i
                                class="fa fa-heart font-secondary"></i>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>

    @livewireScripts


    <!-- latest jquery-->
    <script src="{{ asset('js/plantillaadmin/jquery-3.5.1.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('js/plantillaadmin/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('js/plantillaadmin/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('js/plantillaadmin/sidebar-menu.js') }}"></script>
    <script src="{{ asset('js/plantillaadmin/config.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    
    <script src="{{ asset('js/plantillaadmin/script.js') }}"></script>
    {{-- <script src="https://laravel.pixelstrap.com/viho/assets/js/theme-customizer/customizer.js"></script> --}}
    

   
    



   
<script src="{{ asset('js/app.js') }}"></script>



@stack('script')

    <script>
    Livewire.on('errorTalla', mensaje => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: mensaje,
        })
    });
    </script>

</body>

</html>
