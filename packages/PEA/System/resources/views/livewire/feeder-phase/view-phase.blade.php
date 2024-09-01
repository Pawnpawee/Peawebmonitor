<div>

    <div
        class="modal-div">
        <div class="relative p-1 w-full max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 md:p-5">

                    <h3 class="text-md font-semibold text-gray-900 dark:text-white">View Feeder Phase</h3>
                </div>

                <div class="px-5">
                    <div class="line-modal"></div>
                </div>

                <div class="p-5 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-3">
                        <div class="col-span-3">
                            <label for="name"
                                class="label-form">Name</label>
                            <input disabled="true" wire:model="name" type="text" name="name" id="name"
                                class="input-form"
                                placeholder="Feeder name">
                            <div class="error-text">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="description"
                                class="label-form">Description</label>
                            <textarea disabled="true" wire:model="description" id="description" rows="4"
                                class="textarea-form"
                                placeholder="Feeder description here"></textarea>
                        </div>

                        <div class="col-span-3">
                            @foreach ($lat_long_json as $index => $latLong)
                                <div class="flex justify-between items-center bg-gray-50 p-2 rounded-lg border mb-2">
                                    <span>Latitude: {{ $latLong['latitude'] }}, Longitude:
                                        {{ $latLong['longitude'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-span-1">
                            <label for="state"
                                class="label-form">State</label>
                            <select wire:model="state" id="state" disabled="true"
                                class="dropdown-form">

                                @if ($feeder_phase->state == 'draft')
                                    <option value="{{ $feeder_phase->state }}">{{ $feeder_phase->state }}</option>
                                    <option value="published">published</option>
                                @else
                                    <option value="{{ $feeder_phase->state }}">{{ $feeder_phase->state }}</option>
                                    <option value="draft">draft</option>
                                @endif

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
