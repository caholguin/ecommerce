<div>
    <style>
        .dropzone{
            background: #111727;
        }        
    </style>

    <h4 class="text-center mt-4">Complete esta informacíon para crear un producto</h4>

    <div class="mb-4 form" wire:ignore>
        <form  action="{{route('admin.productos.files',$producto)}}"            
            method="POST"
            class="dropzone"
            id="my-awesome-dropzone">
        </form>
    </div>

    @if ($producto->imagenes)

        <section class="container card rounded mb-4">
            <h5 class="mt-2">Imagenes del producto</h5>
            <ul class="list-group list-group-horizontal">
                @foreach ($producto->imagenes as $imagen)
                    <li class="list-group-item">
                        <img class="mt-2 mb-3" height="100" width="100" src="{{Storage::url($imagen->url)}}" alt="">
                    </li>
                @endforeach
            </ul>
        </section>

    @endif
   

    <div class="container card rounded">
    {{-- {{$subcategoria_id}}  --}}

    {{-- {{$producto}} --}}
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
            <select class="form-select   " name="" id="" wire:model="producto.subcategoria_id">
                <option value="" selected disabled>Selecione una subcategoria</option>

                @foreach ($subcategorias as $subcategoria)
                    <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                @endforeach
            </select>   
            
            @error('producto.subcategoria_id')
                <small class="text-danger">{{$message}}</small>    
            @enderror   
        </div>
    </div>

    <div class="row mt-4">
        <div class="col" >
            <label for="">Nombre</label>
            <input wire:model="producto.nombre" type="text" class="form-control" placeholder="Ingrese el nombre del producto">

            @error('producto.nombre')
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

     {{-- {{$descripcion}}  --}}

    <div wire:ignore class="mt-4" >
        <div >
            <label >Descripción</label>
            <textarea class="form-control"  rows="4"
             wire:model="producto.descripcion"
            {{--x-data 
            x-init="ClassicEditor
            .create($refs.miEditor)
            .then(function(editor){
                editor.model.document.on('change:data', () => {
                    @this.set('producto.descripcion',editor.getData())
                })
            })
            .catch( error => {
                console.error( error );
            });"
            x-ref="miEditor"--}}>
        </textarea> 
        </div>        
        @error('producto.descripcion')
            <small class="text-danger">{{$message}}</small>    
        @enderror 
    </div>
   

    <div class=" row mt-4">
        <div class="col">
            <label for="">Marca</label>
            <select wire:model="producto.marca_id" class="form-select" name="" id="">
                <option selected disabled value="">Seleccione una marca</option>

                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                @endforeach
            </select>

            @error('producto.marca_id')
                <small class="text-danger">{{$message}}</small>    
            @enderror 
        </div>

        <div class="col">
            <label for="">Precio</label>
            <input wire:model="producto.precio" type="number" class="form-control" step=".01" placeholder="Ingrese el precio del producto">

            @error('producto.precio')
                <small class="text-danger">{{$message}}</small>    
            @enderror 
        </div>
    </div>

    {{-- {{$this->subcategoria}} --}}
    
    @if ($this->subcategoria)
        @if (!$this->subcategoria->color && !$this->subcategoria->talla)
            <div class="col mt-4">
                <label for="">Cantidad</label>
                <input wire:model="producto.cantidad" type="number" class="form-control" placeholder="Ingrese la cantidad del producto">

                @error('producto.cantidad')
                    <small class="text-danger">{{$message}}</small>    
                @enderror  
            </div>
        @endif
    @endif


    
    
    


    <div class="row">       

        <div class="col-md-3">
            <button wire:click="save"
            wire:loading.attr="disabled"
            wire_target="save"
            class="btn btn-primary mt-4 mb-4">Actualizar producto
            </button>
        </div>

        <div class="col">
            <x-jet-action-message on="saved" class="mt-5">
                Atualizado
            </x-jet-action-message>
        </div>
    </div>
  
      
    </div>
    


    <div>
        @if ($this->subcategoria)
            
        @if ($this->subcategoria->talla)

            @livewire('admin.talla-producto', ['producto' => $producto], key('talla-producto' . $producto->id))
            
        @elseif($this->subcategoria->color)
            
            @livewire('admin.color-producto', ['producto' => $producto], key('color-producto' . $producto->id))

        @endif

        @endif


    </div>


    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
            
            };
        </script>
    @endpush

</div>

