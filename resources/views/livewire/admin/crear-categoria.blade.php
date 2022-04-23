<div>
    <div class="row">

        <div class="col-6">
            <div class="container card rounded">
                {{-- {{$createForm['icono']}}  --}}
                <form wire:submit.prevent="save"> 
                    
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

                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label class="form-label" >Icono</label>
                            <input wire:model.defer="createForm.icono" class="form-control" type="text" placeholder="Ingrese el icono" >
                        
                            @error('createForm.icono')
                            <small class="text-danger">{{$message}}</small>    
                            @enderror  
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"  for="">Imagen</label>
                            <input wire:model="createForm.imagen" accept="image/*" id="{{$rand}}" type="file" class="form-control">

                            @error('createForm.imagen')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                        </div>                
                    </div>

                    <div class="mt-4">
                        <label class="form-label" >Marcas</label>
                        <div class="row">
                            @foreach ($marcas as $marca)
                        
                            <div class="col-4">
                                <label class="d-block" for="{{$marca->id}}">
                                    <input wire:model.defer="createForm.marcas" name="marcas[]" class="checkbox_animated" id="{{$marca->id}}" value="{{$marca->id}}" type="checkbox" > {{$marca->nombre}} 
                                </label>
                            </div>
                            
                            @endforeach

                            @error('createForm.marcas')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-3">
                            <button   type="submit" class="btn btn-primary mt-4 mb-4">Guardar</button>
                        </div>
                        <div class="col-5">
                            <x-jet-action-message class="text-primary " on="saved">
                                <strong class="text-success">Categoria creada</strong>
                            </x-jet-action-message> 
                        </div>
                    </div>
                </form> 
            </div>
        </div>

        <div class="col-6">
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
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>
                                        <span class="icon">
                                            {!!$categoria->icono!!}
                                        </span>

                                        <span class="text-uppercase ">
                                            {{$categoria->nombre}}
                                        </span>
                                    </td>
                                    <td width="10px">                                
                                        <a wire:click="edit('{{$categoria->slug}}')" class="btn btn-pill btn-secondary">Editar</a>                        
                                    </td>
                                    <td width="10px">
                                        <button wire:click="$emit('eliminarCategoria','{{$categoria->slug}}')" class="btn btn-pill btn-danger">Eliminar</button>     
                                    </td>                               
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>




    <!-- Modal -->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="editarCategoria" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar color</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    @if ($editImagen)
                        <img class="text-center" height="400" width="765px" src="{{$editImagen->temporaryUrl()}}" alt=""> 
                    @else
                        <img class="text-center" height="400" width="765px" src="{{Storage::url($editForm['imagen'])}}" alt="">                        
                    @endif
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label class="form-label" >Nombre</label>
                        <input wire:model="editForm.nombre" class="form-control" type="text" placeholder="Ingrese el nombre" >
                    
                        @error('editForm.nombre')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror  
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Slug</label>
                        <input wire:model="editForm.slug" disabled class="form-control"  type="text" placeholder="Ingrese el slug" >
                    
                    
                        @error('editForm.slug')
                            <small class="text-danger">{{$message}}</small>    
                        @enderror 
                    </div> 
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label class="form-label" >Icono</label>
                        <input wire:model="editForm.icono" class="form-control" type="text" placeholder="Ingrese el icono" >
                    
                        @error('editForm.icono')
                        <small class="text-danger">{{$message}}</small>    
                        @enderror  
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"  for="">Imagen</label>
                        <input wire:model="editImagen" accept="image/*" id="{{$rand}}" type="file" class="form-control">

                        @error('editImagen')
                        <small class="text-danger">{{$message}}</small>    
                    @enderror  
                    </div>                
                </div>

                <div class="mt-4">
                    <label class="form-label" >Marcas</label>
                    <div class="row">
                        @foreach ($marcas as $marca)
                    
                        <div class="col-4">
                            <label class="d-block" for="{{$marca->id}}">
                                <input wire:model="editForm.marcas" name="marcas[]" class="checkbox_animated" id="{{$marca->id}}" value="{{$marca->id}}" type="checkbox" > {{$marca->nombre}} 
                            </label>
                        </div>
                        
                        @endforeach

                        @error('editForm.marcas')
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
                wire:target="editImagen,update"
            type="button" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
        </div>
    </div>
</div>


<style>
    .icon{
        margin-right: 10px;
    }
</style>

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded',function(){
            window.Livewire.on('show-modal-categoria',msg => {
                $('#editarCategoria').modal('show')                
            });
            window.Livewire.on('categoria-atualizada',msg => {
                $('#editarCategoria').modal('hide')                
            });
        });
    </script>
@endpush 


