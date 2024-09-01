<div>
    <div
        class="modal-div">
        <div class="relative p-1 w-full max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 md:p-5">

                    <h3 class="text-md font-semibold text-gray-900 dark:text-white">Edit Transformer</h3>
                    <button wire:click="close" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="fa-regular fa-x"></i>
                    </button>
                </div>

                <div class="px-5">
                    <div class="line-modal"></div>
                </div>
    

                <div class="p-5 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-3">

                        <div class="col-span-3">
                            <label for="microgrid"
                                class="label-form">Microgrid</label>
                            <select wire:model="microgrid_id" id="microgrid"
                                class="dropdown-form">

                                <option value="{{ $transformer->microgrid->id }}"> {{ $transformer->microgrid->name }}
                                </option>
                                @foreach ($microgrids as $microgrid)
                                    <option value="{{ $microgrid->id }}">{{ $microgrid->name }}</option>
                                @endforeach


                            </select>
                            <div class="error-text">
                                @error('microgrid_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="name"
                                class="label-form">Name<em
                                    class="text-red-600">*</em></label>
                            <input wire:model="name" type="text" name="name" id="name"
                                class="input-form"
                                placeholder="Transformer name">
                            <div class="error-text">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="description"
                                class="label-form">Description</label>
                            <textarea wire:model="description" id="description" rows="4"
                                class="textarea-form"
                                placeholder="Transformer description here"></textarea>
                        </div>

                        <div class="col-span-1">
                            <label for="latitude"
                                class="label-form">Latitude<em
                                    class="text-red-600">*</em></label>
                            <input wire:model="latitude" type="number" step="0.0001" name="latitude" id="latitude"
                                class="input-form"
                                placeholder="00.0000">
                            <div class="error-text">
                                @error('latitude')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-1">
                            <label for="longitude"
                                class="label-form">Longitude<em
                                    class="text-red-600">*</em></label>
                            <input wire:model="longitude" type="number" step="0.0001" name="longitude" id="longitude"
                                class="input-form"
                                placeholder="00.0000">
                            <div class="error-text">
                                @error('longitude')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-1">
                            <label for="state"
                                class="label-form">State</label>
                            <select wire:model="state" id="state"
                                class="dropdown-form">

                                @if ($transformer->state == 'draft')
                                    <option value="{{ $transformer->state }}">{{ $transformer->state }}</option>
                                    <option value="published">published</option>
                                @else
                                    <option value="{{ $transformer->state }}">{{ $transformer->state }}</option>
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
