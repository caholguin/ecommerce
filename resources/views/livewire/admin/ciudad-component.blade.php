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

                    <div class="mt-2">                       
                        <label class="form-label">Costo</label>                        
                        <input wire:model.defer="costo" class="form-control" type="text" placeholder="Ingrese el costo de envio" >
                    
                        @error('costo')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                    </div>

                    <div class="mt-2">
                        <label for="">Departamento</label>
                        <select class="form-control"  name="" id="" wire:model="departamento_id">
                            <option value="" selected disabled>Seleccione un departamento</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>   
                                
                            @endforeach
                        </select>

                        @error('departamento_id')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                    </div>
                
                    <div class="row">
                        <div class="col-3">
                            <button wire:click="save"   type="button" class="btn btn-primary mt-4 mb-4">Guardar</button>
                        </div>
                        <div class="col-5">
                            <x-jet-action-message class="text-primary " on="saved">
                                <strong class="text-success">ciudad creada</strong>
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
                            <th scope="col">Costo</th>
                            <th scope="col">Departamento</th>                    
                            <th colspan="1"></th>          
                        </tr>
                        </thead>
                        <tbody>                            
                            @foreach ($ciudades as $ciudad)
                                <tr>                                   
                                    <td>{{$ciudad->nombre}}</td>
                                    <td>{{$ciudad->costo}}</td>
                                    <td>{{$ciudad->departamento->nombre}}</td>
                                    <td width="10px">                                
                                        <a wire:click="edit('{{$ciudad->id}}')" class="btn btn-pill btn-secondary">Editar</a>                        
                                    </td>
                                    <td width="10px">
                                        <button wire:click="$emit('eliminarciudad','{{$ciudad->id}}')" class="btn btn-pill btn-danger">Eliminar</button>     
                                    </td>        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container mt-4 mb-4">
                     {{$ciudades->links()}}
                </div> 
            </div>
        </div>
    </div>

    
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="editarCiudad" tabindex="-1" role="dialog">
        <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar ciudad</h5>
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
                
                <div class="mt-3">
                    <div class="">
                        <label class="form-label" >Costo</label>
                        <input wire:model.defer="editcosto" class="form-control" type="text" placeholder="Ingrese el nombre" >
                    
                        @error('editcosto')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                    </div>                   
                </div>   
                
                <div class="mt-3">
                    <label for="">Departamento</label>
                    <select class="form-control"  name="" id="" wire:model.defer="editdepartamento_id">
                        <option value="" selected disabled>Seleccione un departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option> 
                        @endforeach
                    </select>

                    @error('editdepartamento_id')
                        <small class="text-danger">{{$message}}</small>    
                    @enderror  
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
            window.Livewire.on('show-modal-ciudad',msg => {
                $('#editarCiudad').modal('show')                
            });
            window.Livewire.on('ciudad-atualizada',msg => {
                $('#editarCiudad').modal('hide')                
            });
        });
    </script>



<script>
    Livewire.on('eliminarciudad',ciudadId => {
        Swal.fire({
            title: 'Esta seguro que desea eliminar la ciudad?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
            }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('admin.ciudad-component','delete',ciudadId )
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
