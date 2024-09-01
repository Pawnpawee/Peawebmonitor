<div>
    <div class="modal-div">
        <div class="relative p-1 w-full max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 md:p-5">
                    
                    <h3 class="text-md font-semibold text-gray-900 dark:text-white">View Transformer</h3>
                    
                </div>

                <div class="px-5">
                    <div class="line-modal"></div>
                </div>

                <div class="p-5 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-3">

                        <div class="col-span-3">
                            <label for="microgrid"
                                class="label-form">Microgrid</label>
                            <select wire:model="microgrid_id" disabled="true" id="microgrid"
                                class="dropdown-form">
    
                                <option value="{{ $transformer->microgrid->id }}"> {{ $transformer->microgrid->name }}</option>
                                
                            </select>
                        </div>

                        <div class="col-span-3">
                            <label for="name" class="label-form">Name</label>
                            <input wire:model="name" disabled="true" type="text" name="name" id="name" class="input-form">
                        </div>

                        <div class="col-span-3">
                            <label for="description" class="label-form">Description</label>
                            <textarea wire:model="description" disabled="true" id="description" rows="4" class="textarea-form"></textarea>
                        </div>

                        <div class="col-span-1">
                            <label for="latitude" class="label-form">Latitude</label>
                            <input wire:model="latitude" disabled="true" type="number" step="0.0001" min="0" name="latitude" id="latitude" class="input-form">
                        </div>

                        <div class="col-span-1">
                            <label for="longitude" class="label-form">Longitude</label>
                            <input wire:model="longitude" disabled="true" type="number" step="0.0001" min="0" name="longitude" id="longitude" class="input-form">
                        </div>

                        <div class="col-span-1">
                            <label for="state" class="label-form">State</label>
                            <select wire:model="state" disabled="true" id="state" class="dropdown-form">
                                    
                                <option value="{{$transformer->state}}">{{$transformer->state}}</option>
                                    
                            </select>
                        </div>

                    </div>
                    <div class = "flex justify-center">
                        <button wire:click="close" class="action cancle">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>