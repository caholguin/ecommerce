<div>
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
                
                    <div class="col-3">
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

            
    
           
           
            <button   type="submit" class="btn btn-primary mt-4 mb-4">Enviar formulario</button>
          </form> 
    </div>


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
                                <span class="mr-4">
                                    {!!$categoria->icono!!}
                                </span>

                                <span class="text-uppercase">
                                    {{$categoria->nombre}}
                                </span>
                            </td>
                            <td width="10px">                                
                                <a href="" class="btn btn-pill btn-secondary">Editar</a>                        
                            </td>
                            <td width="10px">
                                <button class="btn btn-pill btn-danger">Eliminar</button>     
                            </td>                               
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


