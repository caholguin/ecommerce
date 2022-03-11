<x-app-layout>    
    <div style="margin-top: 50px">
        @foreach ($categorias as $categoria)            
            <section style="margin-top: 100px">
                <h1 class="heading"> <span> {{$categoria->nombre}}</span> 
                    
                </h1>
                @livewire('categoria-productos', ['categoria' => $categoria])
            </section> 
        @endforeach
    </div>

@push('script')
    
    <script>

        livewire.on('glider', function(id){

            new Glider(document.querySelector('.glider-'+ id), {
            slidesToShow: 5.5,
            slidesToScroll: 5,
            draggable: true,
            dots: '.glider-'+ id + '~.dots',
            arrows: {
                prev: '.glider-'+ id + '~.glider-prev',
                next: '.glider-'+ id + '~.glider-next'
            }
        });
        
        });
    </script>
    @endpush
</x-app-layout>