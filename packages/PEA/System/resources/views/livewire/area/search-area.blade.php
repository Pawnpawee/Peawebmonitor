<div class="container-search" >

  <form wire:submit.prevent="search" class="form-search">   
      
      
      <div class="w-full p-2">
      <input wire:model="params.searchName" type="text" name="searchName" id="searchName" class="input-form" placeholder="Area name">
      </div>

      <div class="w-full p-2">
      <input wire:model="params.searchWeight" type="number" min="0" max="9999" name="searchWeight" id="searchWeight" class="input-form" placeholder="Weight">
      </div>

     

      <div class="w-full p-2">
      <select wire:model="params.searchState" id="state" class="dropdown-form">
          
          <option value="" >Select state</option>
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
  <button wire:click="$dispatch('openModal', {component: 'add-area'})" type="button" class="action save">
        <i class="fa-solid fa-circle-plus fa-lg dark:text-white mr-1 "></i>
          Add Area
  </button>
  </div>

</div>