<div >
  <div class="card container rounded">
    <h4 class="text-center">Estado del producto</h4>
    
    <div class="row mb-4">     
      
    
      <div class="radio radio-primary col-2">
        <input wire:model="estado" id="0" type="radio" name="0" value="0">
        <label for="0" _msthash="4848090" _msttexthash="004260"><span class="digits" _istranslated="0"></span>Borrador</label>
      </div>
      
      <div class="radio radio-primary col">
        <input wire:model="estado"  id="1" type="radio" name="1" value="1" >
        <label for="1" _msthash="4848584" _msttexthash="055376">Publicado</label>       
      </div>
   
   

    <div class="col-2">
     <x-jet-action-message on="saved">
        Actualizado
      </x-jet-action-message > 
      
    </div>

      <div class="col-2">
        <button wire:click="save"
          wire:loading.attr="disabled"
          wire:target="save"
        class="btn btn-primary align-self-center">Actualizar</button>
      </div>
    </div>
  </div>
</div>



