<x-app-layout>
    <div class="card-2">
        <img class="img-2" width="100%" height="480" src="{{Storage::url($categoria->imagen)}}" alt="Avatar" style="width:100%">
        {{-- <div class="container-2">
        <h4><b>John Doe</b></h4>
        <p>Architect & Engineer</p>
        </div> --}}
    </div>

    @livewire('categoria-filtrar', ['categoria' => $categoria])


</x-app-layout>