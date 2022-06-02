<div>
    <div class="row">

        <div class="col">
            <div class="card rounded">
                <form wire:submit.prevent="save" class="container">
                    <div class="mt-2">                       
                        <label class="form-label">Nombre</label>                        
                        <input wire:model.defer="nombre" class="form-control" type="text" placeholder="Ingrese el nombre" >
                    
                        @error('nombre')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                    </div>
                
                    <div class="row">
                        <div class="col-3">
                            <button wire:click="save"   type="button" class="btn btn-primary mt-4 mb-4">Guardar</button>
                        </div>
                        <div class="col-5">
                            <x-jet-action-message class="text-primary " on="saved">
                                <strong class="text-success">Departamento creado</strong>
                            </x-jet-action-message> 
                        </div>
                    </div>
                </form> 
            </div>
        </div>

        <div class="col">
            <div class="card rounded">
                <div class="table-responsive">
                    <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>                   
                            <th colspan="1"></th>          
                        </tr>
                        </thead>
                        <tbody>                            
                            @foreach ($departamentos as $departamento)
                                <tr>                                   
                                    <td>{{$departamento->nombre}}</td>
                                    <td width="10px">                                
                                        <a wire:click="edit('{{$departamento->id}}')" class="btn btn-pill btn-secondary">Editar</a>                        
                                    </td>
                                    <td width="10px">
                                        <button wire:click="$emit('eliminardepartamento','{{$departamento->id}}')" class="btn btn-pill btn-danger">Eliminar</button>     
                                    </td>        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container mt-4 mb-4">
                     {{$departamentos->links()}}
                </div> 
            </div>
        </div>
    </div>




    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="editarDepartamento" tabindex="-1" role="dialog">
        <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar departamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">               
                
                <div class="mt-3">
                    <div class="">
                        <label class="form-label" >Nombre</label>
                        <input wire:model.defer="editnombre" class="form-control" type="text" placeholder="Ingrese el nombre" >
                    
                        @error('editnombre')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                    </div>                   
                </div>             

               
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




@push('script')
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            window.Livewire.on('show-modal-departamento',msg => {
                $('#editarDepartamento').modal('show')                
            });
            window.Livewire.on('departamento-atualizado',msg => {
                $('#editarDepartamento').modal('hide')                
            });
        });
    </script>



<script>
    Livewire.on('eliminardepartamento',departamentoId => {
        Swal.fire({
            title: 'Esta seguro que desea eliminar el departamento?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
            }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('admin.departamento-component','delete',departamentoId )
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
</script>
@endpush 
