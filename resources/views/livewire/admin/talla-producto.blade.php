<div>
    <div class="card rounded container">
        <div class="mt-4 mb-4">
            <label>Talla</label>
            <input wire:model="nombre" class="form-control" type="text" placeholder="Ingrese una talla">
            
            @error('nombre')
            <small class="text-danger">{{$message}}</small>    
            @enderror
        </div>

        <div class="mb-4">
            <button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="btn btn-primary">Agregar</button>
        </div>
    </div>


    <ul>
        @foreach ($tallas as $talla)
            <li wire:key="talla-{{$talla->id}}" class="card rounded container">
                <div class="row mb-4 mt-4">
                    <div class="col">
                        <span class="">{{$talla->nombre}}</span>
                    </div>                    

                    <div class="col-md-2">
                        <button 
                        wire:click="edit({{$talla->id}})" 
                        wire:loading.attr="disabled"
                        wire:target="edit({{$talla->id}})"
                        class="float-right btn btn-sm btn-secondary">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button wire:click="$emit('eliminarTalla', {{$talla->id}})" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                @livewire('admin.color-talla', ['talla' => $talla], key('color-talla' . $talla->id))

            </li>
        @endforeach
    </ul>





    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editartallaP" tabindex="-1" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Talla</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label>Talla</label>
                <input wire:model="nombre_edit" class="form-control" type="text">

                @error('nombre_edit')
                    <small class="text-danger">{{$message}}</small>    
                @enderror
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button 
                wire:click="update"
                wire:loading.attr="disabled"
                wire:target="update"
            type="button" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
        </div>
    </div>

</div>

{{-- @push('script')
<script>
    document.addEventListener('DOMContentLoaded',function(){
        window.Livewire.on('show-modal-tallap',msg => {
            $('#editartallaP').modal('show')                
        });
        window.Livewire.on('tallap-atualizado',msg => {
            $('#editartallaP').modal('hide')                
        });
    });
</script> 


@endpush--}}