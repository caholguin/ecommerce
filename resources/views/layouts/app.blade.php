<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link href="{{asset('css/plantilla/style.css')}}" rel="stylesheet">

    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{asset('vendor/FlexSlider/flexslider.css')}}">

    {{-- glide js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.js" integrity="sha512-RidPlemZ+Xtdq62dXb81kYFycgFQJ71CKg+YbKw+deBWB0TLIqCraOn6k0CWDH2rGvE1a8ruqMB+4E4OLVJ7Dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.6.6/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="//unpkg.com/alpinejs" defer></script>
        
    @livewireStyles

    <title>Ecommerce</title>
</head>

<x-jet-banner/>

<body>
    
    
    
    @livewire('navegacion')
    

   

    <main>
        {{ $slot }}
    </main>

    
    @livewireScripts

    
    <script src="{{asset('js/plantilla/script.js')}}"></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

    {{-- flexslider --}}
    <script src="{{asset('vendor/FlexSlider/jquery.flexslider-min.js')}}"></script>

    
    @stack('script')
    


</body>
</html>
