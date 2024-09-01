
<div>
    <div class="modal-div">
        <div class="relative p-1 w-full max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 md:p-5">
                    
                    <h3 class="text-md font-semibold text-gray-900 dark:text-white">Edit Area</h3>
                    
                </div>

                <div class="px-5">
                    <div class="line-modal"></div>
                </div>
                
                <div class="p-5 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="label-form">Name<em class="text-red-600">*</em></label>
                            <input wire:model="name" type="text" name="name" id="name" class="input-form" placeholder="Area name">
                            <div class="error-text">@error('name') {{ $message }} @enderror</div>
                        </div>

                        <div class="col-span-1">
                            <label for="weight" class="label-form">Weight<em class="text-red-600">*</em></label>
                            <input wire:model="weight" type="number" name="weight" id="weight" class="input-form"
                                placeholder="Weight">
                            <div class="error-text">
                                @error('weight')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-1">
                            <label for="state" class="label-form">State</label>
                            <select wire:model="state" id="state" class="dropdown-form">
                                               
                                @if($area->state == 'draft')
                                    <option value="{{$area->state}}">{{$area->state}}</option>
                                    <option value="published">published</option>
                                @else
                                    <option value="{{$area->state}}">{{$area->state}}</option>
                                    <option value="draft">draft</option>
                                @endif
                                
                            </select>
                        </div>
                    </div>
                    <div class = "flex justify-center">
                        <button wire:click="save" class="action success">   
                            <i class="fa-solid fa-floppy-disk mr-2"></i>  
                            Save
                        </button>
                        <button wire:click="close" class="action cancle">
                            Cancel
                        </button>
                    </div>
                   
            </div>
        </div>
    </div>
</div>

