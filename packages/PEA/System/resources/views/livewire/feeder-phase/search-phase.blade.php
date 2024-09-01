<div class="container-search">

  <form wire:submit.prevent="search" class="form-search"> 
      
      
      <div class="w-full p-2">
      <input wire:model="params.searchName" type="text" name="searchName" id="searchName" class="input-form" placeholder="Feeder Phase name">
      </div>

      <div class="w-full p-2">
      <select wire:model="params.searchState" id="state" class="dropdown-form">
          
          <option value="0">Select state</option>
          <option value="draft">draft</option>
          <option value="published">published</option>
                                  
      </select>
      </div>

      <button wire:click="search" class="btn-icon info">
         <i class="fa-regular fa-magnifying-glass fa-lg"></i>
      </button>

      <button wire:click="reset_search" type="button" class="btn-icon inactive">
          <i class="fa-regular fa-arrows-rotate fa-lg"></i>
      </button>
  </form>


  <div class="p-2">
  <button wire:click="$dispatch('openModal', { component: 'add-phase', arguments: { feeder_id:{{$feeder_id}} }})" type="button" class="action save">
        <i class="fa-solid fa-circle-plus fa-lg dark:text-white mr-1 "></i>
          Add Feeder Phase
  </button>
  </div>

</div>
