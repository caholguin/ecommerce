<div class="container card rounded">
    <h4 class="text-center mt-4">Complete esta informacíon para crear un producto</h4>
    {{-- {{$subcategoria_id}}  --}}

    <div class="row mt-4">
        <div class="col">
            <label class=""  for="">Categoría</label>
            <select class="form-select  " name="" id="" wire:model="categoria_id">
                <option value="" selected disabled>Selecione una categoría</option>
                
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>   
            
            
            @error('categoria_id')
                <small class="text-danger">{{$message}}</small>    
            @enderror
        </div>

        <div class="col">
            <label class="" for=""> Subcategoría</label>
            <select class="form-select   " name="" id="" wire:model="subcategoria_id">
                <option value="" selected disabled>Selecione una subcategoria</option>

                @foreach ($subcategorias as $subcategoria)
                    <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                @endforeach
            </select>   
            
            @error('subcategoria_id')
                <small class="text-danger">{{$message}}</small>    
            @enderror   
        </div>
    </div>

    <div class="row mt-4">
        <div class="col" >
            <label for="">Nombre</label>
            <input wire:model="nombre" type="text" class="form-control" placeholder="Ingrese el nombre del producto">

            @error('nombre')
                <small class="text-danger">{{$message}}</small>    
            @enderror 
        </div>

        <div class="col" >
            <label for="">Slug</label>
            <input wire:model="slug" disabled type="text" class="form-control" placeholder="Ingrese el slug del producto">

            @error('slug')
                <small class="text-danger">{{$message}}</small>    
            @enderror 
        </div>
    </div>

    {{-- {{$descripcion}} --}}

    <div class="mt-4" >
        <div wire:ignore>
            <label for="">Descripción</label>
            <textarea class="form-control " name="" id="" cols="" rows="4" 
            wire:model="descripcion"
            x-data 
            x-init="ClassicEditor.create($refs.miEditor)
            .then(function(editor){
                editor.model.document.on('change:data', () => {
                    @this.set('descripcion',editor.getData())
                })
            })
            .catch( error => {
                console.error( error );
            });"
            x-ref="miEditor">
            </textarea>
        </div>
        @error('descripcion')
            <small class="text-danger">{{$message}}</small>    
        @enderror 
    </div>

    <div class=" row mt-4">
        <div class="col">
            <label for="">Marca</label>
            <select wire:model="marca_id" class="form-select" name="" id="">
                <option selected disabled value="">Seleccione una marca</option>

                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                @endforeach
            </select>

            @error('marca_id')
                <small class="text-danger">{{$message}}</small>    
            @enderror 
        </div>

        <div class="col">
            <label for="">Precio</label>
            <input wire:model="precio" type="number" class="form-control" step=".01" placeholder="Ingrese el precio del producto">

            @error('precio')
                <small class="text-danger">{{$message}}</small>    
            @enderror 
        </div>
    </div>

    {{-- {{$this->subcategoria}} --}}
    @if ($subcategoria_id)

        @if (!$this->subcategoria->color && !$this->subcategoria->talla)
            <div class="col mt-4">
                <label for="">Cantidad</label>
                <input wire:model="cantidad" type="number" class="form-control" placeholder="Ingrese la cantidad del producto">

                @error('cantidad')
                    <small class="text-danger">{{$message}}</small>    
                @enderror  
            </div>
        @endif

    @endif


    <div>
        <button wire:click="save"
        wire:loading.attr="disabled"
        wire_target="save"
        class="btn btn-primary mt-4 mb-4">Crear producto</button>
    </div>

   <style>
       .ck-editor {
        color: black;
    }
    
   </style> 
      

    
</div>
