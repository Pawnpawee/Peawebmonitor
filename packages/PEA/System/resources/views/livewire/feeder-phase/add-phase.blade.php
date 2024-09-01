<div>

    <div class="modal-div">
        <div class="relative p-1 w-full max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 md:p-5">
                    <h3 class="text-md font-semibold text-gray-900 dark:text-white">Add New Feeder Phase</h3>
                </div>

                <div class="px-5">
                    <div class="line-modal"></div>
                </div>

                <div class="p-5 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-3">
                        <div class="col-span-3">
                            <label for="name" class="label-form">Name<em class="text-red-600">*</em></label>
                            <input wire:model="name" type="text" name="name" id="name" class="input-form" placeholder="Feeder name">
                            <div class="error-text">@error('name') {{ $message }} @enderror</div>
                        </div>

                        <div class="col-span-3">
                            <label for="description" class="label-form">Description</label>
                            <textarea wire:model="description" id="description" rows="4" class="textarea-form" placeholder="Feeder description here"></textarea>
                        </div>

                        <div class="col-span-1">
                            <label for="latitude" class="label-form">Latitude</label>
                            <input wire:model="latitude" type="number" step="0.0001" name="latitude" id="latitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400" placeholder="00.0000">
                            @error('latitude') <span class="error-text">{{ $message }}</span> @enderror
                            @error('lat_long_json') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-1">
                            <label for="longitude" class="label-form">Longitude</label>
                            <input wire:model="longitude" type="number" step="0.0001" name="longitude" id="longitude" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400" placeholder="00.0000">
                            @error('longitude') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-1 flex items-end">
                            <button wire:click="addPair" type="button" class="action save">
                                <i class="fa-solid fa-circle-plus fa-lg dark:text-white mr-2"></i>
                                Add
                            </button>
                        </div>

                        <div class="col-span-3">
                            @foreach($lat_long_json as $index => $latLong)
                                <div class="flex justify-between items-center bg-gray-50 p-2 rounded-lg border mb-2">
                                    <span>Latitude: {{ $latLong['latitude'] }}, Longitude: {{ $latLong['longitude'] }}</span>
                                    <button wire:click="removePair({{ $index }})" type="button" class="text-red-600 hover:text-red-900">
                                        <i class="fa-solid fa-circle-minus fa-lg"></i>
                                    </button>
                                </div>
                            @endforeach
                            
                        </div>

                        <div class="col-span-3">
                            <label for="state" class="label-form">State</label>
                            <select wire:model="state" id="state" class="dropdown-form">
                                <option value="draft">draft</option>
                                <option value="published">published</option>
                            </select>
                        </div>
                    </div>

                    <div class = "flex justify-center">
                    <button wire:click="submit" class="action save">
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
</div>
