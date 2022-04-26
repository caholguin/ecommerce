<div>
    <div class="row">
        <div class="col">
            <div class="card rounded">
                <form wire:submit.prevent="save" class="container"> 
                    
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label class="form-label" >Nombre</label>
                            <input wire:model="createForm.nombre" class="form-control" type="text" placeholder="Ingrese el nombre" >
                        
                            @error('createForm.nombre')
                                <small class="text-danger">{{$message}}</small>    
                            @enderror  
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input wire:model="createForm.slug" disabled class="form-control"  type="text" placeholder="Ingrese el slug" >
                        
                        
                            @error('createForm.slug')
                                <small class="text-danger">{{$message}}</small>    
                            @enderror 
                        </div> 
                    </div>

                    <div class="form-group m-t-15 custom-radio-ml ">
                        <div class="radio radio-primary mb-4 mt-5">
                            <div class="row">
                                <div class="col-9">
                                     ¿Necesita especificar un color? 
                                </div>
                            
                                <div class="col">                                    
                                    <input class="mr-5"  wire:model.defer='createForm.color' class="ml-4" id="radio1" type="radio" name="color" value="1">
                                    <label for="radio1" _msthash="4848896" _msttexthash="104260" >Si</label>
                                </div>

                                <div class="col">                                
                                    <input wire:model.defer='createForm.color' id="radio2" type="radio" name="color" value="0">
                                    <label for="radio2" _msthash="4849143" _msttexthash="104429">No</label>
                                </div>
                                
                                @error('createForm.color')
                                <small class="text-danger">{{$message}}</small>    
                            @enderror  
                            </div>
                        </div>                      
                        
                    </div>

                    <div class="form-group m-t-15 custom-radio-ml ">
                        <div class="radio radio-primary mt-4">
                            <div class="row">
                                <div class="col-9">
                                    ¿Necesita especificar un talla? 
                                </div>
                            
                                <div class="col">                                    
                                    <input class="mr-5"  wire:model.defer='createForm.talla' class="ml-4" id="radio3" type="radio" name="talla" value="1">
                                    <label for="radio3" _msthash="4848896" _msttexthash="104260">Si</label>
                                </div>

                                <div class="col">                                
                                    <input wire:model.defer='createForm.talla' id="radio4" type="radio" name="talla" value="0">
                                    <label for="radio4" _msthash="4849143" _msttexthash="104429">No</label>
                                </div>
                                
                                @error('createForm.talla')
                                <small class="text-danger">{{$message}}</small>    
                            @enderror  
                            </div>
                        </div>
                    </div>
                      {{-- ¿Esta subcategoria necesita especificar una talla? --}}
                    <div class="row">
                        <div class="col-3">
                            <button   type="submit" class="btn btn-primary mt-4 mb-4">Guardar</button>
                        </div>
                        <div class="col-5">
                            <x-jet-action-message class="text-primary " on="saved">
                                <strong class="text-success">Subcategoria creada</strong>
                            </x-jet-action-message> 
                        </div>
                    </div>
                </form> 
            </div>
        </div>

        <div class="col ">
            <div class=" card rounded">
                <div class="table-responsive">
                    <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>                   
                            <th colspan="1"></th>          
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategorias as $subcategoria)
                                <tr>
                                    <td>{{$subcategoria->nombre}}</td>
                                    <td width="10px">                                
                                        <a wire:click="edit('{{$subcategoria->id}}')" class="btn btn-pill btn-secondary">Editar</a>                        
                                    </td>
                                    <td width="10px">
                                        <button wire:click="$emit('eliminarSubcategoria','{{$subcategoria->id}}')" class="btn btn-pill btn-danger">Eliminar</button>     
                                    </td>        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editarsubcategoria" tabindex="-1" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar subcategoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="mb-4">
                    <label class="form-label" >Nombre</label>
                    <input wire:model="editForm.nombre" class="form-control" type="text" placeholder="Ingrese el nombre" >
                
                    @error('editForm.nombre')
                        <small class="text-danger">{{$message}}</small>    
                    @enderror  
                </div>

                <div class="">
                    <label class="form-label">Slug</label>
                    <input wire:model="editForm.slug" disabled class="form-control"  type="text" placeholder="Ingrese el slug" >
                
                
                    @error('editForm.slug')
                        <small class="text-danger">{{$message}}</small>    
                    @enderror 
                </div> 

                <div class="form-group m-t-15 custom-radio-ml ">
                    <div class="radio radio-primary mb-4 mt-5">
                        <div class="row">
                            <div class="col-8">
                                    ¿Necesita especificar un color? 
                            </div>
                        
                            <div class="col">                                    
                                <input class="mr-5"  wire:model.defer='editForm.color' class="ml-4" id="radio5" type="radio" name="color" value="1">
                                <label for="radio5" _msthash="4848896" _msttexthash="104260" >Si</label>
                            </div>

                            <div class="col">                                
                                <input wire:model.defer='editForm.color' id="radio6" type="radio" name="color" value="0">
                                <label for="radio6" _msthash="4849143" _msttexthash="104429">No</label>
                            </div>
                            
                            @error('editForm.color')
                                <small class="text-danger">{{$message}}</small>    
                            @enderror  
                        </div>
                    </div>                      
                    
                </div>

                <div class="form-group m-t-15 custom-radio-ml ">
                    <div class="radio radio-primary mt-4">
                        <div class="row">
                            <div class="col-8">
                                ¿Necesita especificar un talla? 
                            </div>
                        
                            <div class="col">                                    
                                <input class="mr-5"  wire:model.defer='editForm.talla' class="ml-4" id="radio7" type="radio" name="talla" value="1">
                                <label for="radio7" _msthash="4848896" _msttexthash="104260">Si</label>
                            </div>

                            <div class="col">                                
                                <input wire:model.defer='editForm.talla' id="radio8" type="radio" name="talla" value="0">
                                <label for="radio8" _msthash="4849143" _msttexthash="104429">No</label>
                            </div>
                            
                            @error('editForm.talla')
                                <small class="text-danger">{{$message}}</small>    
                            @enderror  
                        </div>
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
            window.Livewire.on('show-modal-subcategoria',msg => {
                $('#editarsubcategoria').modal('show')                
            });
            window.Livewire.on('subcategoria-atualizada',msg => {
                $('#editarsubcategoria').modal('hide')                
            });
        });
    </script>




<script>
    Livewire.on('eliminarSubcategoria',subcategoriaId => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('admin.mostrar-categoria','delete',subcategoriaId )
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