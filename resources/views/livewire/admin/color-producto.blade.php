<div >  
    <div class="card rounded container">
        <div class=" row mb-4">
            <label class="mb-2 mt-2">Color</label>
            @foreach ($colores as $color)
                <div class="col-md-2">
                <label class="d-block mb-3" for="{{$color->nombre}}">
                    <input wire:model.defer="color_id" class="radio_animated mr-1" id="{{$color->nombre}}" value="{{$color->id}}" type="radio" name="color_id">
                <span class="ml-1 text-capitalize"> {{$color->nombre}} </span>                                                               
                </label>
            </div>
            @endforeach

            @error('color_id')
                <small class="text-danger">{{$message}}</small>    
            @enderror
        </div>  
        
        <div class=" mb-4">
            <label for="">Cantidad</label>
            <input wire:model.defer="cantidad" class="form-control" type="number" placeholder="Ingrese una cantidad">
        
            @error('cantidad')
                <small class="text-danger">{{$message}}</small>    
            @enderror  
        </div>

        <div class="row">       

            <div class="col-md-3">
                <button wire:click="save"
                wire:loading.attr="disabled"
                wire_target="save"
                class="btn btn-primary  mb-4">Agregar
                </button>
            </div>

            <div class="col">               
                <x-jet-action-message on="saved" >
                    Agregado
                </x-jet-action-message>
            </div>
        </div>
    </div>

    @if ($productoColores->count())
        <div class="card rounded ">
            <div class="table-responsive ">
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th scope="col">Color</th>
                            <th scope="col">Cantidad</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    {{-- {{$pivot}}  --}}
                    <tbody>                
                        @foreach ($productoColores as $productoColor)
                            <tr wire:key="productoColor-{{$productoColor->pivot->id}}">
                                <td class="text-capitalize">
                                    {{-- trae los datos de la relacion muhos a muchhos --}}
                                {{-- {{$productoColor->pivot->color_id}} --}}
                                {{-- {{$colores->where('id',$productoColor->pivot->color_id)->first()->nombre}} --}}
                                {{$colores->find($productoColor->pivot->color_id)->nombre}}                             
                                </td>
                                <td>
                                    {{$productoColor->pivot->cantidad}} unidades
                                </td>
                                <td width="10px">
                                    <button  type="button" wire:click="edit({{$productoColor->pivot->id}})" class="btn btn-pill btn-primary"
                                        wire:loading.attr="disabled"
                                        wire:target="edit({{$productoColor->pivot->id}})"
                                        >Editar</button>                            
                                </td>
                                <td width="10px">
                                    <button
                                    wire:click="$emit('deletePivot',{{$productoColor->pivot->id}})"
                                    class="btn btn-pill btn-danger">eliminar</button>
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>                
            </div>  
        </div>
    @endif
    
  
  <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar color</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Color</label>
                {{-- <input class="form-control" wire:model="pivot_color_id" type="text"> --}}
                <select wire:model="pivot_color_id" class="form-select mb-4" name="" id="">
                    <option disabled selected value="">Seleccione un color</option>
                    @foreach ($colores as $color)
                        <option value="{{$color->id}}">{{ucfirst($color->nombre)}}</option>
                    @endforeach

                    @error('pivot_color_id')
                        <small class="text-danger">{{$message}}</small>    
                    @enderror
                </select>

                <label for="">Cantidad</label>
                <input class="form-control" wire:model="pivot_cantidad" type="text" placeholder="Ingrese una cantidad">

                @error('pivot_cantidad')
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
        window.Livewire.on('show-modal-colorp',msg => {
            $('#exampleModal').modal('show')                
        });
        window.Livewire.on('color-atualizado',msg => {
            $('#exampleModal').modal('hide')                
        });
    });
</script>



@endpush --}}
    
 
