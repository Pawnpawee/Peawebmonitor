<div class="container-search" >

  <form wire:submit.prevent="search" class="form-search">   
      
      
      <div class="w-full p-2">
      <input wire:model="params.searchName" type="text" name="searchName" id="searchName" class="input-form" placeholder="Microgrid name">
      </div>

      <div class="w-full p-2">
      <input wire:model="params.searchLatitude" type="number" step="0.0001" min="0" name="searchLatitude" id="searchLatitude" class="input-form" placeholder="Latitude">
      </div>

      <div class="w-full p-2">
      <input wire:model="params.searchLongitude" type="number" step="0.0001" min="0" name="searchLongitude" id="searchLongitude" class="input-form" placeholder="Longitude">
      </div>

      <div class="w-full p-2">
      <select wire:model="params.searchState" id="state" class="dropdown-form">
          
          <option value="" >Select state</option>
          <option value="draft">draft</option>
          <option value="published">published</option>
                                  
      </select>
      </div>

      <button wire:click="search" class="btn-icon info">
         <i class="fa-solid fa-magnifying-glass fa-lg"></i>
      </button>

      <button wire:click="reset_search" type="button" class="btn-icon inactive">
          <i class="fa-solid fa-arrows-rotate fa-lg"></i>
      </button>
  </form>

  <div class="p-2">
  <button wire:click="$dispatch('openModal', {component: 'add-grid'})" type="button" class="action save">
        <i class="fa-solid fa-circle-plus fa-lg dark:text-white mr-1 "></i>
          Add Grid
  </button>
  </div>

</div>